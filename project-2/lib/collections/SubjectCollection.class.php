<?php
class SubjectCollection {
    private $subjects = null;
    private $subjectDB = null;

    public function __construct() {
        $this->subjectDB = new SubjectDB();
        $subjectArray = $this->subjectDB->getAll();
        $this->subjects = array();
        foreach($subjectArray as $subject) {
          $this->subjects[$subject['SubjectID']] = new Subject($subject);
        }
	}

    public function get_subjects() {
      return $this->subjects;
    }

    public function subjects_by_painting_ID($painting_ID) {
        $sql = 'SELECT DISTINCT subjects.SubjectName FROM subjects INNER JOIN (paintings INNER JOIN paintingsubjects ON paintings.PaintingID = ' . $painting_ID . ' AND paintingsubjects.PaintingID = '. $painting_ID . ') ON subjects.SubjectID = paintingsubjects.SubjectID';
        $this->subjectDB = new SubjectDB();
        $subjectArray = $this->subjectDB->getGenresWithStatement($sql);
        return $subjectArray;
    }
}
?>