<?php

$id = $_GET['i'];
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
          <a class="nav-link" href="myproducts.php">my products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Log out</a>
        </li>
      </ul>
      <?php
session_start();
?>
      <a href="cart.php?id=<?php echo $_SESSION["id"] ;?>"><img src="cart.svg" width = "50px"/></a>
     		<?php
session_start();
?>
	<h1><?php echo $_SESSION["n"] ?></h1> 
      </nav>
	
<form method="POST" action ="update.php">
        <select class="form-select" aria-label="Default select example" name = "name">
  
  <?php
  include('connection.php');
            $query = "SELECT * FROM brand";
            $send = mysqli_query($con,$query);
            while($data = mysqli_fetch_assoc($send))
            {?>
              <option><?php echo $data['name']; ?></option>
            <?php
            }
          ?>
</select>
<input class="form-control" type="hidden" value = "<?php echo $id ?>"  placeholder="Bike Model" aria-label="default input example" name = "id">
<input class="form-control" type="text" placeholder="Bike Model" aria-label="default input example" name = "model">
<input class="form-control" type="text" placeholder="Release Year" aria-label="default input example" name = "release">
<input class="form-control" type="num" placeholder="Year used" aria-label="default input example" name = "years">
<input class="form-control" type="num" placeholder="Price" aria-label="default input example" name="price">
<input class="form-control" type="file" aria-label="default input example" name="file">
<input class="form-control" type="submit" aria-label="default input example" value = "submit for update">
</form>
</body>
</html>