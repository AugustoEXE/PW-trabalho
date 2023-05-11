<?php
require(PROJECT_PATH . "includes/loadTwig.php");
require(PROJECT_PATH . "includes/verifyAccess.php");
require(PROJECT_PATH . 'models/Model.php');
require(PROJECT_PATH . 'models/Document.php');
require(PROJECT_PATH . 'models/Users_doc.php');


$userDoc = new Users_Doc();
$doc = new Document;
$idDoc = intval($_GET['id']);
$idUser = $_SESSION['user'];
$userDoc->deleteWithAcess($idUser, $idDoc);
$doc->delete($idDoc);

header("location: /listDocs");
