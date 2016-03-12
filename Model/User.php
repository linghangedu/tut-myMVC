<?php
include_once ("Model/Database.php");

class User {

	public $id;
	public $username;
	public $password;
	public $first_name;
	public $last_name;
	public $email;
	public $status;

	public function __construct() {
		
	}

	public function getUser($id) {

		$db = new Database();
		$sql = "select * from users where `id` = $id limit 1";
		//echo $sql . "<br>";
		$res = $db->execute_sql($sql);
		$db->close_connect();
		$row = mysql_fetch_row($res1);
		

		if (isset($res)) {
			$arr['id'] = $row['id'];
			$arr['username'] = $row['username'];
			$arr['status'] = $row['status'];

		}
		return $res;
	}


	public function isExist($username, $password) {
		if (isset($password)) {
			$db = new Database();
			$sql = "select username, password from users where username = '{$username}' and password = '{$password}'";
			//echo $sql . "<br>";
			$res = $db->execute_sql($sql);
			if (empty($res)) {
				return false;
			}
			else {
				return true;
			}
		}
		else {
			$db = new Database();
			$sql = "select username, password from users where username = '{$username}'";
			//echo $sql . "<br>";
			$res = $db->execute_sql($sql);
			if (empty($res)) {
				return false;
			}
			else {
				return true;
			}
		}

	}


	public function insert($newUser) {
		//print_r($newUser);
		$db = new Database();
		$sql = "INSERT INTO users (username, password, first_name, last_name, email, status) 
			VALUES ('{$newUser['username']}', '{$newUser['password']}', '{$newUser['first_name']}', '{$newUser['last_name']}', '{$newUser['email']}', '{$newUser['status']}')";
		$res = $db->execute_sql($sql);
		$db->close_connect();
	}

}

?>