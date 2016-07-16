<?php

$app->get('/', [new App\Http\Controllers\HomeController($container->view), 'index']);

$app->get('/users', [new App\Http\Controllers\UserController($container->view), 'index']);