<?php
require(PROJECT_PATH . "includes/loadTwig.php");
require(PROJECT_PATH . 'models/Model.php');
require(PROJECT_PATH . 'models/Document.php');
require(PROJECT_PATH . 'models/User.php');
require(PROJECT_PATH . "includes/verifyAccess.php");


$file = new Document();
$users = new User();

$user = $users->getById($_SESSION['user']);


$files = $file->getWithUser($_SESSION['user']);

$owner = $user[0]['name'];


// echo '<pre>';
// var_dump($owner);
// die;

if (isset($_POST['search'])) {
    $search = $_POST['search'] ?? null;
    $searchMethod = $_POST['searchMethod'] ?? null;
    $filter = $_POST['filter'] ?? 1;
    $isFiltered = true;
    if ($searchMethod == 1) {
        $files = $file->getAll(['owner' => $search]);
    } elseif ($searchMethod == 2) {
        $files = $file->getAll(['include_date' => $search]);
    } elseif ($searchMethod == 3) {
        $files = $file->getById(intval($search));
    }

    if ($filter == 0) {
        $isFiltered = false;
    }
}


echo $twig->render("listDocs.html", [
    "files" => $files,
    'isFiltered' => $isFiltered ?? false,
    "session" => $_SESSION['user'] ?? false,
    'error' => $_GET['id'],
    'owner' => $owner
]);
