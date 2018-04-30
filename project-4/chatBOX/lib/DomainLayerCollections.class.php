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

    public function insertUser($user) {
        $this->userGate->insertUser($user);
    }
}

?>