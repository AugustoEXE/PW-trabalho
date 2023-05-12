<?php
require(PROJECT_PATH . 'models/Model.php');
require(PROJECT_PATH . 'models/Document.php');

$docs = new Document();
$doc = $docs->getById($_GET['id']);
var_dump($doc);

$file = $doc[0]['name'];
   if(isset( $file) && file_exists(PROJECT_PATH . 'uploads/' . $file)){

      header("Content-Length: ".filesize($file));
      header("Content-Disposition: attachment; filename=".basename($file));
      readfile($file);
      exit; 
   }
