<?php
include '../db/db-config.php';
include '../includes/auto-inc-subtree.php';

$PDOAdapter = DatabaseAdapterFactory::create('PDO', array(DBCONNECTION, DBUSER, DBPASS));
$domainControl = new DomainLayerCollections($PDOAdapter);

if ( !empty($_GET['chatroom']) ) {
    $chatroom = $_GET['chatroom'];
}

$messages = $domainControl->findAllMessages("Chatroom", $chatroom);

$messageArray = array();
for ($i = 0; $i < sizeof($messages); ++$i) {
    $messageArray[$i] = array("User" => $messages[$i]->User, "Message" => $messages[$i]->Message);
    echo "<b>" . $messages[$i]->User . "</b>:" . $messages[$i]->Message;
    echo "<br>";
}

echo json_encode($messageArray);

?>