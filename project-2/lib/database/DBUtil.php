<?php
class DBUtil {
    private static $pdo = null;

    public function setConnection() {
        self::$pdo = PDODBConnector::getInstance()->getConnection();
    }

    public function runQuery($sql, $parameters=array()) {
        self::$pdo ?: self::setConnection();
        if (!is_array($parameters)) {
            $parameters = array($parameters);
        }
        $statement = null;
        if (count($parameters) > 0) {
            $statement = self::$pdo->prepare($sql);
            $executedOk = $statement->execute($parameters);
            if (! $executedOk) {
                throw new PDOException;
            }
        } else {   
            $statement = self::$pdo->query($sql); 
            if (!$statement) {
                throw new PDOException;
            }
        }
        return $statement;
    }    
}
?>