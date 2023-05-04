<?php
$pagina = $_GET['pagina'] ?? false;
define('PROJECT_PATH', "C:/xampp/htdocs/3info/PW-trabalho/");


$include =  filter_var("{$pagina}.php", FILTER_SANITIZE_STRING);
var_dump('controller/'.$include);
die;
if(file_exists('controller/'.$include)){
    require("controller/{$pagina}.php");
}elseif(file_exists($include)){
    require("{$pagina}.php");
}elseif(!file_exists($include)){
    echo 404;
    die;
}

