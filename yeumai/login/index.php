<?php session_start(); ?>
<?php require_once('../utils/config.php'); ?>
<?php
    
    $useremail = filter_input(INPUT_POST, "inputEmail");
    $userpass = filter_input(INPUT_POST, "inputPassword");
    
    $error = "";
    //POST request
    if(strlen($useremail) > 0)
    {
        if (!CheckLoginInDB($useremail, $userpass)) 
        {
            $error = "Wrong useremail or password!";
        } 
        else 
        {
            $returnUrl = filter_input(INPUT_POST, "url");
            $_SESSION[$g_login_session_key] = $useremail;
            if(!empty($returnUrl))
                Redirect(urldecode($returnUrl));
            else
                Redirect("../products.php");
        }
    }
?> 
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../assets/img/logo/agora.png">

    <title>Login to Agora</title>

    <!-- Bootstrap core CSS -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <!-- Custom styles for this template -->

    <link href="signin.css" rel="stylesheet">
    <link href="../login/signin.css" rel="stylesheet">

    <script type = "text/javascript">
            function validate()
            {
                var useremail = document.getElementById("inputEmail");
                var userpass = document.getElementById("inputPassword");
                var errors = "";
                var userregex = /^.{5,50}$/;
                var pwregex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{6,50}$/;
                
                if (!userregex.test(useremail.value))
                {
                    errors += "Invalid useremail!\n";
                    document.getElementById('inputEmail').style.borderColor = "red";
                }
                if(userpass.value.length == 0)
                {
                    errors += "Invalid password!\n";
                    document.getElementById('inputEmail').style.borderColor = "red";  
                }
                if (errors != "") {
                    alert(errors);
                } else
                {
                    useremail.style.borderColor = "green";
                    userpass.style.borderColor = "green";
                    document.forms["loginform"].submit();
                }
            }
            $('body').keypress(function(e){
              if (e.keyCode == 13 || e.keyCode == 36)
              {
                  $('#loginform').submit();
              }
            });
      </script>

  </head>

  <body style="background-color:white;">

    <div class="container">


      <form id="loginform" action="index.php" method="post" class="form-signin">r
        <div class="text-center">
          <img src="../assets/img/logo/agora.png" width="130" height="130">
        </div>
        <h2 class="form-signin-heading">Please sign in</h2>

        <label for="inputEmail" class="sr-only">Email address</label>

        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="PASSWORD" class="form-control" placeholder="Password" required>

        <input type="email" id="inputEmail" name="inputEmail" class="form-control" placeholder="Email address">
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Password" required>

        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>

        <a class="btn btn-lg btn-primary btn-block" href="../signup">or Create An Account</a>
      </form>



        <button class="btn btn-lg btn-primary btn-block" type="button" onclick="validate()">Login</button>
        <a class="btn btn-lg btn-primary btn-block" href="../signup/">or Create An Account</a>
        
      <div class="error"><span><?php echo $error ?></span></div>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  </body>
</html>
