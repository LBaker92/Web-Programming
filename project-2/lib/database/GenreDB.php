<?php
class GenreDB {
    private static $baseSQL = 'SELECT * FROM genres';

    public function __construct() { }

    public function getAll() {
        $sql = self::$baseSQL;
        $statement = DBUtil::runQuery($sql, null);
        return $statement->fetchAll();        
    }

    public function getGenresWithStatement($sql) {
        $statement = DBUtil::runQuery($sql, null);
        return $statement->fetchAll();
    }
}
?>