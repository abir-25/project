<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/classes/User.php');
	$user = new User();

	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$email    = $_POST["email"];
		$password = $_POST["password"];
		
		$userData = $user->userLogin($email, $password);
	}
?>