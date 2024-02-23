<?php

use Core\{Database, Response, App};

$db = App::resolver(Database::class);

$currentuser = 1;

$note = $db->query('SELECT * FROM notes WHERE id = :id', [
    ':id' => $_GET['id'],
])->fetchOne();


authorize($note['user_id'] === $currentuser, Response::FORBIDDEN);

view("notes/edit.view.php", [
    'heading' => 'Edit note',
    'note' => $note
]);
