<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="design.css">
	<title>Bikester</title>
</head>
<body>
	<div class ="navbar">
		<img src="image.webp" height = "20px" width ="10%" >
		<form method="POST" action="login.php">
			<td><div class ="right"><input type="submit" value="Register" /></div></td>
			<td><div class ="right"><input type="submit" value="Login" /></div></td>
			<td><div class ="right"><input type="password" placeholder="Password"  /></div></td>
			<td><div class ="right"><input type="email"  placeholder="Email" /></div></td>
		</form>
		<div class="right"><p><a href="sellbike.html">Sell your bike &nbsp &nbsp</a></p></div>
		<div class="right"><p><a href="products.php">products &nbsp &nbsp</a></p></div>
		<div class="right"><p><a href="index.html">home &nbsp &nbsp</a></p></div>
	</div>
	<div class="body">
		<table>
			<tr>
				<th>ID</th>
				<th>Brand</th>
				<th>Model</th>
				<th>Price</th>
				<th>Year year-mm-day</th>
			</tr>
		<?php
		include("connection.php");
		$query = "SELECT * FROM product";
		$send = mysqli_query($con,$query);
		while ($data = mysqli_fetch_assoc($send)) 
		{?>
			<tr>
			<td><p><?php echo $data['id']?></p></td>
			<td><p><?php echo $data['Brand']?></p></td>
			<td><p><?php echo $data['model']?></p></td>
			<td><p><?php echo $data['price']?></p></td>
			<td><p><?php echo $data['year']?></p></td>
			</tr>
		<?php
		}	
		?>
		</table>
	</div>
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