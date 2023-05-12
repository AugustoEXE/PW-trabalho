<?php
require(PROJECT_PATH . 'models/Model.php');
require(PROJECT_PATH . 'models/User.php');
require(PROJECT_PATH . "includes/verifyAccess.php");


$email = $_POST['email'];
$pass = $_POST['password'];

$users = new User;
$user = $users->getByEmail($email);

if ($user) {
    if (!password_verify($pass, $user->password)) {
        header('location: /login/400'); //mandar erro
        die;
    }

    session_start();
    $_SESSION['user'] = $user->id;
    $_SESSION['username'] = $user->name;
    header('location: /dashboard');
} else {
    header('location: /login/402'); //mandar erro
    die;
}
