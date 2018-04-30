<?php
class Genre {
    private $genre_ID = null;
    private $genre_name = null;
    private $era_ID = null;
    private $genre_desc = null;
    private $genre_link = null;

    function __construct($result) {
        $this->genre_ID = $result['GenreID'];
        $this->genre_name = $result['GenreName'];
        $this->era_ID = $result['EraID'];
        $this->genre_desc = $result['Description'];
        $this->genre_link = $result['Link'];
    }

    function get_id() {
        return $this->genre_ID;
    }

    function get_name() {
        return $this->genre_name;
    }

    function get_era_ID() {
        return $this->era_ID;
    }

    function get_desc() {
        return $this->genre_desc;
    }

    function get_link() {
        return $this->genre_link;
    }
}
?>