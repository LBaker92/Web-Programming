<?php
class ShapeDB {
    private static $baseSQL = "SELECT * FROM shapes";
    private static $order = ' order by ShapeName';

    public function __construct() { }
    
    public function getAll() {
        $sql = self::$baseSQL . self::$order;
        $statement = DBUtil::runQuery($sql, null);
        return $statement->fetchAll();        
    }    
}
?>