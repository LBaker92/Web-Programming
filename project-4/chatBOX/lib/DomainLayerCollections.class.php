<?php
class DomainLayerCollections {
    private $connection = null;
    private $userGate = null;
    private $userCollection = array();

    function __construct($DBAdapter) {
        $this->connection = $DBAdapter;
        $this->userGate = new UserTableGateway($this->connection);
    }

    // public function findById($param) {
    //     $this->userCollection = $this->userGate->findById($param);
    //     return $this->userCollection;
    // }

    public function findAll() {
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
}

?>