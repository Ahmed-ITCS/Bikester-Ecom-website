<?php
    include("connection.php");
    $query = "SELECT * FROM product";
    $send = mysqli_query($con,$query);
    ?>

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
        <?php 
        session_start();
        if($_SESSION["name"] == "customer")
        {?>
           <li class="nav-item">
          <a class="nav-link" href="sellbike.php">sell your bike</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="myproducts.php">my products</a>
        </li>
         <li class="nav-item">
          <a class="nav-link" href="logout.php">Log out</a>
        </li>
<?php
        }
        if($_SESSION["name"] == "admin")
        {
          ?>
           <li class="nav-item">
          <a class="nav-link" href="addbrand.php">Add Brands</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="addproducts.php">Add products</a>
        </li>
         <li class="nav-item">
          <a class="nav-link" href="logout.php">Log out</a>
        </li>
<?php   }
        ?>
      </ul>
      <?php session_start();
 if(!($_SESSION["id"] == ""))
{
    if($_SESSION["name"]=="admin")
    {
    
    }
    else
    {
      ?>
      <a href="cart.php?id=<?php echo $_SESSION["id"]; ?>"><img src="cart.svg" width = "50px"/></a>
<?php
    } ?>
      
      <h1><?php echo $_SESSION["n"]; ?></h1> 
      <?php

}
else
{
?>
      <form  method = "POST" class="d-flex" action="login.php">
        <div class ="form-control me-2"><input type="password" name ="Password" placeholder="Password" /></div>
        <div class ="form-control me-2"><input type="email"  name ="Email" placeholder="Email" /></div>
        <button class="btn btn-outline-success" type="submit" aria-label="Login" value="Login" name = "submit">Login</button>
        <button class="btn btn-outline-success" type="submit" aria-label="Register" value ="Register" name="submit">Register</button>
      </form>
<?php } ?>
</nav>

<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Brand</th>
      <th scope="col">Model</th>
      <th scope="col">Price</th>
      <th scope="col">Year</th>
      <th scope="col">Used</th>
    </tr>
  </thead>
  <tbody>
    <?php
    if($_SESSION['name'] == "admin")
    {

      while ($data = mysqli_fetch_assoc($send)) 
     {?>
    <tr>
      <th scope="row"><?php echo $data['id'];?></th>
      <td><?php echo $data['Brand'];?></td>
      <td><?php echo $data['model'];?></td>
      <td><?php echo $data['price'];?></td>
      <td><?php echo $data['year'] ;?></td>
      <td>
        <?php if($data['used']==0)
      {
        echo "0";
      }
      else
      {
        echo $data['used'];

      }
      ?>            years
      

      </td>
      <td>
        <img src="<?php echo $data['file']; ?>" width = "100px" />
      </td>
      <td><a href="deleteproduct.php?i=<?php echo $data['id'];?>" class="btn btn-primary"><img src = "trash.svg"></a></td>
       <td> <a href="addtocart.php?i=<?php echo $data['id'];?>"><img src="cart.svg" alt ="cart image" width="50px"></a>
      </td><?php }?>
    </tr>
<?php }
    else
    {
      while ($data = mysqli_fetch_assoc($send)) 
     {?>
    <tr>
      <th scope="row"><?php echo $data['id'];?></th>
      <td><?php echo $data['Brand'];?></td>
      <td><?php echo $data['model'];?></td>
      <td><?php echo $data['price'];?></td>
      <td><?php echo $data['year'] ;?></td>
      <td>
        <?php if($data['used']==0)
      {
        echo "0";
      }
      else
      {
        echo $data['used'];

      }
      ?>            years
      

      </td>
      <td>
        <img src="<?php echo $data['file']; ?>" width = "100px" />
      </td>
      <td>
        <a href="addtocart.php?i=<?php echo $data['id'];?>"><img src="cart.svg" alt ="cart image" width="50px"></a>
      </td><?php }?>
    </tr>

   <?php  }  ?>    
  </tbody>
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