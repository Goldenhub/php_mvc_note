<?php

use Core\App;
use Core\Database;

$db = App::resolver(Database::class);


$notes = $db->query('SELECT * FROM notes WHERE user_id = :userid', [':userid' => 1])->get();

view("notes/index.view.php", [
    'heading' => 'Notes',
    'notes' => $notes
]);
