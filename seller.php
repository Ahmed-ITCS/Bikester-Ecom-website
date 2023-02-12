<?php
include('connection.php');
session_start();
$id = $_SESSION['id'];
if($con)
{
	echo "hahaha1";
	$name = $_POST['name'];
	$model = $_POST['model'];
	$years = $_POST['years'];
	$release = $_POST['release'];
	$price = $_POST['price'];
	$pic = $_POST['file'];
	if($name ===""||$model ===""||$years===""||$release===""||$price==="")
	{
		echo "hahaha2";
		header("location:sellbike.php");
	}
	echo "hahaha3";
	if(preg_match("[a-zA-Z0-9]",$model))
	{
		echo"not allowed";
		header("Location:sellbike.php");
		//include("register1.html");
		exit();
	}
	if(preg_match("[0-9]",$years))
	{
		echo"not allowed";
		header("Location:sellbike.php");
		//include("register1.html");
		exit();
	}
	if(preg_match("[0-9]",$release))
	{
		echo"not allowed";
		header("Location:sellbike.php");
		//include("register1.html");
		exit();
	}
	echo "hahaha4";
	$query = "INSERT INTO product(Brand,model,price,year,used,userid,file) VALUES ('$name','$model','$price','$years','$release','$id','$pic')";
	//working 
	echo "hahah5";
	$send = mysqli_query($con,$query);
	echo "hahaha6";
	session_start();
	if($send)
	{
		if($_SESSION['name'] == "admin")
		{
			include('addproducts.php');
		}
		else
		{
			echo "hahaha";
			include('sellbike.php');
		}
	}
	else
	{
		echo"data not sent";
	}

}
else
{
	echo"error not connected";
}



?>