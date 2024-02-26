<?php

require_once __DIR__ . "/vendor/autoload.php";
require_once __DIR__ . "/helpers.php";
require_once basePath("config.php");

use Framework\Router;
use Framework\Database;
use Framework\Session;
use Framework\Middleware;

(new Session());

$db = new Database();
$router = new Router();

Middleware::processJsonRequestData();

require_once basePath("routes.php");

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$router->route($uri);