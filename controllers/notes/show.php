<?php

use Core\Database;

$config = require basePath('config.php');
$db = new Database($config['database']);

if ($_SERVER["REQUEST_METHOD"] === 'POST') {
  // form was submitted. delete the current note.

  $currentUserId = 25;

  $note = $db->query('select * from notes where id = :id', [
    'id' => $_GET['id']
  ])->findOrFail();

  authorize($note['user_id'] === $currentUserId);

  $db->query('delete from notes where id = :id', [
    ':id' => $_GET['id']
  ]);

  header('location: /notes');
  exit();
} else {

  $currentUserId = 1;

  $note = $db->query('select * from notes where id = :id', [
    'id' => $_GET['id']
  ])->findOrFail();

  authorize($note['user_id'] === $currentUserId);

  view("notes/show.view.php", [
    'heading' => 'Create Note',
    'note' => $note
  ]);
}
