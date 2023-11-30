<?php

namespace controllers;

use controllers\Controller;
use models\UserModel;

class AuthenticationController extends Controller
{
    private $key;
    public function __construct()
    {
        parent::__construct();
        $this->model = new UserModel();
        $this->key = $_ENV['CRYPT'];
    }
    public function login()
    {
        echo $this->blade->render('user/login');
    }
    public function auth()
    {
        $result = $this->model->verifyExist($_POST['email']);
        $decrypt = $this->decrypt($result[0]['password']);
        if($decrypt === $_POST['password']) {

            $id_session = session_id();
            session_write_close();
            ini_set('session.sid_length', 255);
            $crypt_id = substr($this->crypt($id_session . $result[0]['email']), 0, 254);
            session_id(preg_replace('/[^a-zA-Z0-9]/', '', $crypt_id));
            session_start();

            $_SESSION['authenticated'] = true;
            $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
            $_SESSION['browser'] = $_SERVER["HTTP_USER_AGENT"];
            $_SESSION['user'] = [
                'id' => $result[0]['id'],
                'name' => $result[0]['name'],
                'email' => $result[0]['email']
            ];

            \Flight::redirect('/todo');
        }
    }
    public function verifyAuthenticated()
    {
        if(array_key_exists('authenticated', $_SESSION) && array_key_exists('ip', $_SESSION) && array_key_exists('browser',$_SESSION) && array_key_exists('user', $_SESSION)) {
            return ( $_SESSION['authenticated'] ) && ( $_SESSION['ip'] === $_SERVER['REMOTE_ADDR'] ) && ( $_SESSION['browser'] === $_SERVER["HTTP_USER_AGENT"] );
        } else {
            return false;
        }
    }
    public function crypt($value)
    {
        $encrypted = openssl_encrypt($value, 'AES-256-CBC', $this->key, OPENSSL_RAW_DATA, '0123456789abcdef');
        return base64_encode($encrypted);
    }
    public function decrypt($value)
    {
        $crip = base64_decode($value);
        return openssl_decrypt($crip, 'AES-256-CBC', $this->key, OPENSSL_RAW_DATA, '0123456789abcdef');
    }
}