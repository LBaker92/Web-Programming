<?php
class PaintingDB {
    private static $baseSQL = 'SELECT * FROM paintings';
    private static $constraint = "";
    private static $limit = ' LIMIT 30';

    public function __construct() { }

    public function getWithConstraint($cons) {
        $sql = self::$baseSQL . $cons . self::$limit;
        $statement = DBUtil::runQuery($sql, null);
        return $statement->fetchAll();  
    }

    public function getAll() {
        $sql = self::$baseSQL;
        $statement = DBUtil::runQuery($sql, null);
        return $statement->fetchAll();        
    }
    
    public function getAllLimit() {
        $sql = self::$baseSQL . self::$limit;
        $statement = DBUtil::runQuery($sql, null);
        return $statement->fetchAll();     
    }
}
?>