<?php

class Message extends DomainObject {

    public function getFieldValues() {
        return $this->fieldValues;
    }

    static function getFieldNames() {
        return array("Chatroom", "User", "Message", "Time");
    }

    public function __construct(array $data, $generateExc = false) {
        parent::__construct($data, $generateExc);
	}

}

?>