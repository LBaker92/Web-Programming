<?php
class GalleryCollection {
    private $galleries = null;
    private $galleryDB = null;

    public function __construct() {
        $this->galleryDB = new GalleryDB();
        $galleryArray = $this->galleryDB->getAll();
        $this->galleries = array();
        foreach($galleryArray as $gallery) {
          $this->galleries[$gallery['GalleryID']] = new Gallery($gallery);
		}
    }

    public function get_galleries() {
		return $this->galleries;
    }
    
    public function get_gallery_by_ID($id) {
        foreach ($this->galleries as $gallery) {
            if ($gallery->get_id() == $id) {
                return $gallery;
            }
        }
        return null;
    }
    
    public function display_museum_dropdown() {
        $option = "";
        foreach ($this->galleries as $gallery) {
            $option .=  '<option value="' . $gallery->get_id() . '">' . utf8_encode($gallery->get_name()) . '</option>';
        }
        return $option;
    }
}

?>