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
                Redirect("../product.php");
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

    <title>Sign Up</title>

    <!-- Bootstrap core CSS -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link href="../signup/signup.css" rel="stylesheet">

    <script type = "text/javascript">
            function validate()
            {
                var useremail = document.getElementById("inputEmail");
                var userfirst = document.getElementById("inputFirstName");
                var userlast = document.getElementById("inputLastName");
                //var usergender = document.getElementById("usergender");
                var gender = "N/A"
                var cellphone = document.getElementById("inputCellPhone");
                var homephone= document.getElementById("inputHomePhone");
                var address = document.getElementById("inputAddress");
                //var city = document.getElementById("city");
                //var state = document.getElementById("state");
                //var zip = document.getElementById("zip");
                var city = "N/A"
                var state = "N/A"
                var zip = "N/A" 
                     
                var userpass = document.getElementById("inputPassword");
                var errors = "";
                //Regular expressions
                var userregex = /^.{6,50}$/;
                var nameregex = /^[a-zA-Z]{2,50}$/;
                var pwregex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{6,50}$/;
                var phoneregex = /^[0-9]{3}-[0-9]{3}-[0-9]{4}$/;
                //var zipregex = /^[0-9]{5}$/;
                //var genderregex = /^[F,M,f,m]$/
                //Comparison between user input and regex
                if (!userregex.test(useremail.value))
                {
                    errors += "Invalid email!\n";
                    useremail.style.borderColor = "red";
                }
                if (!nameregex.test(userfirst.value))
                {
                    errors += "Invalid first name!\n";
                    userfirst.style.borderColor = "red";
                }
                if (!nameregex.test(userlast.value))
                {
                    errors += "Invalid last name!\n";
                    userlast.style.borderColor = "red";
                }
                /*
                if (usergender.value != "" && !genderregex.test(usergender.value))
                {
                    errors += "Invalid gender!\n";
                    usergender.style.borderColor = "red";
                }*/
                /*
                if (!phoneregex.test(cellphone.value))
                {
                    errors += "Invalid cell phone number!\n";
                    cellphone.style.borderColor = "red";
                }
                if (homephone.value != "" && !phoneregex.test(homephone.value))
                {
                    errors += "Invalid home phone numer!\n";
                    homephone.style.borderColor = "red";
                }
                */
                /*
                if (!zipregex.test(zip.value))
                {
                    errors += "Invalid zip code!\n";
                    zip.style.borderColor = "red";
                }*/
                if (!pwregex.test(userpass.value))
                {
                    errors += "Invalid password!";
                    userpass.style.borderColor = "red";
                }
                if (errors != "") {
                    alert(errors);
                } 
                else
                {
                    useremail.style.borderColor = "green";
                    userfirst.style.borderColor = "green";
                    userlast.style.borderColor = "green";
                    //usergender.style.borderColor = "green";
                    cellphone.style.borderColor = "green";
                    homephone.style.borderColor = "green";
                    address.style.borderColor = "green";
                    //city.style.borderColor = "green";
                    //state.style.borderColor = "green";
                    //zip.style.borderColor = "green";
                    userpass.style.borderColor = "green";
                    document.forms["registerform"].submit();
                }
            }
            function checkPassword()
            {
                var pass1 = document.getElementById('userpass');
                var pass2 = document.getElementById('userpass2');
                if (pass1.value == pass2.value)
                {
                    pass2.style.borderColor = "green";
                } 
                else
                {
                    pass2.style.borderColor = "red";
                }
            }
        </script>
  </head>

  <body style="background-color:white;">

    <div class="container">

      <form id="registerform" action="register_p.php" method="post" class="form-signin">
        <div class="text-center">
          <img src="../assets/img/logo/agora.png" width="130" height="130">
        </div>
        <h2 class="form-signin-heading">Create An Account</h2>

        <label for="email" class="sr-only">Email</label>
        <input type="email" id="inputEmail" name="inputEmail" class="form-control" placeholder="Email" required>
        <label for="firstname" class="sr-only">First Name</label>
        <input type="text" id="inputFirstName" name="inputFirstName" class="form-control" placeholder="First Name" required>
        <label for="lastname" class="sr-only">Last Name</label>
        <input type="text" id="inputLastName" name="inputLastName" class="form-control" placeholder="Last Name" required>
        <label for="inputUsername" class="sr-only">Username</label>
        <input type="text" id="inputUsername" name="inputUsername" class="form-control" placeholder="Username" required>   
        <label for="cellphone" class="sr-only">Cell Phone</label>
        <input type="tel" id="inputCellPhone" name="inputCellPhone" class="form-control" placeholder="Cell Phone" required>
        <label for="homephone" class="sr-only">Home Phone</label>
        <input type="tel" id="inputHomePhone" name="inputHomePhone" class="form-control" placeholder="Home Phone" required>
        <label for="address" class="sr-only">Address</label>
        <input type="text" id="inputAddress" name="inputAddress" class="form-control" placeholder="Address" required>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Password" required>
        <div class="help">Minimum 6 characters. At least 1 digit, 1 upper case and 1 lower case letter</div>

        <button class="btn btn-lg btn-outline-primary btn-block" type="button" onclick="validate()">Create Your <span><img src="../assets/img/logo/agora.png" width="30" height="30"></span> Account</button>
      </form>

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
