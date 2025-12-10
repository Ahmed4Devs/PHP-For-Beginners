<?php

// our routes ( URLs in out website). we can add more :)
return [
  '/' => 'controllers/index.php',
  '/about' => 'controllers/about.php',
  '/notes' => 'controllers/notes/index.php',
  '/note' => 'controllers/notes/show.php',
  '/notes/create' => 'controllers/notes/create.php',
  '/contact' => 'controllers/contact.php',
];
