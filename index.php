<?php
session_start();
if($_SESSION["name"] ==="admin")
{
	header("location:admin.php");
}
else if($_SESSION["name"] ==="customer")
{
	header("location:customer.php");
}

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



<nav class="navbar navbar-expand-lg bg-body-tertiary" id = "top">
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
      </ul>
      <form  method = "POST" class="d-flex" action="login.php">
				<div class ="form-control me-2"><input type="password" name ="Password" placeholder="Password" /></div>
				<div class ="form-control me-2"><input type="email"  name ="Email" placeholder="Email" /></div>
      	<button class="btn btn-outline-success" type="submit" aria-label="Login" value="Login" name = "submit">Login</button>
      	<button class="btn btn-outline-success" type="submit" aria-label="Register" value ="Register" name="submit">Register</button>
      </form>
      </nav>

      
      
      <div id="carouselExample" class="carousel slide">

  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="slide1.jpg" class="d-block w-100" alt="kawaski ninja">
    </div>
    <div class="carousel-item">
      <img src="slide2.jpg" class="d-block w-100" alt="Honda CBR">
    </div>
    <div class="carousel-item">
      <img src="slide3.webp" class="d-block w-100" alt="HayaBusa">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
    </div>
  </div>
  <?php
  include("connection.php");
  $q = "SELECT * FROM product";
  $send = mysqli_query($con,$q);
  //$d = mysqli_fetch_assoc($send);
  $i = 0;
  ?>
  <h2>Trending</h2>
  <?php
  while($i!=8 && $d = mysqli_fetch_assoc($send))
  {
    echo "\n"?>
    
    <div class="card" style="width: 18rem; display: inline-flex;" >
  <img src="slide1.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <p class="card-text"><?php echo $d['model'];?></p>
    <p class="card-text"><?php echo $d['price']."$";?></p>
    <a href="addtocart1.php?i=<?php echo $d['id']?>"><p class="btn btn-primary mb-3">add to card</p></a>
  </div>
</div>


  <?php 
  $i++;
  echo"\n";

}?>
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