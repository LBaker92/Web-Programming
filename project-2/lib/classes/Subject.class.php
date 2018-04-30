<?php
class Subject {
    private $subject_ID = null;
    private $subject_name = null;

    function __construct($result) {
        $this->subject_ID = $result['SubjectID'];
        $this->subject_name = $result['SubjectName'];
    }

    function get_subject() {
        return $this->subject_name;
    }
}
?>