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
		$res = $db->fetch($sql);
		$db->close_connect();
		$row = mysql_fetch_row($res1);
		

		if (isset($res)) {
			$arr['id'] = $row['id'];
			$arr['username'] = $row['username'];
			$arr['status'] = $row['status'];

		}
		return $res;
	}


	public function isExist($username, $password = null) {
		if (isset($password)) {
			$password = md5($password);
			$db = new Database();
			$sql = "select id, username, password from users where username = '{$username}' and password = '{$password}'";
			//echo $sql . "<br>";
			$res = $db->fetch($sql);
			//print_r($res);
			if (empty($res)) {
				return -1;
			}
			else {
				//echo "push id";
				return $res[0]['id'];
			}
		}
		else {
			$db = new Database();
			$sql = "select username, password from users where username = '{$username}'";
			//echo $sql . "<br>";
			$bool = $db->execute($sql);
			return $bool;
			// if ($res)) {
			// 	return false;
			// }
			// else {
			// 	return true;
			// }
		}

	}


	public function insert($newUser) {
		//print_r($newUser);
		$db = new Database();
		$newUser['password'] = md5($newUser['password']);
		$sql = "INSERT INTO users (username, password, first_name, last_name, email, status) 
			VALUES ('{$newUser['username']}', '{$newUser['password']}', '{$newUser['first_name']}', '{$newUser['last_name']}', '{$newUser['email']}', '{$newUser['status']}')";
		$res = $db->execute($sql);
		$db->close_connect();
	}

}

?>