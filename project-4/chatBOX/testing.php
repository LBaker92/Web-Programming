<?php
include 'db/db-config.php';
include 'includes/auto-inc.php';

$PDOAdapter = DatabaseAdapterFactory::create('PDO', array(DBCONNECTION, DBUSER, DBPASS));
$domainControl = new DomainLayerCollections($PDOAdapter);


// $messageContext = array("Chatroom" => "Test", "User" => "Zenrion@gmail.com", "Message" => "SECOND TEST");

// $m = new Message($messageContext);
// print_r($m);

// $domainControl->insertMessage($m);
// $messages = $domainControl->findAllMessages();



// $zen = $domainControl->findMessagesByUser("User", "Zenrion@gmail.com");
// foreach($zen as $message) {
//     print_r($message->User);
//     echo "<br>";
//     print_r($message->Message);
//     echo "<br>";
//     print_r($message->Time);
//     echo "<br>";
//     echo "<br>";
// }


$chatroom = "Test";
$messages = $domainControl->findAllMessagesByRoom("Chatroom", $chatroom);

$messageArray = array();

for ($i = 0; $i < sizeof($messages); ++$i) {
    $messageArray[$i] = array("User" => $messages[$i]->User, "Message" => $messages[$i]->Message);
}
echo json_encode($messageArray);
// foreach($messages as $message) {
//     echo "<b>" . $message->User . "</b>: " . $message->Message;
//     echo "<br>";
// }


?>