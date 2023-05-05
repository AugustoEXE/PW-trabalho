<?php

    require(PROJECT_PATH.'vendor/autoload.php');

    $loader = new \Twig\Loader\FilesystemLoader(PROJECT_PATH.'templates');
    $twig = new \Twig\Environment($loader);