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
    
    public static function spWarning() {
		self::initializeConnection();
		$result = null;
		try {
            $statement = self::$dbConn->prepare("CALL sp_ex_warning");
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
    
    public static function spExProductivity($startDate, $endDate) {
		self::initializeConnection();
		$result = null;
		try {
			$statement = self::$dbConn->prepare("CALL sp_ex_Productivity('".$startDate."', '".$endDate."')");
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
    
    public static function spExTodo($startDate, $endDate) {
		self::initializeConnection();
		$result = null;
		try {
			$statement = self::$dbConn->prepare("CALL sp_ex_todo('".$startDate."', '".$endDate."')");
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

	public static function spExTodoStaff($startDate, $endDate, $branch_id) {
		self::initializeConnection();
		$result = null;
		try {
			$statement = self::$dbConn->prepare("CALL sp_ex_todo_staff('".$startDate."', '".$endDate."', '".$branch_id."')");
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