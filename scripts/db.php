<?php
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
				exit;
			}
		}

		function InsertUser($username, $password) {
			try {
				$query = $this->connection->prepare('INSERT INTO users (username, password)
				VALUES (:username, :password)');
				$query->bindParam(':username', $username);
				$query->bindParam(':password', $password);
				$query->execute();
				echo "Registration is successful";
			}
			catch(PDOException $e) {
				echo "Registration failed, the chosen username is already taken";
				exit;
			}
		}

		function LoginUser($username, $password) {
			try {
				$query = $this->connection->prepare('SELECT password FROM users WHERE username = :username');
				$query->bindParam(':username', $username);
				$query->execute();
				if ($query->rowCount() == 0) {
					exit;
				}
				$result = $query->fetch(PDO::FETCH_ASSOC);
				if (password_verify($password, $result['password'])) {
					echo $username;
				} else {
					exit;
				}
			}
			catch(PDOException $e) {
				exit;
			}
		}

		function __construct($server, $username, $password, $dbname) {
			$this->server = $server;
			$this->dbusername = $username;
			$this->dbpassword = $password;
			$this->dbname = $dbname;
		}

		function __destruct() {}
	}

	$conf = parse_ini_file('config.ini');
	$databaseInstance = new DatabaseUsage($conf['host'], $conf['username'], $conf['password'], $conf['dbname']);
?>
