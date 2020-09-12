<?php
	class DbConnect {
		private $host = '45.143.94.44';
		private $dbName = 'docker_database';
		private $user = 'root';
		private $pass = 'root';
		
		public function connect(){
			try {
				$conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->dbName, $this->user, $this->pass);
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				return $conn;
			
			} catch(PDOException $e) {
			 	echo 'Database Error: ' . $e->getMessage();
			 }
		}
	
	}
?>
