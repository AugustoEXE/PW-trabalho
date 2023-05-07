<?php
require(PROJECT_PATH . 'models/Model.php');
require(PROJECT_PATH . 'models/Document.php');
require(PROJECT_PATH . 'models/Users_Doc.php');
require(PROJECT_PATH . 'functions/sanitizeFilename.php');
require(PROJECT_PATH . 'functions/verifyFilename.php');
require(PROJECT_PATH . "includes/verifyAccess.php");




if (!$_FILES['file']['error']) {
    $fileName = sanitizeFilename($_FILES['file']['name']);

    $fileName = verifyFilename(PROJECT_PATH . 'uploads/', $fileName);

    move_uploaded_file($_FILES['file']['tmp_name'], PROJECT_PATH . 'uploads/' . $fileName);
}


$doc = new Document();


$error = $doc->create([
    'name' => $fileName,
]);

$lastDoc = $doc->getAll(["name" => $fileName]);

$access = new Users_Doc();

// echo "<pre>";
// var_dump($_SESSION['user']);
// var_dump($lastDoc->id);
// die;




$error = $access->create([
    'users_id' => $_SESSION['user'],
    'documents_id' => $lastDoc->id,
    'permissions' => 'edit'
]);

if (!$error[1]) {
    header("location: /listDocs");
    die;
} else {
    header('location: /listDocs/1');
    die;
}
