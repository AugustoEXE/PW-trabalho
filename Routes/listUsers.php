<?php
require(PROJECT_PATH . "includes/loadTwig.php");
require(PROJECT_PATH . "includes/verifyAccess.php");

echo $twig->render("listUser.html", [
    'session' => $_SESSION['user'] ?? false
]);
