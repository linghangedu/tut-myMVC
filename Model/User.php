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
		$res = $db->execute_sql($sql);
		$db->close_connect();
		$arr;

		if (isset($res)) {

			$arr['id'] = $res[0]['id'];
			$arr['username'] = $res[0]['username'];
			$arr['status'] = $res[0]['status'];
	
		}
		
		return $res;
	}

}

?>