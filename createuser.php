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
				<button type="button" class="btn btn-success btn-lg" >Home</button>
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
		<div class="row">
			<div class= "col-xs-14">
				<form action="newuser.php" method="post">
					<b>Add a New User </b>
					<p>User Name:
					<input type="text" name="UserName"size="25" maxlength="30" /></p>
					<p>First Name:
					<input type="text" name="FirstName" size="25" maxlength="30"  /></p>
					<p>Last Name:
					<input type="text" name="LastName" size="25" maxlength="30" /></p>
					<p>Email:
					<input type="text" name="Email" size="25" maxlength="40"  /></p>
					<p>Home Address:
					<input type="text" name="HomeAddress" size="25" maxlength="50"  /></p>
					<p>Home Phone:
					<input type="text" name="HomePhone" size="25" maxlength="20"  /></p>
					<p>Cell Phone:
					<input type="text" name="CellPhone" size="25" maxlength="20" /></p>

					<input type="submit" name="submit" value="Send" />
				</form>
			</div>
		</div>
	</div>
	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>