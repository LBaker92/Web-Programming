<?php

class MessageTableGateway extends TableDataGateway {

    public function __construct($dbAdapter) {
		parent::__construct($dbAdapter);
	}

	protected function getTableName() {
		return "messages";
	}

	protected function getDomainObjectClassName() {
		return "Message";
	}

	protected function getOrderFields() {
		return "Chatroom";
	}

	protected function getPrimaryKeyName() {
		return "User";
	}

	public function insertMessage($message) {
		$this->dbAdapter->insert($this->getTableName(), $message->getFieldValues());
    }
    

}

?>