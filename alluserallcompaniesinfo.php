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
				<a href="home.php" class="btn btn-primary btn-lg" role="button" >Home</a>
				<a href="products.php" class="btn btn-primary btn-lg" role="button">Products</a>
				<a href="news.php" class="btn btn-primary btn-lg" role="button">News</a>
				<a href="about.php" class="btn btn-primary btn-lg" role="button">About</a>
				<a href="contacts.php" class="btn btn-primary btn-lg" role="button">Contacts</a>
				<a href="user.php" class="btn btn-primary btn-lg" role="button">User</a>
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
	$db_host = "localhost";
	$db_user = "hroboter_hoang";
	$db_password = "Angela2014";
	$db_name = "hroboter_user";
	$dbc = mysqli_connect($db_host, $db_user, $db_password, $db_name)
	OR die ('Unable to connect to MySQL' . mysqli_connect_error());

	$query = "SELECT * FROM USERTABLE;";
	$response = mysqli_query($dbc, $query);

	function ShowTable($response){
	
	echo "<table class='table table-striped'>
		<thead> 
		  <tr>
		    <th>FirstName</th>
	        <th>LastName</th> 
			<th>Email</th>
		    <th>Address</th>
		    <th>Home Phone</th>
		    <th>Cell Phone</th>
		  </tr>
		</thead><tbody>";
		while($row = mysqli_fetch_assoc($response)){
	
			echo "<tr>";
			echo "<td>" . $row["FirstName"]. "<td>" . $row["LastName"] . "<td>" . $row["Email"] . "<td>" . $row["HomeAddress"] . "<td>" . $row["HomePhone"] . "<td>" . $row["CellPhone"] . "</td></tr>";
		}
	echo "</tbody></table>";
	
	
	// First page
	echo "<h2>Name: Tai Pham</h2>" ;
	echo "<h3>www.taipham.info</h3>";
	
	// Initialize cURL session
	$curlvalue1 = curl_init();
	// Set the URL of the page file to download.
	curl_setopt($curlvalue1, CURLOPT_URL, 'http://taipham.info/users/test_curl.php');
	// Ask cURL to write the contents to a file
	curl_setopt($curlvalue1, CURLOPT_RETURNTRANSFER, 1);
	//Execute the c session
	$content1 = curl_exec($curlvalue1);
	// Close cURL session 
	curl_close($curlvalue1);
	
	
	// Close file	
	echo $content1;

   //Second page
    echo "<h2>Name: Trung Huynh</h2>" ;
	echo "<h3>www.knowasian.com</h3>";
    // Initialize cURL session
	$curlvalue2 = curl_init();
	// Set the URL of the page file to download.
	curl_setopt($curlvalue2, CURLOPT_URL, 'http://knowasian.com/companywebsite/share.php');
	// Ask cURL to write the contents to a file
	curl_setopt($curlvalue2, CURLOPT_RETURNTRANSFER, 1);
	//Execute the c session
	$content2 = curl_exec($curlvalue2);
	// Close cURL session 
	curl_close($curlvalue2);
	// Close file	
	echo $content2;   
}
?>

  
    <?php
  	ShowTable($response);
  	mysqli_close($dbc);
  ?>
  
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
