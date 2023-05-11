<?php
require(PROJECT_PATH . 'models/Model.php');
require(PROJECT_PATH . 'models/Document.php');

$docs = new Document();
$doc = $docs->getById($_GET['id']);
var_dump($doc);

$arquivo = $doc[0]['name'];
   if(isset( $arquivo) && file_exists(PROJECT_PATH . 'uploads/' . $arquivo)){

      header("Content-Type: ".$tipo);
      header("Content-Length: ".filesize($arquivo));
      header("Content-Disposition: attachment; filename=".basename($arquivo));
      readfile($arquivo); // lê o arquivo
      exit; // aborta pós-ações
   }
