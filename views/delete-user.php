<?php
require_once '../controllers/userControllers.php';

$user = new userControllers;

if(isset($_GET['id'])){
    $userId=$_GET['id'];
}
$user->deleteUser($userId);
?>
