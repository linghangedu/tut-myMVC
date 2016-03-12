<?php

include_once ("Model/User.php");

class Controller {

	public function login() {
		include ("View/Login.php");
	}


	public function register() {
		include ("View/Register.php");
	}


	public function profile($id) {
		$user = new User();
		$users = $user->getUser($id);
		// print_r($users);
		if(empty($users)) {
			echo "This user is not exist!";
			exit();
		}
		// print_r($list);
		// echo $list[0]['id'];
		include ("View/Profile.php");
	}


	public function validate($username, $password) {
		// echo $username;
		// echo $password;
		$user = new User();
		if ($user->isExist($username, $password)) {
			echo "Hello $username";
		}
		else {
			echo "You may input wrong Username or Password";
		}
	}


	public function addUser($newUser) {
		//print_r($newUser);
		$user = new User();
		if ($user->isExist($newUser['username'])) {
			echo "The Username is already exist. Please try another username";
		}
		else {
			$user->insert($newUser);
			echo "Register Successfully!";
		}
	}

}

?>