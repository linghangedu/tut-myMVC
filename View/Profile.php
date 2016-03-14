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
			<!-- <?var_dump($user)?> -->
		 <p>Username: <? echo $user['username']?></p>
		 <p>Status: <? echo $user['first_name']?></p>	
		 <p>Status: <? echo $user['last_name']?></p>			
		 <p>Status: <? echo $user['status']?></p>			
		 <p>Status: <? echo $user['email']?></p>			



	 <a href="logout.php">Log Out</a>

	 <a href="login.php">Login</a> | <a href="register.php">Register</a>

</body>
</html>
