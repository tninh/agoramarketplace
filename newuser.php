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
	<div class="container">
			<div class= "row-md-4 text-center">
				<a href="createuser.php" class="btn btn-primary btn-lg btn-space" style="width:300px"  role="button" >Create </a>
			</div>
			<div class= "row-md-4 text-center">
				<a href="searchform.php" class="btn btn-primary btn-lg btn-space" style="width:300px" role="button">Query</a>
			</div>
			<div class= "row-md-4 text-center">
				<a href="alluserinfo.php" class="btn btn-primary btn-lg btn-space" style="width:300px" role="button">All User Info</a>
			</div>
	</div>

<?php
	// When submit button press
	if(isset($_POST['submit'])){
		$db_host = "localhost";
		$db_user = "hroboter_hoang";
		$db_password = "Angela2014";
		$db_name = "hroboter_user";
		$dbc = mysqli_connect($db_host, $db_user, $db_password, $db_name)
//		$dbc = mysqli_connect('localhost', 'hroboter_hoang', 'Angela2014', 'hroboter_user')
		OR die ('Unable to connect to MySQL' . mysqli_connect_error());
		
		extract($_POST);
		
		$data_missing = array();
		if(empty($_POST['UserName'])){
			// Add to missing arrays
			$data_missing[] = 'User Name';
		}else{
			// Trim whitespace and store it
			$user_name = trim($_POST['UserName']);
		}

		if(empty($_POST['FirstName'])){
			// Add to missing array
			$data_missing[] = 'First Name';
		}else{
			// Trim whitespace and store it
			$first_name = trim($_POST['FirstName']);
		}

		if(empty($_POST['LastName'])){
			// Add to missing array
			$data_missing[] = 'Last Name';
		}else{
			// Trim whitespace and store it
			$last_name = trim($_POST['LastName']);
		}
		
		if(empty($_POST['Email'])){
			// Add to missing array
			$data_missing[] = 'Email';
		}else{
			// Trim whitespace and store it
			$email = trim($_POST['Email']);
		}

		if(empty($_POST['HomeAddress'])){
			// Add to missing array
			$data_missing[] = 'Home Address';
		}else{
			// Trim whitespace and store it
			$home_address = trim($_POST['HomeAddress']);
		}
		
		if(empty($_POST['HomePhone'])){
			// Add to missing array
			$data_missing[] = 'Home Phone';
		}else{
			// Trim whitespace and store it
			$home_phone = trim($_POST['HomePhone']);
		}

		if(empty($_POST['CellPhone'])){
			// Add to missing array
			$data_missing[] = 'Cell Phone';
		}else{
			// Trim whitespace and store it
			$cell_phone = trim($_POST['CellPhone']);
		}

	if(empty($data_missing)){
			$sql = "INSERT INTO USERTABLE (UserName, FirstName, LastName, Email, HomeAddress, HomePhone, CellPhone)  VALUES (?, ?, ? , ?, ?, ?, ?)";
			$stmt  = mysqli_prepare($dbc, $sql);
						
			mysqli_stmt_bind_param($stmt, "sssssss", $user_name, $first_name, $last_name, $email, $home_address, $home_phone, $cell_phone);

			mysqli_stmt_execute($stmt);
			
			$affect_rows = mysqli_stmt_affected_rows($stmt);
		
			if($affect_rows == 1){
			//	echo 'New User Entered Data Successfully';
			print("<title>Success</title></head>
						<body style= \"font-family: arial; font-size:2em; color: blue\"> 
						<div class=\"container\">
						<div class=\"col-xs-12\" style=\"height:60px;\">
						</div>
						<div>
						<strong>New User Entered Data Successfully<br /></strong>
						</div>
						</div>
						</body>
						</html>");
				
			} else{
				//echo 'Unable to insert to Database';
				print("<title>Error</title></head>
						<body style= \"font-family: arial; font-size:2em; color: red\"> 
						<div class=\"container\">
						<div class=\"col-xs-12\" style=\"height:60px;\">
						</div>
						<div>
						<strong>Unable to insert to Database<br /></strong>
						</div>
						</div>
						</body>
						</html>");
				echo mysqli_error();
			}
	
		mysqli_stmt_close($stmt);
		mysqli_close($dbc);
	}else {

		echo 'User data is not completed, Please enter the following data <br />';

		foreach($data_missing as $missing){
			echo "$missing <br />";		
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