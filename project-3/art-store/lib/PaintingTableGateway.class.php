<?php
/*
  Table Data Gateway for the Painting table. 
 */
class PaintingTableGateway extends TableDataGateway
{    
   public function __construct($dbAdapter) 
   {
      parent::__construct($dbAdapter);
   }
  
   protected function getDomainObjectClassName()  
   {
      return "Painting";
   } 

   protected function getTableName()
   {
      return "Paintings";   //May be case sensitive
   }

   protected function getOrderFields() 
   {
      return 'Title';
   }

   protected function getPrimaryKeyName() {
      return "PaintingID";
   }

   public function getAllByGenre($genreID) {
       $sql = "SELECT paintings.* FROM paintings INNER JOIN paintinggenres ON paintings.PaintingID=paintinggenres.PaintingID INNER JOIN genres ON genres.GenreID=paintinggenres.GenreID WHERE genres.GenreID=?";

       $result = $this->dbAdapter->fetchAsArray($sql, Array($genreID));

       return $this->convertRecordsToObjects($result); 
   }
   
   public function getAllByArtist($artistID) {
       $sql = "SELECT * FROM Paintings WHERE artistID=?";

       $result = $this->dbAdapter->fetchAsArray($sql, Array($artistID));

       return $this->convertRecordsToObjects($result); 
   }

   public function getAllByGallery($galleryID) {
       $sql = "SELECT * FROM Paintings WHERE galleryID=?";
       
       $result = $this->dbAdapter->fetchAsArray($sql, Array($galleryID));
       
       return $this->convertRecordsToObjects($result); 
    }

    public function getAllByShape($shapeID) {
        $sql = "SELECT * FROM Paintings WHERE shapeID=?";
        
        $result = $this->dbAdapter->fetchAsArray($sql, Array($shapeID));
        
        return $this->convertRecordsToObjects($result); 
     }

    protected function getSelectStatement() {
        $sql = "SELECT paintings.*, galleries.GalleryName FROM paintings INNER JOIN galleries ON galleries.GalleryID = paintings.GalleryID";
        
        return $sql;
    }
}

?>