<?php

use Core\App;
use Core\Database;
use Core\Container;

$container = new Container();

$container->bind("Core\Database", function(){
    $config = require "../config.php";

    return new Database($config["database"]);
});

App::setContainer($container);

// dd($db)