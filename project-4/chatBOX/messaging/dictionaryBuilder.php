<?php
include '../db/db-config.php';
include '../includes/auto-inc-subtree.php';

$PDOAdapter = DatabaseAdapterFactory::create('PDO', array(DBCONNECTION, DBUSER, DBPASS));
$domainControl = new DomainLayerCollections($PDOAdapter);

$messages = $domainControl->findAllMessages();

$dictionary = array();
foreach ($messages as $message) {
    $sentence = $message->Message;
    $words = explode(' ', $sentence);
    foreach($words as $word) {
        if (!in_array($word, $dictionary)) {
            array_push($dictionary, $word);
        }
    }
}

echo json_encode($dictionary);
?>