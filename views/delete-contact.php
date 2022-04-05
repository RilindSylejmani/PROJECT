<?php 
require_once '../controllers/MenuController.php';

if(isset($_GET['id'])){
    $contactId = $_GET['id'];

}

$contact = new MenuController;
$contact->deletMessages($contactId);