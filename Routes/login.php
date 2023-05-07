<?php
require(PROJECT_PATH . "includes/loadTwig.php");
session_start();

echo $twig->render("login.html", [
    'session' => $_SESSION['user'] ?? false,
    'error' => $_GET['id'] ?? false
]);
