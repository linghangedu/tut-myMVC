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
		$u = new User();
		$res = $u->getUser($id);
		// print_r($user);
		if(empty($res)) {
			echo "This user is not exist!";
			exit();
		}
		$user = $res[0];
		//print_r($user);
		include ("View/Profile.php");
	}


	public function validate($username, $password) {
		// echo $username;
		// echo $password;
		$u = new User();
		$id = $u->isExist($username, $password);
		//var_dump($id);
		//echo "this is id";
		if ($id !== -1) {
			echo "Hello $username";
			$users = $u->getUser($id);
			$user = $users[0];
			//var_dump($user);
			include ("View/Profile.php");
		}
		else {
			echo "You may input wrong Username or Password";
		}
	}


	public function addUser($user) {
		//print_r($user);
		//echo sizeof($user);
		$u = new User();
		//$str = null;
		$emp = 0;
		if ($u->isExist($user['username'])) {
			include ("View/Register.php");
			echo "The Username is already exist. Please try another username";
		} else {
			foreach ($user as $info) {
				//var_dump($info);
				if (empty($info)) {
					echo $info;
					//$str .= "$info can not be empty!<br>";
					$emp++;
				}
			}
			if ($emp > 0) {
				//echo $emp;
				include ("View/Register.php");
				echo "You should finish all information";
			} else {
				$u->insert($user);
				echo "Register Successfully!";
				include ("View/Profile.php");
			}

		}
	}

}

?>