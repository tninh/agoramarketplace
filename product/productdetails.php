<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
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
  
	<?php
	//		$productID = 1;
			echo "<table class='table table-striped'>
				<thead> 
				  <tr>
					<th>ID</th>
					<th>Name</th> 
					<th>Price</th>
					<th>Image</th>
					<th>Description</th>
				  </tr>
				</thead><tbody>";
	//			    if($productID == 1){
						echo "<tr>";
						echo "<td> 1 </td>";
						echo "<td>Cozmo </td>" ;
						echo "<td>$ 175 </td>";
						echo "<td><img src=http://hroboter.com/photos/cozmo.jpg> </td>";
						echo "<td> Cozmo is a real-life robot like you've only seen in movies, with a one-of-a-kind personality that evolves the more you hang out. </br>	
						Cozmo expresses real emotions in response to your actions  </br>
						Requires a free app and the processing power of your compatible mobile phone/tablet to access high level robotics functions that brings Cozmo to life.  </br>
						New games and upgrades are unlocked the more you play. Durability and security have been rigorously tested.  </br>
						The Cozmo SDK Beta is a connected robotics platform for makers, hobbyists, educators and researchers.   </br>"
						echo"</td></tr>";
		//			}
					echo "</tbody></table>";
			
	?>
	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
 