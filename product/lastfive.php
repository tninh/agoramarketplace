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
	
	<?php
					
			$sizeArray = count( $_COOKIE);		
			$difSize = $sizeArray - 5;
			$indexCount = 0;
			// write to cookie
			foreach( $_COOKIE as $key =>$value  ){
				
				$indexCount ++;
				if($indexCount-$difSize >0) {
					if($key == "cozmo") {
						print("<p><span class=\"h4\">Cozmo</span>  -  price: $175</p>
									<img src=\"../photos/cozmo.jpg\">");
					} else if($key == "dancing"){
						print("<p><span class=\"h4\">Dancing Robot</span>  -  price: $125</p>
									<img src=\"../photos/dancing.jpg\">");
					}else if($key == "mebo"){
						print("<p><span class=\"h4\">Mebo</span>  -  price: $105</p>
								<img src=\"../photos/Mebo.jpg\">");
					}else if($key == "puppydog"){
						print("<p><span class=\"h4\">Puppy Dog</span> -  price: $64</p>
								<img src=\"../photos/puppydog.jpg\">");
					}else if($key == "smartrobot"){
						print("<p><span class=\"h4\">Smart Robot</span> -  price:  $59</p>
									<img src=\"../photos/smartrobot.jpg\">");
					}else if($key == "ubtech"){
						print("<p><span class=\"h4\">Ubtech</span>   - price:    $477</p>
								<img src=\"../photos/ubtech.jpg\">");
					}else if($key == "wowwee"){
						print("<p><span class=\"h4\">WowWee</span>  -  price: $55</p>
								<img src=\"../photos/wowwee.jpg\">");
					}else if($key == "dashrobot"){
						print("<p><span class=\"h4\">Dash Robot</span>  -  price: $155</p>
									<img src=\"../photos/dashrobot.jpg\">");
					}else if($key == "miposaur"){
						print("<p><span class=\"h4\">Miposaur</span>  -  price: $255</p>
								<img src=\"../photos/miposaur.jpg\">");
					}else if($key == "dancing"){
						print("<p><span class=\"h4\">Dancing Robot</span>  -  price: $125</p>
								<img src=\"../photos/dancing.jpg\">");
					}else if($key == "remoterobot"){
						print("<p><span class=\"h4\">Remote Robot</span>  -  price: $325</p>
									<img src=\"../photos/remoterobot.jpg\">");
					}else if($key == "robovie"){
						print("<p><span class=\"h4\">Robovie</span>  -  price: $55</p>
								<img src=\"../photos/robovie.jpg\">");
					}
				
				}
			
			}
	?>
		
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>