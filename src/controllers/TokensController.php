<?php

namespace controllers;

use models\TokensModel;
use models\UserModel;

class TokensController
{
    private $modelToken;
    private $modelUser;
    private $key;

    public function __construct()
    {
        $this->modelToken = new TokensModel();
        $this->modelUser = new UserModel();
        $this->key = $_ENV['CRYPT'];
    }

    public function authenticator($data)
    {
        $result = $this->modelUser->verifyExist($data['email']);
        $decrypt = $this->decrypt($result[0]['password']);

        return $decrypt === $data['password'] ? $result : false;
    }
    public function generateToken(): string
    {
        $id_session = session_id();
        return $this->crypt($id_session . $_SESSION['user']['name'] . $_SESSION['user']['email']);

    }
    public function createToken(): bool
    {
        $data = [
            'token' => $this->generateToken(),
            'user_id' => $_SESSION['user']['id'],
            'abilities' => json_encode([$_SESSION['user']['role']]),
            'ip' => $_SERVER['REMOTE_ADDR'],
            'life_time' => '7'
        ];
        $result = $this->modelToken->add($data);

        if($result['success']) {
            $_SESSION['token_id'] = $result['token_id']['id'];
            setcookie('token', $data['token']);
            return true;
        }
        return false;
    }
    public function crypt($value): string
    {
        $encrypted = openssl_encrypt($value, 'AES-256-CBC', $this->key, OPENSSL_RAW_DATA, '0123456789abcdef');
        return base64_encode($encrypted);
    }
    public function decrypt($value): string
    {
        $crip = base64_decode($value);
        return openssl_decrypt($crip, 'AES-256-CBC', $this->key, OPENSSL_RAW_DATA, '0123456789abcdef');
    }

    public function verifyAuthenticated()
    {
        $result = $this->modelToken->searcById($_SESSION['token_id']);

        $testDate = new \DateTime($result['date_create']);
        $currentDate = new \DateTime();
        $differentDate = $currentDate->diff($testDate);

        if($differentDate->days >= $result['life_time']) {

            $this->modelToken->delete($_SESSION['token_id']);
            $_SESSION['expired_token'] = true;
            \Flight::redirect('/login');
            exit();

        }

        return ( $result['token'] === $_COOKIE['token'] ) && ( $result['ip'] === $_SERVER['REMOTE_ADDR'] );

    }
    public function verifyAbilities($abilitie): bool
    {
        if($this->verifyAuthenticated()) {
            $result = $this->modelToken->searcById($_SESSION['token_id']);
            $result['abilities'] = json_decode($result['abilities']);
            if(in_array('*', $result['abilities']) || in_array($abilitie, $result['abilities'])) {
                return true;
            }
        }
        return false;
    }
}