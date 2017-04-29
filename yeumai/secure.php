<!DOCTYPE html>
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
	<div class="container">
		<form class="form-signin" method="post" action = "password.php" >
			<h2 class="form-signin-heading">Please Sign In</h2>
			<br />
			<table border = "0" cellspacing="10" style = "height: 80px; width: 320px; font-size:12pt" cellpadding ="10">
				<tr>
					<td colspan="3">
						<strong>User Name:  </strong>
					</td>

					<td colspan = "3">
						<span style="margin-left: 6em;">
						<input size = "40" name = "USERNAME" id="usernameID" class="form-control" style="height:42px; width:200px"/>
						</span>
					</td>
				</tr>
					<tr>
					<td colspan="3">
						<strong>Password:  </strong>
					</td>

					<td colspan = "3">
						<span style="margin-left: 6em;">
						<input size="40" name= "PASSWORD" id ="passwordID" class="form-control" style = "height: 42px; width: 200px" type="password">
						</span>
					</td>
				</tr>
				
			</table>
			<table border = "0" cellspacing="10" style = "height: 80px; width: 80px; font-size:12pt" cellpadding ="10">
				<tr>
					<td colspan ="1">
						<input type = "submit" name = "login" value= "login"   style = "height: 40px; width:120px"/>
					</td>
					
					<td colspan = "2">
						<a class="btn btn-default pull-right" href="http://hroboter.com/yeumai/createuser.php" style = "height:40px; width:120px" >Register</a>
					</td>
				</tr>
			</table>
		</form>

	</div>
	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
