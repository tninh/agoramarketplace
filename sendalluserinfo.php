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
