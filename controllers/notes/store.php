<?php

use Core\{Database, Validator, App};

$db = App::resolver(Database::class);


$note = $_POST['note'];
$error = [];

if (! Validator::string($note, 1, 1000)) {
    $error['body'] = "Note must be greater than one and less than 1000 characters";
}

if (!empty($error)) {
    exit(view("notes/index.view.php", [
        'heading' => 'Create a note'
    ]));
}

$db->query("INSERT INTO `notes` (body, user_id) VALUES (:note, :id)", [':note' => $note, ':id' => 1]);

header("Location: /notes");
exit();
