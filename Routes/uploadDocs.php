<?php
require(PROJECT_PATH . "includes/loadTwig.php");
require(PROJECT_PATH . "includes/verifyAccess.php");

echo $twig->render("uploadDocs.html", [
    'session' => $_SESSION['user'] ?? false,
    'username' => $_SESSION['username'] ?? false

]);
