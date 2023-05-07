<?php
session_start();
if (isset($_SESSION['user'])) {
    //IF
    // header("location: localhost:8080/dashboard");
    //casa
    // echo 'oi';
    // die;
    header("location: localhost:8000/dashboard");
} else {

    //casa
    header("location: localhost:8000/login");
    //IF
    // header("location: localhost:8080/login");

}
