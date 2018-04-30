<?php

class UserTableGateway extends TableDataGateway {

    public function __construct($dbAdapter) {
		parent::__construct($dbAdapter);
	}

	protected function getTableName() {
		return "users";
	}

	protected function getDomainObjectClassName() {
		return "User";
	}

	protected function getOrderFields() {
		return "Name";
	}

	protected function getPrimaryKeyName() {
		return "Email";
	}

	public function insertUser($user) {
		var_dump($user);
		$this->dbAdapter->insert($this->getTableName(), $user->getFieldValues());
	}

}

?>