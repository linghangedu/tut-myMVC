<?php

include_once("Controller/Controller.php");

$controller = new Controller();

if ($_GET['page'] == 'login') {
	$controller->login();
}


if ($_GET['page'] == 'profile') {
	if (!isset($_GET['id'])) {
		$controller->profile(1);
	}
	else {
		$controller->profile($_GET['id']);
	}	
}


if ($_GET['page'] == 'register') {
	$controller->register();
}



if ($_GET['action'] == 'login') {
	$controller->validate($_POST['username'], $_POST['password']);
}


if ($_GET['action'] == 'register') {
	$controller->addUser($_POST);
} 



?>