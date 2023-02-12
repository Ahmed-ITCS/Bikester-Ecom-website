<?php 
session_start();
if($_SESSION["id"] == "")
{
	echo"login first please\n";
	//include("products.php");
	header("location:products.php");
	exit();
}


$id = $_GET['i'];
include('connection.php');
$q = "SELECT * FROM product WHERE id = '$id'";
$send = mysqli_query($con,$q);
$s= mysqli_fetch_assoc($send);
$m = $s['model'];
$price =$s['price'];
session_start();
$i=$_SESSION["id"];
$q = "SELECT * FROM cart";
$check = mysqli_query($con,$q);
$quan=0;

while($d = mysqli_fetch_assoc($check))
{
	if($d['pid'] === $id)
	{
		//$price = $d['price'];
		$quan = $d['quantity'];
		if($quan === 0)
		{
			$quan =1;

		}
		else
		{
			$quan++;
		}

	}
}

if($quan == 0)
{
	$quan++;
	echo"eeeeeeeeeeee2222e";
	$del = "DELETE FROM cart WHERE pid = '$id'";
	$d = mysqli_query($con,$del);
	$query = "INSERT INTO cart(pid,pname,uid,quantity,price) VALUES('$id','$m','$i','$quan','$price')";
	$add = mysqli_query($con,$query);
	if($add)
	{
		echo"added";
		include('products.php');
	}
}
else
{
	echo"eeeeeeeeeeee2222e";
	$del = "DELETE FROM cart WHERE pid = '$id'";
	$d = mysqli_query($con,$del);
	$query = "INSERT INTO cart(pid,pname,uid,quantity,price) VALUES('$id','$m','$i','$quan','$price')";
	$add = mysqli_query($con,$query);
	if($add)
	{
		echo"added";
		include('products.php');
	}

}


?>