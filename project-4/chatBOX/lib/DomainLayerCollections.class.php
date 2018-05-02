<?php
class DomainLayerCollections {
    private $connection = null;
    private $userGate = null;
    private $groupGate = null;
    private $messageGate = null;

    private $userCollection = array();
    private $groupCollection = array();
    private $messageCollection = array();

    function __construct($DBAdapter) {
        $this->connection = $DBAdapter;
        $this->userGate = new UserTableGateway($this->connection);
        $this->groupGate = new GroupTableGateway($this->connection);
        $this->messageGate = new MessageTableGateway($this->connection);
    }

    public function findAllUsers() {
        $this->userCollection = $this->userGate->findAll();
        return $this->userCollection;
    }

    public function findExistingUser($email, $username) {
        $WHERE = $email . " = '" . $username . "'";
        $user = $this->userGate->findBy($WHERE);
        if (sizeof($user) > 0) {
            return $user[0];
        }
        return array();
    }

    public function insertUser($user) {
        $this->userGate->insertUser($user);
    }

    public function findAllGroups() {
        $this->groupCollection = $this->groupGate->findAll();
        return $this->groupCollection;
    }

    public function findExistingGroup($title, $roomToJoin) {
        $WHERE = $title . " = '" . $roomToJoin . "'";
        $group = $this->groupGate->findBy($WHERE);
        if (sizeof($group) > 0) {
            return $group[0];
        }
        return array();
    }

    public function insertGroup($group) {
        $this->groupGate->insertGroup($group);
    }

    public function findAllMessages() {
        $this->messageCollection = $this->messageGate->findAll();
        return $this->messageCollection;
    }

    public function findAllMessagesByRoom($chatroom, $roomName) {
        $WHERE = $chatroom . " = '" . $roomName . "'";
        $messages = $this->messageGate->findBy($WHERE);
        if (sizeof($messages) > 0) {
            return $messages;
        }
        return array();
    }

    public function findMessagesByUser($email, $username) {
        $WHERE = $email . " = '" . $username . "'";
        $messages = $this->messageGate->findBy($WHERE);
        if (sizeof($messages) > 0) {
            return $messages[0];
        }
        return array();
    }


    public function insertMessage($message) {
        $this->messageGate->insertMessage($message);
    }
}

?>