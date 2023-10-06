<?php

use Core\Database;

$config = require "../config.php";

$db = new Database($config["database"]);

view("notes/create.view.php", [
    'heading' => 'Create a note'
]);
