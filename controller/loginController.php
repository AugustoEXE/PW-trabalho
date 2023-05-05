<?php
require(PROJECT_PATH.'models/Model.php');
require(PROJECT_PATH.'models/User.php');

$email = $_POST['email'];
$pass = $_POST['password'];

$users = new User;
$user = $users->getByEmail($email);

if($user){
    if (!password_verify($pass, $user->password)) {
        header('location: /login'); //mandar erro
        die;
    } 
    
    session_start();
    $_SESSION['user'] = $user->email;
    header('location: /dashboard');

}else{
    header('location: /login'); //mandar erro
    die;
}


