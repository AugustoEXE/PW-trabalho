<?php
require(PROJECT_PATH . 'models/Model.php');
require(PROJECT_PATH . 'models/User.php');
require(PROJECT_PATH . "includes/verifyAccess.php");

$name = $_POST['name'] ?? false;
$email = $_POST['email'] ?? false;
$pass = $_POST['password'] ?? false;

if (!$user || !$pass) {
    header("location: /novoUsuario");
}

$pass = password_hash($pass, PASSWORD_BCRYPT);


$usr = new User();

$erro = $usr->create([
    'name' => $name,
    'password' => $pass,
    'email' => $email,
]);


if (!$erro[1]) {
    header("location: /listUsers");
    die;
} else {
    header('location: /cadUser');
    die;
}
