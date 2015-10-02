<?php 
	//constants
	define("dbhost", "localhost");
	define("dbuser", "root");
	define("database","dashboard");
	define("pass", "");

	class database
	{
		private $connection;
		private $lastquery;

		public function __construct()
		{
			$this->dbconnection();
		}
		public function dbconnection()
		{
			$this->connection=mysqli_connect(dbhost,dbuser,pass,database);
			if(!$this->connection)
			{
				die("Could not connect to the database");
			}
		}
		public function query($q)
		{
			$this->lastquery=$q;
			$result=mysqli_query($this->connection,$q);
			if($result)
			{
				return $result;
			}
			else
			{
				die("Database query failed which was ".$this->lastquery);

			}
		}
		public function mysqlready($word)
		{
			//$magic_quotes=get_magic_quotes_gpc();
			//if($magic_quotes)
			//{
			//	$word=stripslashes($word);
				$word=trim($word);
				$word=mysqli_real_escape_string($this->connection,$word);
				return $word;
			//}
			//else
			//{
		//		echo "string";
			//}
		}
		public function returnid()
		{
			return mysqli_insert_id($this->connection);
		}
		
		public function affectedrows()
		{
			return mysqli_affected_rows($this->connection);
		}
	}


	$db = new database();
	
 ?>



 