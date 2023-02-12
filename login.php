<?php

if($_POST['submit'] == "Login")
{
	$email = $_POST['Email'];
	$email = strtolower($email);
	$password = $_POST['Password'];
	
	$password = strrev($password);
	$password = "  ! @#$%^&^".$password."!@#$%^&^   "; 
	$password = MD5($password);
	include('connection.php');
	$qry = "SELECT * FROM user";
	$data = mysqli_query($con ,$qry);
	$temp ="";
	$name ="";
	$id="";
	while($register = mysqli_fetch_assoc($data))
	{
		if($register['email']===$email)
		{
			//echo $register['password'];

			if($register['password']===$password)
			{
				$temp = $register['PRIVILEGE'];
				$name = $register['name'];
				$id = $register['id'];
				$check =true;
				break;
				//echo"login success";
			}
		}
	}
	if($check)
	{
		session_start();
		$_SESSION["name"] = $temp;
		$_SESSION["n"] = $name;
		$_SESSION["id"] = $id;
		
		include('index.php');
	}	
	else
	{
		echo "login failed";
	}
}
else if($_POST['submit'] =="Register")
{
	include("register.html");
	
		
}
 

?>