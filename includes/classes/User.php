<?php  
class User {
	protected $conn;

	function __construct($conn) {
		$this->conn = $conn;
	}
	public function login($email, $password) {
		$password = md5($password);
		$sql = ("SELECT id FROM users WHERE email = '$email' AND password = '$password' ");
		$result = $this->conn->query($sql);
		
		if($result) {
			if($result->num_rows > 0) {
				$user = $result->fetch_assoc();
				$_SESSION['id'] = $user['id'];
				
				header("Location: home.php");
			} else {
				
				return false;
			}
		} else {
			
			return false;
		}
		
	}

	public function register($email, $name, $password) {
		$password = md5($password);
		$sql = ("INSERT INTO `users` (`email`, `password`, `name`) VALUES ('$email', '$password', '$name') ");
		// $hash = md5($password);
		$result = $this->conn->query($sql);
		if($result) {
			$_SESSION['id'] = $this->conn->insert_id;
			header('Location: home.php');
		} else {
			return false;
		}
	}

	public function checkInput($var) {
		$var = htmlspecialchars($var);
		$var = trim($var);
		$var = stripcslashes($var);
		return $var;
	}

	public function checkEmail($email) {
		$sql = "SELECT `email` FROM `users` WHERE `email` = '$email' ";
		$result = $this->conn->query($sql);

		$count = $result->num_rows;
		if($count > 0) {
			return true;
		} else {
			return false;
		}

	}

	public function showUsers() {
		$sql = "SELECT id, name, email FROM USERS";
		$result = $this->conn->query($sql);
		if($result === 0) {
				$error = "There are no rows that can be retrieved";
		} else {
			return $result;
		}
		$result->free();
		$db->close();
	}

	public function logout() {
		$_SESSION = array();
		session_destroy();
		header('Location: index.php');
	}

}


?>