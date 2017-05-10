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

	
		extract($_POST);
		$searchText = trim($_POST['searchText']);
		$options = ($_POST['searchuserby']);
			
		if($options == "byUserName"){
			
			SearchByName($dbc, $searchText);
		}
	
		if($options == "byUseEmail"){
			
			SearchByEmail($dbc, $searchText);
		}
	
		if($options == "byUserPhone"){
			
			SearchByPhone($dbc, $searchText);
		}
	
		mysqli_close($dbc);
		
		function SearchByName($dbc, $text){
			// 2 words 
			if(strpos($text, " ") !== false){		
				$arr = explode(" ", $text);
				$query = "SELECT * FROM USERTABLE WHERE FirstName= " . quote($arr[0]) . " AND LastName=" . quote($arr[1]) . ";";
				$response = mysqli_query($dbc, $query);
				ShowTable($response);
			} else{
				$query = "SELECT * FROM USERTABLE WHERE FirstName=" . quote($text) . " OR LastName=" . quote($text) . ";";
				$response = mysqli_query($dbc, $query);
				ShowTable($response);
			}
		}

		function SearchByEmail($dbc, $text){
			// email is unique for each entry
			$query = "SELECT * FROM USERTABLE WHERE Email=" . quote($text) . ";";
			$response = mysqli_query($dbc, $query);
			ShowTable($response);
		}

		function SearchByPhone($dbc, $text){
			// search both cellphone and homephone columns
			$query = "SELECT * FROM USERTABLE WHERE CellPhone=" . quote($text) . "OR HomePhone=" . quote($text) . ";";
			$response = mysqli_query($dbc, $query);
			ShowTable($response);
		}

		function quote($text){
			return "'" . $text . "'";
		}

	function ShowTable($response){
			echo "<title>Search Result</title></head><body><table class='table table-striped'>
				<thead> 
				<tr>		  
					<th>Firstname</th>
					<th>Lastname</th> 
					<th>Email</th>
					<th>Address</th>
				
					<th>Home Phone</th>
					<th>Cell Phone</th>
				</tr>
				</thead><tbody>" ;
			
				while($row = mysqli_fetch_assoc($response)) {
					echo "<tr>";
					echo "<td>" . $row["FirstName"]. "<td>" . $row["LastName"] . "<td>" . $row["Email"] . "<td>" . $row["HomeAddress"] . "<td>" . $row["HomePhone"] . "<td>" . $row["CellPhone"] . "</td></tr>";
			}
			echo "</tbody></table>";
	}

   //Close database
  	mysqli_close($dbc);
  ?>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
