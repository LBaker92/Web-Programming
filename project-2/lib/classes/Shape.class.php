<?php
class Shape {
    private $shape_name = null;
    private $shape_ID = null;

    function __construct($result) {
        $this->shape_ID = $result['ShapeID'];
        $this->shape_name = $result['ShapeName'];
    }

    function get_shape_name() {
        return $this->shape_name;
    }

    function get_shape_ID() {
        return $this->shape_ID;
    }
}

?>