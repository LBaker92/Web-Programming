<?php
class Glass {
    private $glass_ID = null;
    private $title = null;
    private $description = null;
    private $price = null;

    public function __construct($result) {
        $this->glass_ID = $result['GlassID'];
        $this->title = $result['Title'];
        $this->description = $result['Description'];
        $this->price = $result['Price'];
    }

    /**
     * Get the value of title
     */ 
    public function get_title()
    {
        return $this->title;
    }
}
?>