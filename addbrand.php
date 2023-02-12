<?php

include('connection.php');
$query = "SELECT * FROM brand";
$data = mysqli_query($con , $query);


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
          <a class="nav-link" href="addbrand.php">Add Brands</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="addproducts.php">Add products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Log out</a>
        </li>

      </ul>
      <h1>Admin</h1>
      </nav>
      <form class="row g-3" method="POST" action="uploadbrand.php">
  <div class="col-auto">
    <label for="staticEmail2" class="visually-hidden">Add Brand</label>
    <input type="text" class="form-control-plaintext" id="staticEmail2" name = "bike"placeholder="Honda">
  </div>
  <div class="col-auto">
    <button type="submit" class="btn btn-primary mb-3">Save Brand</button>
  </div>
</form>
<table border="1">
  <tr>
    <?php 
    echo"<h1>Brands</h1>";
    while($d = mysqli_fetch_assoc($data))
    {
      ?>
      <td><?php echo $d['name'];?></td>
      <td>,</td>
      <td></td>

  <?php  }
    ?>
  </tr>
  <?php
  echo"<h1>enter brand name to delete</h1>";
  ?>
  <form class="row g-3" method="POST" action="delete.php">
  <div class="col-auto">
    <label for="staticEmail2" class="visually-hidden">remove Brand</label>
    <input type="text" class="form-control-plaintext" id="staticEmail2" name = "bike"placeholder="Honda">
    <button type="submit" class="btn btn-primary mb-3">remove Brand</button>
</table>
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
</html>