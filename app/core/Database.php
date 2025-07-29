<?php

class Database{
	private $host = DB_HOST;
	private $user = DB_USER;
	private $pass = DB_PASS;
	private $dbnm = DB_NAME;

	private $dbh;
	private $stmt;

	public function __construct()
	{
		// $connection = odbc_connect("Driver={SQL Server};Server=DESKTOP-PUJ0GAQ\MSSQLSERVER2;Database=bambi-bmi;","sa","123456");
		// $this->dbh =$connection;
		$dsn = 'Driver={SQL Server};Driver={SQL Server};Server=(LOCAL);Database='. $this->dbnm;

	
	
		try{
			$this->dbh = odbc_connect($dsn,$this->user,$this->pass);
		}catch(PDOException $e){
			die($e->getMessage());
		}
	}


	public function query($query)
	{
	
		$this->stmt = odbc_exec($this->dbh,$query);
	}

	public function bind($param, $value, $type = null){
		die(var_dump($param));
		if(is_null($type)){
			switch (true) {
				case is_int($value):
					$type = PDO::PARAM_INT;
					break;
				case is_bool($value):
					$type = PDO::PARAM_BOOL;
					break;
				case is_null($value):
					$type = PDO::PARAM_NULL;
					break;
				default:
					$type = PDO::PARAM_STR;
			}
		}

		$this->stmt->bindValue($param, $value, $type);
	}

	public function execute()
	{
		
		$this->stmt->execute();
	}

	public function resultSet()
	{

		$this->execute();
		return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function single()
	{

		$this->execute();
		return $this->stmt->fetch(PDO::FETCH_ASSOC);
	}

	public function rowCount()
	{
		return $this->stmt->rowCount();
	}


	public function baca_sql($sql){
	
		$db =$this->dbh;
		$result = odbc_exec($db,$sql);
		return $result;
	
	}


	private function confirm_query($result) {
		if (!$result) {
			die("Database query failed.");
		}

	}
}

