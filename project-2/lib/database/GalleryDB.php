<?php
class GalleryDB {
    private static $baseSQL = 'SELECT * FROM galleries';
    private static $order = ' order by GalleryName';
    private static $limit = ' LIMIT 30';

    public function __construct() { }

    public function getAll() {
        $sql = self::$baseSQL . self::$order;
        $statement = DBUtil::runQuery($sql, null);
        return $statement->fetchAll();        
    } 
}
?>