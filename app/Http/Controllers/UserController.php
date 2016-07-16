<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\BaseController;

class UserController extends BaseController
{
    public function index($response)
    {
        $users = User::all();

        return $this->view->render('user/list.twig', [
            'users' => $users
        ]);
    }
}
