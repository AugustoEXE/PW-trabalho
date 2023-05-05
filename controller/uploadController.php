<?php
require(PROJECT_PATH.'models/Model.php');
require(PROJECT_PATH.'models/Document.php');
require(PROJECT_PATH.'functions/sanitizeFilename.php');
require(PROJECT_PATH.'functions/verifyFilename.php');



    if (!$_FILES['file']['error']) {
        $fileName = sanitizeFilename($_FILES['file']['name']);
    
        $fileName = verifyFilename(PROJECT_PATH.'uploads/', $fileName);
    
        move_uploaded_file($_FILES['file']['tmp_name'], PROJECT_PATH.'uploads/' . $fileName);
    }


    $prod = new Document();

    $erro = $prod->create([
        'name' => $fileName,
    ]);


    if (!$erro[1]) {
        header("location: /listDocs");
        die;
    } else {
        header('location: #');
        die;
    }
