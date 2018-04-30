<?php
class ShapeCollection {
    private $shapes = null;
    private $shapeDB = null;

    public function __construct() {
        $this->shapeDB = new ShapeDB();
        $shapeArray = $this->shapeDB->getAll();
        $this->shapes = array();
        foreach($shapeArray as $shape) {
          //use shape name as key
          $this->shapes[$shape['ShapeName']] = new Shape($shape);
		}
    }

    public function get_shapes(){
		return $this->shapes;
    }
    
    public function display_shape_dropdown() {
        $option = "";
        foreach ($this->shapes as $shape) {
            $option .=  '<option value="' . $shape->get_shape_ID() . '">' . $shape->get_shape_name() . '</option>';
        }
        return $option;
    }
}
?>