<?php

include('connection.php');
$id = $_GET['i'];
/*echo"yooo-1";
$query = "SELECT * from cart where uid = '$id'";
echo"yooo0";

$data = mysqli_query($con,$query);
echo"yooo1";
$arrayquant = array();
echo"yooo2";
$arraypid = array();
while($d = mysqli_fetch_assoc($data))
{
	echo"yooo";
	array_push($arrayquant, 1);
	array_push($arraypid , 1);
}
for ($i=0; $i <count($arrayquant) ; $i++) 
{
	$chqa = $arrayquant[i];
	$pid = $arraypid[i];
	$q = "SELECT stock from product where id = '$pid'";
	$d=mysqli_query($con,$q);
	$d = $d-$pid;
	$s ="INSERT into product(stock) values('$d')";
}
*/
$Q = "DELETE FROM cart where uid = '$id'";
$send = mysqli_query($con,$Q);
if($send)
{
	?>
<html>
	<head>
	</head>
	<body>
		
    <p class="btn btn-primary">Purchased</p>

	</body>


</html>
<?php
//sleep(10);
	
}
include("index.php");
?>
