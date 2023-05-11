<?php
require(PROJECT_PATH . "includes/loadTwig.php");
require(PROJECT_PATH . "includes/verifyAccess.php");
require(PROJECT_PATH . "Models/Model.php");
require(PROJECT_PATH . "Models/User.php");

$user = new User();

$users = $user->getAll();
// echo '<pre>';
// var_dump($users);
// die;


echo $twig->render("shareDoc.html", [
    'session' => $_SESSION['user'] ?? false,
    'users' => $users,
    'docId' => $_GET['id']
]);
