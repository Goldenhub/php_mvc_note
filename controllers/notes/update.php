<?php

use Core\{Database, Response, App, Validator};

$db = App::resolver(Database::class);


$currentuser = 1;

$note = $db->query('SELECT * FROM notes WHERE id = :id', [
    ':id' => $_POST['id']
])->fetchOne();


authorize($note['user_id'] === $currentuser, Response::FORBIDDEN);

$errors = [];

if (! Validator::string($_POST['note'], 1, 1000)) {
    $errors['body'] = "Note must be greater than one and less than 1000 characters";
}


if(count($errors)){
    return view('notes/edit.view.php', [
        "heading" => 'Edit Note',
        "errors" => $errors,
        'note' => $note
    ]);
}

$db->query('UPDATE notes SET body = :body WHERE id = :id', [
    ':id' => $_POST['id'],
    'body' => $_POST['note']
]);

exit(header("Location: /notes"));