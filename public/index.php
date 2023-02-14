<?php

use Nemanja\Ewa\Services\PDOService;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$dotenv = \Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

header('Content-Type: text/javascript');

$method = $_SERVER['REQUEST_METHOD'];

// var_dump($method);

$c = PDOService::pdoConnect();
var_dump($c);