<?php
class Matt {
    private $matt_ID = null;
    private $title = null;
    private $color_code = null;

    public function __construct($result) {
        $this->matt_ID = $result['MattID'];
        $this->title = $result['Title'];
        $this->color_code = $result['ColorCode'];
    }

    /**
     * Get the value of Title
     */ 
    public function get_title()
    {
        return $this->title;
    }
}

?>