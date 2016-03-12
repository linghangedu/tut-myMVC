<?php

include_once ("Model/User.php");

class Controller {

	public function login() {
		include ("View/Login.php");
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


}

?>