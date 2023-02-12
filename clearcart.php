<?php

$id = $_GET['i'];
include("connection.php");
$query = "DELETE FROM cart WHERE uid = '$id'";
$send = mysqli_query($con, $query);
if($send)
{
	include("cart.php");
}



?>