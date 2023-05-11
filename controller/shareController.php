<?php
require(PROJECT_PATH . "includes/verifyAccess.php");
require(PROJECT_PATH . 'models/Model.php');
require(PROJECT_PATH . 'models/User.php');
require(PROJECT_PATH . 'models/Users_Doc.php');

$access = new Users_Doc();
$userId = $_POST['userId'];
$docId = $_POST['docId'];
if($_POST['permission'] < 0){
    header("location: /listDocs/400");
    die;
}
$permission = $_POST['permission'] == 1 ? 'edit' : 'view';


try {

    $access->create([
        'users_id' => $userId,
        'documents_id' => $docId,
        'permissions' => $permission
    ]);

    header("location: /listDocs/200");

} catch (Exception $e) {
    return $e;
}



// echo '<pre>';
// var_dump($_POST);
