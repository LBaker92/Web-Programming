<?php
class TypeDB {
    private static $frame_SQL = 'SELECT * FROM typesframes';
    private static $glass_SQL = 'SELECT * FROM typesglass';
    private static $matt_SQL = 'SELECT * FROM typesmatt';

    public function __constructor() { }

    public function get_frames() {
        $sql = self::$frame_SQL;
        $statement = DBUtil::runQuery($sql, null);
        return $statement->fetchAll(); 
    }

    public function get_glasses() {
        $sql = self::$glass_SQL;
        $statement = DBUtil::runQuery($sql, null);
        return $statement->fetchAll(); 
    }

    public function get_matts() {
        $sql = self::$matt_SQL;
        $statement = DBUtil::runQuery($sql, null);
        return $statement->fetchAll(); 
    }
}
?>