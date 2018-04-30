<?php
class PaintingCollection {
    private $paintings = null;
    private $paintingDB = null;
    
    public function __construct() {
        $this->paintingDB = new PaintingDB();
        $paintingArray = $this->paintingDB->getAll();
        $this->paintings = array();
        foreach($paintingArray as $painting) {
            $this->paintings[$painting['PaintingID']] = new Painting($painting);
        }
    }
    
    public function get_specific_collection($constraint) {
      $this->paintingDB = new PaintingDB();
      $paintingArray = $this->paintingDB->getWithConstraint($constraint);
      $this->paintings = array();
      foreach($paintingArray as $painting) {
        $this->paintings[$painting['PaintingID']] = new Painting($painting);
      }
    }

    public function get_painting_by_ID($id) {
      foreach ($this->paintings as $painting) {
        if ($painting->get_painting_ID() == $id) {
          return $painting;
        }
      }
      return null;
    }

    public function get_paintings() {
        return $this->paintings;
    }

    public function display_paintings() {
        foreach ($this->paintings as $painting) {
          $artist = ArtistDB::getByID($painting->get_artist_ID());
          echo 
      '<li class="item">
        <a class="ui small image" href="single-painting.php?PaintingID=' . $painting->get_painting_ID() . '">
          <img src="images/art/works/square-medium/' . $painting->get_image_file_name() . '.jpg">
        </a>
        <div class="content">
          <a class="header" href="single-painting.php?PaintingID=' . $painting->get_painting_ID() . '">' . utf8_encode($painting->get_title()) . '</a>
          <div class="meta">
            <span class="cinema">' . $artist['FirstName'] . ' ' . $artist['LastName'] . '</span>
          </div>
          <div class="description">
            <p>' . utf8_encode($painting->get_description()) . '</p>
          </div>
          <div class="meta">
            <strong>$' . (int)$painting->get_cost() . '</strong>
          </div>
          <div class="extra">
            <a class="ui icon orange button" href="#">
              <i class="add to cart icon"></i>
            </a>
            <a class="ui icon button" href="#">
              <i class="heart icon"></i>
            </a>
          </div>
        </div>
      </li>';
      }
  }
}
?>