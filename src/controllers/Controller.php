<?php

namespace controllers;
use Jenssegers\Blade\Blade;

class Controller
{
    public $blade;
    public $model;
    public function __construct()
    {
        $this->blade = new Blade('src/views', 'cache');
    }
}