<?php
class Painting {
    private $painting_ID = null;
    private $artist_ID = null;
    private $gallery_ID = null;
    private $image_file_name = null;
    private $title = null;
    private $shape_ID = null;
    private $museum_link = null;
    private $accession_number = null;
    private $copyright = null;
    private $description = null;
    private $excerpt = null;
    private $year_of_work = null;
    private $width = null;
    private $height = null;
    private $medium = null;
    private $cost = null;
    private $msrp = null;
    private $google_link = null;
    private $google_description = null;
    private $wiki_link = null;

    public function __construct($result) {
        $this->painting_ID = $result['PaintingID'];
        $this->artist_ID = $result['ArtistID'];
        $this->gallery_ID = $result['GalleryID'];
        $this->image_file_name = $result['ImageFileName'];
        $this->title = $result['Title'];
        $this->shape_ID = $result['ShapeID'];
        $this->museum_link = $result['MuseumLink'];
        $this->accession_number = $result['AccessionNumber'];
        $this->copyright = $result['CopyrightText'];
        $this->description = $result['Description'];
        $this->excerpt = $result['Excerpt'];
        $this->year_of_work = $result['YearOfWork'];
        $this->width = $result['Width'];
        $this->height = $result['Height'];
        $this->medium = $result['Medium'];
        $this->cost = $result['Cost'];
        $this->msrp = $result['MSRP'];
        $this->google_link = $result['GoogleLink'];
        $this->google_description = $result['GoogleDescription'];
        $this->wiki_link = $result['WikiLink'];
    }

    /**
     * Get the value of painting_ID
     */ 
    public function get_painting_ID() {
        return $this->painting_ID;
    }

    /**
     * Get the value of artist_ID
     */ 
    public function get_artist_ID() {
        return $this->artist_ID;
    }

    /**
     * Get the value of gallery_ID
     */ 
    public function get_gallery_ID() {
        return $this->gallery_ID;
    }

    /**
     * Get the value of image_file_name
     */ 
    public function get_image_file_name() {
        return $this->image_file_name;
    }

    /**
     * Get the value of title
     */ 
    public function get_title() {
        return $this->title;
    }

    /**
     * Get the value of shape_ID
     */ 
    public function get_shape_ID() {
        return $this->shape_ID;
    }

    /**
     * Get the value of museum_link
     */ 
    public function get_museum_link() {
        return $this->museum_link;
    }

    /**
     * Get the value of accession_number
     */ 
    public function get_accession_number() {
        return $this->accession_number;
    }

    /**
     * Get the value of copyright
     */ 
    public function get_copyright() {
        return $this->copyright;
    }

    /**
     * Get the value of description
     */ 
    public function get_description() {
        return $this->description;
    }

    /**
     * Get the value of excerpt
     */ 
    public function get_excerpt() {
        return $this->excerpt;
    }

    /**
     * Get the value of year_of_work
     */ 
    public function get_year_of_work() {
        return $this->year_of_work;
    }

    /**
     * Get the value of width
     */ 
    public function get_width() {
        return $this->width;
    }

    /**
     * Get the value of height
     */ 
    public function get_height() {
        return $this->height;
    }

    /**
     * Get the value of medium
     */ 
    public function get_medium() {
        return $this->medium;
    }

    /**
     * Get the value of cost
     */ 
    public function get_cost() {
        return $this->cost;
    }

    /**
     * Get the value of msrp
     */ 
    public function get_msrp() {
        return $this->msrp;
    }

    /**
     * Get the value of google_link
     */ 
    public function get_google_link() {
        return $this->google_link;
    }

    /**
     * Get the value of google_description
     */ 
    public function get_google_description() {
        return $this->google_description;
    }

    /**
     * Get the value of wiki_link
     */ 
    public function get_wiki_link() {
        return $this->wiki_link;
    }
}
?>