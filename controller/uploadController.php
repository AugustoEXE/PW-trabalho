<?php
require(PROJECT_PATH . 'models/Model.php');
require(PROJECT_PATH . 'models/Document.php');
require(PROJECT_PATH . 'models/User.php');
require(PROJECT_PATH . 'models/Users_Doc.php');
require(PROJECT_PATH . 'functions/sanitizeFilename.php');
require(PROJECT_PATH . 'functions/verifyFilename.php');
require(PROJECT_PATH . "includes/verifyAccess.php");

$timezone = new DateTimeZone('America/Sao_Paulo');
$now = new DateTime('now', $timezone);



if (!$_FILES['file']['error']) {
    $fileName = sanitizeFilename($_FILES['file']['name']);

    $fileName = verifyFilename(PROJECT_PATH . 'uploads/', $fileName);

    move_uploaded_file($_FILES['file']['tmp_name'], PROJECT_PATH . 'uploads/' . $fileName);
}


$doc = new Document();
$user = new User();

$owner = $user->getById(intval($_SESSION['user']));

$error = $doc->create([
    'name' => $fileName,
    'owner' => $owner[0]['name'],
    'include_date' => $now->format('Y-m-d')
]);

$lastDoc = $doc->getAll(["name" => $fileName]);
$access = new Users_Doc();

// echo "<pre>";
// var_dump($_SESSION['user']);
// var_dump($lastDoc->id);
// die;




$error = $access->create([
    'users_id' => $_SESSION['user'],
    'documents_id' => $lastDoc[0]['id'],
    'permissions' => 'edit'
]);

if (!$error[1]) {
    header("location: /listDocs");
    die;
} else {
    header('location: /listDocs/1');
    die;
}
