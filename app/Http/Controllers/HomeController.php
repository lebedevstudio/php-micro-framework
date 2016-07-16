<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;

class HomeController extends BaseController
{
    public function index($response)
    {
        return $this->view->render('home.twig');
    }
}