<?php

use Core\{Database, Response};

$config = require "../config.php";
$currentuser = 1;


$db = new Database($config["database"]);
$note = $db->query('SELECT * FROM notes WHERE id = :id', [
    ':id' => $_GET['id'],
])->fetchOne();

authorize($note['user_id'] === $currentuser, Response::FORBIDDEN);


view("notes/show.view.php", [
    'heading' => 'Note',
    'note' => $note
]);
