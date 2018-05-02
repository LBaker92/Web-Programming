<?php

class GroupTableGateway extends TableDataGateway {

    public function __construct($dbAdapter) {
		parent::__construct($dbAdapter);
	}

	protected function getTableName() {
		return "chatrooms";
	}

	protected function getDomainObjectClassName() {
		return "Group";
	}

	protected function getOrderFields() {
		return "Title";
	}

	protected function getPrimaryKeyName() {
		return "Title";
	}

	public function insertGroup($group) {
		$this->dbAdapter->insert($this->getTableName(), $group->getFieldValues());
	}

}

?>