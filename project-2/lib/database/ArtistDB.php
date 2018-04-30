<?php
class ArtistDB {
    private static $baseSQL = 'SELECT * FROM artists';
    private static $order = ' order by LastName';
    private static $limit = ' LIMIT 30';

    public function __construct() { }

    public function getByID($id) {
        $sql = self::$baseSQL . ' WHERE ArtistID = ' . $id;
        $statement = DBUtil::runQuery($sql, null);
        return $statement->fetch();
    }
    
    public function getAll() {
        $sql = self::$baseSQL . self::$order;
        $statement = DBUtil::runQuery($sql, null);
        return $statement->fetchAll();        
    }    
}
?>