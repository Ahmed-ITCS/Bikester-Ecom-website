<?php

session_start();
$id = $_GET['id'];
include('connection.php');
$query = "SELECT * from cart WHERE uid = '$id'";
$send = mysqli_query($con,$query);
/*while ($d = mysqli_fetch_assoc($send)) 
{
	echo $d['pname'];
	echo "-----";
	echo $_SESSION["n"];

}*/
$i="";
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>

</head>
<body>


	
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Bikester</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="products.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="sellbike.php">Sell your bike</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Log out</a>
        </li>
      </ul>
      <?php
session_start();
?>
      <a href="cart.php?id=<?php echo $_SESSION["id"] ;?>"><img src="cart.svg" /></a>
     		<?php
session_start();
?>
	<h1><?php echo $_SESSION["n"] ;?></h1> 
      </nav>

<div style="width:100px;alifn:left" > 
<table class="table" border="1">
  <h1>sada</h1>
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Product Name</th>
      <th scope="col">Customer Name</th>
      <th scope="col">quantity</th>
      <th scope="col">price</th>
      <th scope="col">total</th>
    </tr>
  </thead>
  <tbody>
  	<?php
    $total =0;
		while ($d = mysqli_fetch_assoc($send)) 
		 {
		 	$i = $d['uid'];
		 	?>
    <tr>
      <!--<td><a href="deletefromcart.php?i=<?php echo $d['id']?>"><p class="btn btn-primary mb-3">delete from card</p></a></td>-->
      <th scope="row"><?php echo $d['pid'];?></th>
      <td><?php echo $d['pname'];?></td>
      <td><?php echo $_SESSION["n"];?></td>
      <td><?php echo $d['quantity'];?></td>
      <td><?php echo $d['price'];?></td>
      <?php 
    $total = ($total+ ($d['price']*$d['quantity']));
    } 
    ?>
    <td><?php echo $total;?></td>

    </tr>
  </tbody>
</table>
</div>

<a href="checkout.php?i=<?php echo $i;?>"><td><input class="form-control" type="submit" aria-label="default input example" value = "Check out"></td></a>
<a href="clearcart.php?i=<?php echo $i;?>"><td><input class="form-control" type="submit" aria-label="default input example" value = "clear cart"></td></a>
<footer>
<div class="card">
  <div class="card-header">
  </div>
  <div class="card-body">
    <h5 class="card-title">contact us </h5> 
    <a href="#" ><img src ="insta.svg" /></a>
    <a href="#" ><img src ="whats.svg" /></a>
    <a href="#" ><img src ="face.svg" /></a>
    <p class="card-text">some other random text</p>
    <a href="#top" class="btn btn-primary">Go back up</a>
  </div>
</div>
</footer>
</body>