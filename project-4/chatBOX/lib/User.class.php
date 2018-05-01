<?php

class User extends DomainObject {

    public function getFieldValues() {
        return $this->fieldValues;
    }

    static function getFieldNames() {
        return array("Email", "Password", "Name");
    }

    public function __construct(array $data, $generateExc = false) {
        parent::__construct($data, $generateExc);
	}

}

?>