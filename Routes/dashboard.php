<?php
require(PROJECT_PATH. "includes/loadTwig.php");
session_start();
echo $twig->render("dashboard.html", [
    'session' => $_SESSION['user'] ?? false
]);