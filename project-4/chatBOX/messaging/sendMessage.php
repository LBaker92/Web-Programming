<?php
include '../db/db-config.php';
include '../includes/auto-inc-subtree.php';

$PDOAdapter = DatabaseAdapterFactory::create('PDO', array(DBCONNECTION, DBUSER, DBPASS));
$domainControl = new DomainLayerCollections($PDOAdapter);

$chatroom = $_POST['chatroom'];
$user = $_POST['user'];
$text = $_POST['message'];

$m = array("Chatroom" => $chatroom, "User" => $user, "Message" => $text);
$message = new Message($m);

$domainControl->insertMessage($message);

//echo json_encode($message);

?>