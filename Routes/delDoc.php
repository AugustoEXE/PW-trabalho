<?php
require(PROJECT_PATH . "includes/loadTwig.php");
require(PROJECT_PATH . "includes/verifyAccess.php");
require(PROJECT_PATH . 'models/Model.php');
require(PROJECT_PATH . 'models/Document.php');

$doc = new Document();
$id = $_GET['id'];
$doc->delete($id);

header("location: /listDocs");
