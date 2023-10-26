<?php

use Core\Router;

const BASE_URI = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR;

require BASE_URI . "Core/helpers.php";

require base_uri("Vendor/autoloader.php");

require base_uri("bootstrap.php");

$router = new Router();
$routes = require base_uri("./routes.php");


$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_METHOD'] ?? $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);
