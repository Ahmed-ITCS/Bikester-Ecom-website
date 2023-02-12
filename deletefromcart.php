<?php
echo"hello";
echo $id = $_GET['i'];
echo"12331";
$get = "SELECT * FROM cart";
$data = mysqli_query($con,$get);
echo"12331-----";
while($d=mysqli_fetch_assoc($data)) 
{
	echo $uid = $d['uid'];	
} 
$q = "DELETE FROM cart WHERE id = '$id'";
$send = mysqli_query($con,$q);
if($send)
{
	include("cart.php?id=$uid");
}


?>