<?php

use Illuminate\Database\Capsule\Manager as Capsule;

session_start();

require __DIR__ . '/../vendor/autoload.php';

$env = (new \Dotenv\Dotenv(__DIR__ . '/../'))->load();

$app = new App\App;

$container = $app->getContainer();

$capsule = new Capsule;
$capsule->addConnection([
    'driver' => getenv('DB_DRIVER'),
    'host' => getenv('DB_HOST'),
    'database' => getenv('DB_DATABASE'),
    'username' => getenv('DB_USERNAME'),
    'password' => getenv('DB_PASSWORD'),
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix' => ''
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();

$container['errorHandler'] = function () {
    return function ($response) {
        return $response->setBody('Page not found.')->withStatus(404);
    };
};

$container['view'] = function () {
    return new Twig_Environment(new Twig_Loader_Filesystem(__DIR__ . '/../resources/views'), [
        'cache' => false,
    ]);
};

require __DIR__ . '/../app/Http/routes.php';