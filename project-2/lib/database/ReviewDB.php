<?php
class ReviewDB {
    private static $baseSQL = 'SELECT * FROM reviews';
    private static $limit = ' LIMIT 30';

    public function __construct() { }

    public function getByID($id) {
        $sql = self::$baseSQL . ' WHERE PaintingID = ' . $id;
        $statement = DBUtil::runQuery($sql, null);
        return $statement->fetch();
    }
    
    public function getAll() {
        $sql = self::$baseSQL;
        $statement = DBUtil::runQuery($sql, null);
        return $statement->fetchAll();        
    }    
}
?>