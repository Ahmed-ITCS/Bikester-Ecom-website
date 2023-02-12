<?php

include('connection.php');
$name = $_POST['bike'];
$name = strtoupper($name);
$Q = "DELETE FROM brand where name = '$name'";
$send = mysqli_query($con,$Q);
if($send);
{
	include('addbrand.php');
}


?>