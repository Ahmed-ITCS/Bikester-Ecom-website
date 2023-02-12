<?php

include('connection.php');
$id  = $_GET['i'];
$query1 = "DELETE FROM cart WHERE pid = '$id'";
$query2 = "DELETE FROM product WHERE id = '$id'";
$del1 = mysqli_query($con,$query1);
$del2 = mysqli_query($con,$query2);
session_start();
if($del1 && $del2)
{
	if($_SESSION['name']=="admin")
	{
		include("products.php");
	}
	else
	{
	include('myproducts.php');
	}
}

?>