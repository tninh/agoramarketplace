
<!DOCTYPE html >
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Yêu Mãi</title>

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
<h1 class="text-primary">Yêu Mãi</h1>
    	
		<?php
			
			$username = $_POST['USERNAME'];
			$password = $_POST['PASSWORD'];
						
			// When user does not enter username or password then show blank
			if(!$username || !$password){
				fieldsBlank();
				die();
			}
			// When login button clicked
			if($_POST['login'] == "login") {
				
				// If a new user the read data
				if( !($file = fopen("password.txt", "r") ) ){
					print("<title>Error</title>
						</head>
						<body style= \"font-family: arial; font-size:2em; color: red\"> 
						<div class=\"container\">
						<div class=\"col-xs-12\" style=\"height:60px;\">
						</div>
						<div>
						<strong>Could not open password file<br /></strong>
						</div>
						</div>
						</body>
						</html>");
					die();
				}
				$notFoundUser = true;
				// Read file		

				while( !feof($file) && $notFoundUser){
					// Read each line from file
					$line = fgets($file, 255);
					// Remove new line character from end of line
					$line = chop($line);
					// Split username and password
					$field = split(",", $line, 2);
					//Verify username
					
					if( $username == $field[0] ){
						// Found user
						$notFoundUser = false;
						
						// check correct password							
						if($password == $field[1] ){							
							loginSuccess($username);
						}else{
							wrongPassword();
						}
					}
				} 
				// Close password file
				fclose($file);
				
				// When there is no match the denied access
				if( $notFoundUser ){
					accessDenied();
				}
				
			}else{ // Check user exist already
				

				 // When new user created
				// Open password.txt file to add new user
				if(  !($file = fopen( "password.txt", "a") ) ){
					print("<title>Error</title></head>
						<body style= \"font-family: arial; font-size:2em; color: red\"> 
						<div class=\"container\">
						<div class=\"col-xs-12\" style=\"height:60px;\">
						</div>
						<div>
						<strong>Unable to open password.txt file<br /></strong>
						</div>
						</div>
						</body>
						</html>");
					die();
				}
				
				if(checkExistUser($username)){
					print("<title>Login Failed</title></head>
					<body style= \"font-family: arial; font-size:2em; color: red\">
					<div class=\"container\">
					<div class=\"col-xs-12\" style=\"height:60px;\">
					</div>
					<div>
					<strong>User already exist. Please choose other one.<br /></strong>
					</div>
					</div>");	
				}else{
					// write username and password to file and call function user
					fputs( $file, "$username,$password \n");
					userAdded($username);
				}
				// Close password file
				fclose($file);
			} 
			
			// Redirect to secure user list page
			function loginSuccess($name){
				header('Location: usersecure.php');
			}
			// Print password is invalid
			function wrongPassword()
			{
				print("<title>Login Failed</title></head>
					<body style= \"font-family: arial; font-size:2em; color: red\">
					<div class=\"container\">
					<div class=\"col-xs-12\" style=\"height:60px;\">
					</div>
					<div>
					<strong>Password is invalid.<br />	Can not access.</strong>
					</div>
					</div>");	
			}


			// Print a message 
			function userAdded($name){
				print("<title>Success</title></head>
					<body style = \"font-family: arial; font-size:2em; color:blue\">
					<div class=\"container\">
					<div class=\"col-xs-12\" style=\"height:60px;\">
					</div>
					<div>
					<strong>$name has been added to the user list. </strong>
					</div>
					</div>");
			}
			
			// Print access has been denied
			function accessDenied(){
				print("<title>Access Denied</title></head>
					<body style = \"font-family: arial; font-size: 2em; color:red\">
					<div class=\"container\">
					<div class=\"col-xs-12\" style=\"height:60px;\">
					</div>
					<div>
					<strong>Failed to access to this page.<br /></strong>
					</div>
					</div>");	
			}

			// print blank page require username and passwod		
			function fieldsBlank(){
				print("<title>Login Failed</title>	</head>
					<body style= \"font-family: arial; font-size:2em; color: red\">
					<div class=\"container\">
					<div class=\"col-xs-12\" style=\"height:60px;\">
					</div>
					<div>
					<strong>Please fill in Username and Password.<br /></strong>
					</div>
					</div>");
			}
			function checkExistUser($username){
				// If a new user the read data
				if( !($file = fopen("password.txt", "r") ) ){
					print("<title>Error</title>
						</head>
						<body style= \"font-family: arial; font-size:2em; color: red\"> 
						<div class=\"container\">
						<div class=\"col-xs-12\" style=\"height:60px;\">
						</div>
						<div>
						<strong>Could not open password file<br /></strong>
						</div>
						</div>
						</body>
						</html>");
					die();
				}
				
				$userExist = false;
				// Check new user already exist
				while( !feof($file) ){
					// Read each line from file
					$lineUser = fgets($file, 255);
					// Remove new line character from end of line
					$lineUser = chop($lineUser);
					// Split username and password
					$fieldUser = split(",", $lineUser, 2);
					//Verify username
					
					if( $username == $fieldUser[0] ){
						return true;
					}
				} 
				return false;
			}
		?>
	   <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	    <!-- Include all compiled plugins (below), or include individual files as needed -->
	    <script src="bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>
