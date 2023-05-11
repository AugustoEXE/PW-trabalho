<?php
$pagina = $_GET['pagina'] ?? false;

//IF
define('PROJECT_PATH', "C:/xampp/htdocs/3info/PW-trabalho/");
//Casa
// define('PROJECT_PATH', "C:/xampp/htdocs/pw/PW-trabalho/");

$include =  filter_var("{$pagina}.php", FILTER_SANITIZE_STRING);

if (file_exists(PROJECT_PATH . 'controller/' . $include)) {
    require(PROJECT_PATH . "controller/{$pagina}.php");
} elseif (file_exists($include)) {
    require("{$pagina}.php");
} elseif (!file_exists($include)) {
    echo 404;
    die;
}
