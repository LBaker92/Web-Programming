<?php
class TypeCollection {
    private $frames = null;
    private $glasses = null;
    private $matts = null;
    private $typeDB = null;

    public function __construct() {
        $this->typeDB = new TypeDB();
        $frameArray = $this->typeDB->get_frames();
        $this->frames = array();
        foreach ($frameArray as $frame) {
            $this->frames[$frame['FrameID']] = new Frame($frame);
        }

        $glassArray = $this->typeDB->get_glasses();
        $this->glass = array();
        foreach ($glassArray as $glass) {
            $this->glasses[$glass['GlassID']] = new Glass($glass);
        }

        $mattArray = $this->typeDB->get_matts();
        $this->matt = array();
        foreach ($mattArray as $matt) {
            $this->matts[$matt['MattID']] = new Matt($matt);
        }
    }

    public function get_frames() {
        return $this->frames;
    }

    public function get_glasses() {
        return $this->glasses;
    }

    public function get_matts() {
        return $this->matts;
    }
}
?>