<?php

use Nemanja\Ewa\ServiceModels\Http\Request;
use Nemanja\Ewa\ServiceModels\Http\Server;
use Nemanja\Ewa\Services\PDOService;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$dotenv = \Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

header('Content-Type: text/javascript');

$method = Request::get('id');

var_dump($method);