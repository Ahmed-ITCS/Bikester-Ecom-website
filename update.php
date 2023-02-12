<?php 
include('connection.php');
$name = $_POST['name'];
$model = $_POST['model'];
$years = $_POST['years'];
$release = $_POST['release'];
$price = $_POST['price'];
echo $id = $_POST['id'];
$pic = $_POST['file'];
$query = "UPDATE product SET Brand = '$name', model = '$model',price= '$price',year = '$years',used = '$release',file = '$pic' WHERE id = '$id'";
$send = mysqli_query($con,$query);
if($send)
{
	echo"produt updated";
}
?>