<?php

class Controller
{
    public $directory;
    public function __construct()
    {

    }

    public function render($view)
    {
        require 'view/' . $this->directory . '/' . $view . '.php';
    }
}