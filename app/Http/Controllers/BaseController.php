<?php

namespace App\Http\Controllers;

abstract class BaseController
{
    protected $view;

    public function __construct($view)
    {
        $this->view = $view;
    }
}