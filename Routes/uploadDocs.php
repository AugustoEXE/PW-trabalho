<?php
require(PROJECT_PATH. "includes/loadTwig.php");
session_start();

echo $twig->render("uploadDocs.html", [
    'session' => $_SESSION['user']?? false
]);