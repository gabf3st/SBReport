<?php

class InteriorTracking {

	private static $dbConn = null;
    
	public function __construct() {
		self::initializeConnection();
	}

	private static function initializeConnection() {
		if (is_null(self::$dbConn)) {
			self::$dbConn = DatabasePDO::getInstance();
		}
	}
    
    public static function spExWarning() {
		self::initializeConnection();
		try {
			$statement = self::$dbConn->query("CALL sp_ex_warning");
			$statement->execute();
			$statement->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
			$result = $statement->fetchAll();
		}
		catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
			die();
		}
		return $result;
	}
    
    

}