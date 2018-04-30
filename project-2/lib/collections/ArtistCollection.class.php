<?php
class ArtistCollection {
    private $artists = null;
    private $artistDB = null;
    
    public function __construct() {
        $this->artistDB = new ArtistDB();
        $artistArray = $this->artistDB->getAll();
        $this->artists = array();
        foreach($artistArray as $artist) {
            //use id as key
            $this->artists[$artist['ArtistID']] = new Artist($artist);
        }
    }
    
    public function get_artists() {
        return $this->artists;
    }
    
    public function get_artist_by_ID($id) {
        foreach($this->artists as $artist) {
            if ($artist->get_id() == $id) {
                return $artist;
            }
        }
        return null;
    }

    public function display_artist_dropdown() {
        $option = "";
        foreach ($this->artists as $artist) {
            $option .=  '<option value="' . $artist->get_id() . '">' . utf8_encode($artist->get_first_name()) . ' ' . utf8_encode($artist->get_last_name()) . '</option>';
        }
        return $option;
    }
}
?>