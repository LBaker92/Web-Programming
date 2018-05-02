<?php
class DomainLayerCollections {
    private $connection = null;
    private $userGate = null;
    private $groupGate = null;

    private $userCollection = array();
    private $groupCollection = array();

    function __construct($DBAdapter) {
        $this->connection = $DBAdapter;
        $this->userGate = new UserTableGateway($this->connection);
        $this->groupGate = new GroupTableGateway($this->connection);
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
        $user = $this->groupGate->findBy($WHERE);
        if (sizeof($group) > 0) {
            return $group[0];
        }
        return array();
    }

    public function insertGroup($group) {
        $this->groupGate->insertGroup($group);
    }
}

?>