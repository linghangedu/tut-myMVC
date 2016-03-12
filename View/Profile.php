<?
//include_once ("Model/User.php");

// class Profile {

// 	private $users;

// 	public function __construct(User $users) {
// 		$this->users = $users;
// 	}

// 	public function output() {

// 		return ;
// 	}

// }
?>



<html>
<head>
	<title>User Profile</title>
</head>
<body>
<h1>User Profile</h1>

		 <p>User ID: <? echo $users[0]['id'] ?></p>
		 <p>Username: <? echo $users[0]['username']?></p>
		 <p>Status: <? echo $users[0]['status']?></p>			


	 <a href="logout.php">Log Out</a>

	 <a href="login.php">Login</a> | <a href="register.php">Register</a>

</body>
</html>
