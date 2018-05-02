<?php

class Group extends DomainObject {

    public function getFieldValues() {
        return $this->fieldValues;
    }

    static function getFieldNames() {
        return array("Title", "Text", "UsersInRoom", "Link");
    }

    public function __construct(array $data, $generateExc = false) {
        parent::__construct($data, $generateExc);
	}

}

?>