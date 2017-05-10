<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>HROBOTER</title>

    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="cusStyles.css" rel="stylesheet" />
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <h1 class="text-primary">HROBOTER</h1>
	<div class="container">
		<div class="row">
			<div class= "col-xs-14">
				<a href="../home.php" class="btn btn-primary btn-lg" role="button" >Home</a>
				<a href="../products.php" class="btn btn-success btn-lg" role="button">Products</a>
				<a href="../news.php" class="btn btn-primary btn-lg" role="button">News</a>
				<a href="../about.php" class="btn btn-primary btn-lg" role="button">About</a>
				<a href="../contacts.php" class="btn btn-primary btn-lg" role="button">Contacts</a>
				<a href="../user.php" class="btn btn-primary btn-lg" role="button">User</a>
			</div>
		</div>
	</div>
	<div>
	</div>
	<div class="container">
		
		<a class="btn btn-default pull-right" href="secure.php" style = "height:40px; width:120px" >SignUp</a>
		<a class="btn btn-default pull-right " href="secure.php"  style = "height:40px; width:120px">Login</a>
			
	</div>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h3>Items</h3>
			</div>

			<div class="col-lg-3 col-md-4 col-sm-6">
				<a  class=" img-responsive thumbnail" >
					<p><span class="h4">Mebo Robot</span>  -  price: $105</p>
					<img src="../photos/mebo.jpg">
				</a>
			</div>
		</div>
		
		<div class="row">
			<p>  
				 With 5 different points of articulation and the ability to spin 360º in place, Mebo can grasp, lift and carry nearly anything you set his mind to </br>
				Access Mebo remotely to control him from anywhere; in the house or from the other side of the world</br>
				With 6 all-terrain wheels and intuitive steering control, Mebo can turn on a dime, and go anywhere you want</br>
				Mebo streams straight to your phone or tablet in 720p high definition. So take pictures or record videos to post and share online</br>
				Hear what Mebo hears, and even speak through Mebo using the microphone on your device </br>
	
			</p>
		</div>
		
	</div>
<?php
		
		$robotID = "mebo";
		$sizeNext = $_COOKIE[$robotID ] + 1;
		
		// write to cookie
		setcookie( $robotID, $sizeNext , time() + 4320000);
	?>
	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
