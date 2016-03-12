<?php

include_once("Controller/Controller.php");

$controller = new Controller();

if ($_GET['page'] == 'login') {
	$controller->login();
}

if ($_GET['action'] == 'login') {
	echo "validate";
}

if ($_GET['page'] == 'profile') {
	$controller->profile($_GET['id']);
}




?>