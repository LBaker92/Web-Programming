<?php
class ReviewCollection {
    private $reviews = null;
    private $reviewDB = null;
    
    public function __construct() {
        $this->reviewDB = new ReviewDB();
        $reviewArray = $this->reviewDB->getAll();
        $this->reviews = array();
        foreach($reviewArray as $review) {
            //use id as key
            $this->reviews[$review['RatingID']] = new review($review);
        }
    }
    
    public function get_reviews() {
        return $this->reviews;
    }
    
    public function get_reviews_by_ID($id) {
        $reviews = array();
        foreach ($this->reviews as $review) {
            if ($review->get_p_id() == $id) {
                array_push($reviews, $review);
            }
        }
        return $reviews;
    }
}
?>