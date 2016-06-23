<?php
	$conf = parse_ini_file('config.ini');
	class DatabaseUsage {
		private $server;
		private $dbusername;
		private $dbpassword;
		private $dbname;
		private $connection;

		function Connect() {
			try {
				$this->connection = new PDO("mysql:host=$this->server;dbname=$this->dbname", $this->dbusername, $this->dbpassword);
				$this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				//echo 'Successful connection';
			}
			catch(PDOException $e)
			{
				echo "Connection failed";
			}
		}

		function InsertUser($username, $password) {
			try {
				/*$sql = 'INSERT INTO users (username, password)
				VALUES ("' . $username . '", "' . $password . '")';
				$this->connection->exec($sql);
				echo "Registration completed";*/
				$query = $this->connection->prepare('INSERT INTO users (username, password)
				VALUES (:username, :password)');
				$query->bindParam(':username', $username);
				$query->bindParam(':password', $password);
				$query->execute();
				echo "Registration is successful";
			}
				catch(PDOException $e)
			{
				echo "Registration failed, the chosen username is already taken";
			}
		}

		function returnAttribute($name) {
			return $this->$name;
		}

		function __construct($server, $username, $password, $dbname) {
			$this->server = $server;
			$this->dbusername = $username;
			$this->dbpassword = $password;
			$this->dbname = $dbname;
		}

		function __destruct() {}
	}
?>
