<?php
echo "hello";
echo $name = $_POST['name'];
echo $email = $_POST['email'];
if($name ==="" || $email==="")
{
	echo"empty fields not allowed\n";
	header("Location:register.html");
	//include("register1.html");
	exit();
}
if(preg_match("[a-zA-Z ]",$name))
{
	echo"name not allowed";
	header("Location:register.html");
	//include("register1.html");
	exit();
}
if(preg_match("[a-zA-Z@.]",$email))
{
	echo"email not allowed";
	header("Location:register.html");
	//include("register1.html");
	exit();
}

$name = strtolower($name);
$email = strtolower($email);

$password = $_POST['pass'];
$password1 = $_POST['pass1'];
if(empty($password)||empty($password1))
{
	echo"no password feild found\n";
	header("locationn:register.html");
	//include("register1.html");
	exit();
}
$password = strrev($password);
$password = "  ! @#$%^&^".$password."!@#$%^&^   "; 
echo $password = MD5($password);
$password1 = strrev($password1);
$password1 = "  ! @#$%^&^".$password1."!@#$%^&^   "; 
echo $password1 = MD5($password1);

if($password1===$password)
{
	include('connection.php');
	$qry = "SELECT * FROM user";
	$data = mysqli_query($con ,$qry);
	$check = false;
	while($register = mysqli_fetch_assoc($data))
	{
		if(strtolower($register['email'])==$email)
		{
			$check = true;
			
			break;
		}
		else
		{
			$check = false;
		}
	}
	if($check)
	{
		echo"user already exist";
		include('register.html');
	}
	else
	{
		$qry = "INSERT INTO user(name,email,password) values('$name','$email','$password')";
		$send = mysqli_query($con , $qry);
		
		if(!$send)
		{
			echo"couldn't Register you";
		}
		else
		{
			echo "registered ";
			include("index.php");
		}
	}








	/*$query = "INSERT INTO user(name,email,password) values('$name','$email','$password')";
	$send = mysqli_query($con,$query);
	if($send)
	{
		echo "data saved";
	}
	else
	{
		echo"not saved";
	}*/
}
else
{
	echo"confirm password not same";
	include('register.html');
}


?>