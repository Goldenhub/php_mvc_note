<?php

use Core\Database;

$config = require "../config.php";

$db = new Database($config["database"]);


$notes = $db->query('SELECT * FROM notes WHERE user_id = :userid', [':userid' => 1])->get();

view("notes/index.view.php", [
    'heading' => 'Notes',
    'notes' => $notes
]);
