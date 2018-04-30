<?php
/*
  Table Data Gateway for the Artist table. 
 */
class SubjectTableGateway extends TableDataGateway
{    
   public function __construct($dbAdapter) 
   {
      parent::__construct($dbAdapter);
   }
  
   protected function getDomainObjectClassName()  
   {
      return "Subject";
   } 
   protected function getTableName()
   {
      return "Subjects";
   }
   protected function getOrderFields() 
   {
      return 'SubjectName';
   }
   
   protected function getPrimaryKeyName() {
      return "SubjectID";
   }
   
   public function findForPainting($paintingID) {
       $sql = "SELECT Subjects.* FROM Subjects INNER JOIN paintingsubjects ON subjects.SubjectID=paintingsubjects.SubjectID WHERE paintingsubjects.PaintingID=?";

       $result = $this->dbAdapter->fetchAsArray($sql, Array($paintingID));

       return $this->convertRecordsToObjects($result); 
   }
}

?>