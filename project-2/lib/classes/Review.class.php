<?php
class Review {
    private $rating_ID = null;
    private $painting_ID = null;
    private $review_date = null;
    private $rating = null;
    private $comment = null;

    function __construct($result) {
        $this->rating_ID = $result['RatingID'];
        $this->painting_ID = $result['PaintingID'];
        $this->review_date = $result['ReviewDate'];
        $this->rating = $result['Rating'];
        $this->comment = $result['Comment'];
    }

    function get_r_id() {
        return $this->rating_ID;
    }

    function get_p_id() {
        return $this->painting_ID;
    }

    function get_review_date() {
        return $this->review_date;
    }

    function get_rating() {
        return $this->rating;
    }

    function get_comment() {
        return $this->comment;
    }
}
?>