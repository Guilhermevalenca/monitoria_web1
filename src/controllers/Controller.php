<?php

namespace controllers;
use Jenssegers\Blade\Blade;

class Controller extends TokensController
{
    public $blade;
    public $model;
    public function __construct()
    {
        parent::__construct();
        $this->blade = new Blade('src/views', 'cache');
    }
}