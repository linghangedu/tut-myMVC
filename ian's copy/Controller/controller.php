<?php
include_once ("Model/User.php");

class Controller {
	
    public function login() {

         include("View/Login.php");

    }

	public function register() {
		include("View/Register.php");
	}


	public function profile($id){
        $u = new User();
        $User = $u->getUser($id);
        if(empty($User)){
            echo "This user is not exist!";
            exit();
        }
        include("View/Profile.php");
	}

    public function validate($username,$password){
        $u = new User();
        if($u->isExist(trim($username),trim($password))){
            header('location: ?page=profile&id='.$u->getUserID());
        }
        else{
            echo"You may input wrong Username or Password";
        }
    }

    public function addUser($request){
         $u = new User();
         if ($u->isExist($request['username'])){
              echo"The Username is already exist.Plesase try another
                   username";
         }
         else{
          $u->insert($request);
          echo"Register Successfully!"
         }
    }
}

?>













