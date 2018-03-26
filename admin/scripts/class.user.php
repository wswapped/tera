<?php
//user class for auth
class user{
	function login($username, $pwd){
		//loggin in the user
		global $conn;
		$name = $conn->real_escape_string($username);
		$pwd = $conn->real_escape_string($pwd);

		$query = $conn->query("SELECT * FROM shopusers WHERE userName = \"$name\" AND password = \"$pwd\" ") or die("Logging error $conn->error");
		if($query->num_rows){
			$user_data = $query->fetch_assoc();
			if(!session_id())
				session_start();


			$_SESSION['user'] = $user_data['userName'];
			$_SESSION['pwd'] = $user_data['password'];
			return $user_data['userId'];
		}else
			return false;
	}

	function isLogged(){
		//Here we check if the current user is logged in
		if(!session_id()){
			session_start();
		}

		//Check if the user key is set
		$username = $_SESSION['user']??"";
		$userpwd = $_SESSION['pwd']??"";

		$user = $this->login($username, $userpwd);

		return $user;
	}
	function data($userid){
		//return basic relevant data
		global $conn;

		$query = $conn->query("SELECT shopusers.*, shops.id as shopId FROM shopusers JOIN shops ON shopusers.userId = shops.admin WHERE userId = \"$userid\" LIMIT 1 ") or die("Can't get user data $conn->error");
		// $query = $conn->query("SELECT shopusers.*, shops.id as shopId FROM shopusers JOIN shops ON shopusers.userId = shops.admin WHERE userId = \"$userid\" LIMIT 1 ") or die("Can't get user data $conn->error");

		$userdata = $query->fetch_assoc();

		// $userdata['shops'] = $this->userShops($userid);

		return $userdata;
	}

	function userShops($userid){
		//returns the shops owned by id
		global $conn;

		$query =  $conn->query("SELECT * FROM shops WHERE admin = \"$userid\" ") or die("Can't get user's shops $conn->error");

		$shops = array();
		while ($data = $query->fetch_assoc()) {
			$shops[] = $data;
		}
		return $shops;
	}
}


?>