<?php
class GenreCollection {
    private $genres = null;
    private $genreDB = null;
    
    public function __construct() {
      $this->genreDB = new GenreDB();
        $genreArray = $this->genreDB->getAll();
        $this->genres = array();
        foreach($genreArray as $genre) {
          //use id as key
          $this->genres[$genre['GenreID']] = new Genre($genre);
        }
     }
     
     public function get_genres() {
      return $this->genres;
    }
  
    //returns an array of strings which are the genre names
    public function genres_by_painting_ID($painting_ID) {
      $sql = 'SELECT DISTINCT genres.GenreName FROM genres INNER JOIN (paintings INNER JOIN paintinggenres ON paintings.PaintingID = ' . $painting_ID . ' AND paintinggenres.PaintingID = '. $painting_ID . ') ON genres.GenreID = paintinggenres.GenreID';
      $this->genreDB = new GenreDB();
      $genreArray = $this->genreDB->getGenresWithStatement($sql);
      return $genreArray;
    }
}
?>