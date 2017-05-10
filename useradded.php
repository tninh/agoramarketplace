<html>
<head>
	<title> Add User</title>
</head>
<body>
<?php
	if(isset($_POST['submit'])){
		$data_missing = array();
		if(empty($_POST['UserName'])){
			// Add to missing array
			$data_missing[] = 'User Name';
		}else{
			// Trim whitespace and store it
			$user_name = trim($POST['UserName']);
		}

		if(empty($_POST['FirstName'])){
			// Add to missing array
			$data_missing[] = 'First Name';
		}else{
			// Trim whitespace and store it
			$first_name = trim($POST['FirstName']);
		}

		if(empty($_POST['LastName'])){
			// Add to missing array
			$data_missing[] = 'Last Name';
		}else{
			// Trim whitespace and store it
			$last_name = trim($POST['LastName']);
		}

		if(empty($_POST['Email'])){
			// Add to missing array
			$data_missing[] = 'Email';
		}else{
			// Trim whitespace and store it
			$email = trim($POST['Email']);
		}

		if(empty($_POST['HomeAddress'])){
			// Add to missing array
			$data_missing[] = 'Home Address';
		}else{
			// Trim whitespace and store it
			$home_address = trim($POST['HomeAddress']);
		}
		
		if(empty($_POST['HomePhone'])){
			// Add to missing array
			$data_missing[] = 'Home Phone';
		}else{
			// Trim whitespace and store it
			$home_phone = trim($POST['HomePhone']);
		}

		if(empty($_POST['CellPhone'])){
			// Add to missing array
			$data_missing[] = 'Cell Phone';
		}else{
			// Trim whitespace and store it
			$cell_phone = trim($POST['CellPhone']);
		}

	if(empty($data_missing)){
		require_once('../mysqli_connect.php');
		$query = "INSERT INTO USERTABLE (UserName, FirstName, LastName, Email, HomeAddress, HomePhone, CellPhone) VALUES (?, ?, ? , ?, ?, ?, ?)";

		$stmt  = mysqli_prepare($dbc, $query);

		i Integers
		d Doubles
		b Blobs
		s Everything Else
		
		mysqli_stmt_bind_param($stmt, "sssssss", $user_name, $first_name, $last_name, $email, $home_address, $home_phone, $cell_phone);

		mysqli_stmt_execute($stmt);
		
		$affect_rows = mysqli_stmt_affected_rows($stmt);

		if($affect_rows == 1){
			echo 'User Entered';
			
		} else{
			echo 'Unable to insert to DB';
			mysqli_error();
		}
		mysqli_stmt_close($stmt);
		mysqli_close($dbc);
	}else {

		echo 'User data is not completed, Please enter the following data <br />';

		foreach($data_missing as $missing){
			echo "$missing <br />";		
		}		
	}


?>

	<form action="http://hrobot.com/database/useradded.php" method="post">
		<b>Add a New User </b>
		<p>User Name:
		<input type="text" name="UserName" size="25" maxlength="20" value="" /></p>
		<p>First Name:
		<input type="text" name="FirstName" size="25" maxlength="20" value="" /></p>
		<p>Last Name:
		<input type="text" name="LastName" size="25" maxlength="20" value="" /></p>
		<p>Email:
		<input type="text" name="Email" size="25" maxlength="20"  value="" /></p>
		<p>Home Address:
		<input type="text" name="HomeAddress" size="25" maxlength="50" value="" /></p>
		<p>Home Phone:
		<input type="text" name="HomePhone" size="25" maxlength="10" value="" /></p>
		<p>Cell Phone:
		<input type="text" name="CellPhone" size="25" maxlength="20" value="" /></p>

		<input type="submit" name="submit" value="Send" />
	</form>

</body>
</head>
</html>
