<?php
include 'db/db-config.php';
include 'includes/auto-inc.php';

$PDOAdapter = DatabaseAdapterFactory::create('PDO', array(DBCONNECTION, DBUSER, DBPASS));
$domainControl = new DomainLayerCollections($PDOAdapter);

if ( !empty($_POST['chatroom']) ) {
    $chatroom = $_POST['chatroom'];
}

$messages = $domainController->findAllMessages("Chatroom", $chatroom);

$messageArray = array();
for ($i = 0; $i < sizeof($messages); ++$i) {
    $messageArray[$i] = array("User" => $messages[$i]->User, "Message" => $messages[$i]->Message);
}
//print_r($messageArray);
echo json_encode($messageArray);

?>