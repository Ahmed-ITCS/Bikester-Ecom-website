<?php
include('connection.php');
if($con)
{
	$name = $_POST['bike'];
	$name = strtoupper($name);
	if($name ==="")
	{
		echo"empty fields not allowed\n";
		header("Location:addbrand.html");
		//include("register1.html");
		exit();
	}
	if(preg_match("[a-zA-Z]",$name))
	{
		echo"name not allowed";
		header("Location:addbrand.html");
		//include("register1.html");
		exit();
	}
	$check =false;
	$query = "SELECT * from brand";
	$send = mysqli_query($con,$query);
	while($data = mysqli_fetch_assoc($send))
	{
		if($data['name'] === $name)
		{
			$check =true;
			break;
		}
	}
	if($check)
	{
		echo"brand already present";
		include("addbrand.php");
	}
	else
	{

	$query = "INSERT INTO brand(name) VALUES ('$name')";
	//working 
	$send = mysqli_query($con,$query);
	if($send)
	{
		echo"successful";
		header('Location:addbrand.php');
	}
	else
	{
		echo"data not sent";
	}
}
}
else
{
	echo"error not connected";
}



?>