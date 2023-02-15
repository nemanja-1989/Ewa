<?php

use Nemanja\Ewa\Router\Router;
use Nemanja\Ewa\Controllers\BookController;
use Nemanja\Ewa\ServiceModels\Http\Request;
use Nemanja\Ewa\ServiceModels\Http\Server;
use Nemanja\Ewa\Services\PDOService;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$dotenv = \Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$router = new Router();

$router->getAttributesFromControllers([
    BookController::class
]);

// $router
//     ->get('/', [BookController::class, 'index'])
//     ->get('/books/create', [BookController::class, 'create'])
//     ->post('/books/store', [BookController::class, 'store']);

echo $router->resolve(Server::get('REQUEST_URI'), Request::method());
?>