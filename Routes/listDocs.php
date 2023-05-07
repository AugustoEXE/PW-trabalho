<?php
require(PROJECT_PATH . "includes/loadTwig.php");
require(PROJECT_PATH . 'models/Model.php');
require(PROJECT_PATH . 'models/Document.php');
require(PROJECT_PATH . "includes/verifyAccess.php");


$file = new Document;

$files = $file->getAll();

echo $twig->render("listDocs.html", [
    "files" => $files,
    "session" => $_SESSION['user'] ?? false
]);
