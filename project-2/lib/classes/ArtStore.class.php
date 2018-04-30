<?php
class ArtStore {
    private $artist_collection = null;
    private $gallery_collection = null;
    private $genre_collection = null;
    private $shape_collection = null;
    private $painting_collection = null;
    private $subject_collection = null;
    private $review_collection = null;
    private $type_collection = null;

    //collections for joined tables should come next

    //create the collections
    public function __construct() {
        $this->artist_collection = new ArtistCollection();
        $this->gallery_collection = new GalleryCollection();
        $this->genre_collection = new GenreCollection();
        $this->shape_collection = new ShapeCollection();
        $this->painting_collection = new PaintingCollection();
        $this->subject_collection = new SubjectCollection();
        $this->review_collection = new ReviewCollection();
        $this->type_collection = new TypeCollection();
    }

    public function get_artist_collection() {
        return $this->artist_collection;
    }

    public function get_gallery_collection() {
        return $this->gallery_collection;
    }

    public function get_genre_collection() {
        return $this->genre_collection;
    }

    public function get_shape_collection() {
        return $this->shape_collection;
    }

    public function get_painting_collection() {
        return $this->painting_collection;
    }

    public function get_subject_collection() {
        return $this->subject_collection;
    }

    public function get_review_collection() {
        return $this->review_collection;
    }

    public function get_type_collection() {
        return $this->type_collection;
    }

    public function get_painting_collection_with_params($constraint) {
        $this->painting_collection->get_specific_collection($constraint);
        return $this->painting_collection;
    }

    public function get_painting_collection_by_ID($id) {
        $this->painting_collection = $this->painting_collection->get_painting_by_ID($id);
        return $this->painting_collection;
    }
}
?>