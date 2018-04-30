<?php
class Frame {
    private $frame_ID = null;
    private $title = null;
    private $price = null;
    private $color = null;
    private $style = null;

    public function __construct($result) {
        $this->frame_ID = $result['FrameID'];
        $this->title = $result['Title'];
        $this->color = $result['Color'];
        $this->price = $result['Price'];
        $this->style = $result['Syle'];
    }

    public function get_title() {
        return $this->title;
    }
}

?>