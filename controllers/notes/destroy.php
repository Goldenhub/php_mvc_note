<?php

use Core\{Database, Response, App};

$db = App::resolver(Database::class);

// dd($db);

$currentuser = 1;
$note = $db->query('SELECT * FROM notes WHERE id = :id', [
    ':id' => $_POST['id']
])->fetchOne();

authorize($note['user_id'] === $currentuser, Response::FORBIDDEN);

$db->query('DELETE FROM notes WHERE id = :id', [
    ':id' => $_POST['id'],
]);

exit(header("Location: /notes"));