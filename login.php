<?php session_start(); ?>
<?php require_once('config.php'); ?>
<?php
    
    $useremail = filter_input(INPUT_POST, "useremail");
    $userpass = filter_input(INPUT_POST, "userpass");
    
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
                Redirect("product.php");
        }
    }
?> 

<!DOCTYPE html>
<html lang="en">

<head>

        <style>
            .login {
                width: 980px;
                margin: 0 auto;

                display: flex;
                justify-content: center;
                align-items: center;
                font-size: 16px;
                padding-top: 12px;
                padding-bottom: 12px;
                
            }
            .login form {
                background: white;
                width: 40%;
                box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.7);
                font-family: lato;
                position: relative;
                color: #333;
                border-radius: 10px;
                margin: auto;
            }
            .login form h1 {
                background: #003300;
                padding: 30px 20px;
                color: white;
                font-size: 1.2em;
                font-weight: 600;
                border-radius: 10px 10px 0 0;
            }
            .login form label {
                margin-left: 20px;
                display: inline-block;
                margin-top: 30px;
                margin-bottom: 5px;
                position: relative;
            }
            
            .login form label span {
                color: #FF3838;
                font-size: 1em;
                position: static;
                left: 2.3em;
            }
            
            .login form input {
                display: block;
                width: 78%;
                margin-left: 20px;
                padding: 5px 20px;
                font-size: 1em;
                border-radius: 3px;
                outline: none;
                border: 1px solid #ccc;
            }
            
            .login form button {
                display: block;
                position: relative;
                margin-top: 40px;
                margin-bottom: 30px;
                left: 50%;
                transform: translate(-50%, 0);
                font-family: inherit;
                color: white;
                background: #003300;
                outline: none;
                border: none;
                padding: 5px 15px;
                font-size: 1.3em;
                font-weight: 400;
                border-radius: 3px;
                box-shadow: 0px 0px 10px rgba(51, 51, 51, 0.4);
                cursor: pointer;
                transition: all 0.15s ease-in-out;
            }
            .login form button:hover {
                background: #ff5252;
            }
            
             .error {
                margin-left: 20px;
                display: inline-block;
                margin-top: 5px;
                margin-bottom: 20px;
                position: relative;
            }
            
            .error span {
                color: #FF3838;
                font-size: 1em;
                position: relative;
                left: 2.3em;
            }
           
        </style>
        <script type = "text/javascript">
            function validate()
            {
                var useremail = document.getElementById("useremail");
                var userpass = document.getElementById("userpass");
                var errors = "";
                var userregex = /^.{5,50}$/;
                var pwregex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{6,50}$/;
                
                if (!userregex.test(useremail.value))
                {
                    errors += "Invalid useremail!\n";
                    document.getElementById('userpass').style.borderColor = "red";
                }
                if(userpass.value.length == 0)
                {
                    errors += "Invalid password!\n";
                    document.getElementById('userpass').style.borderColor = "red";  
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

</head>

<body>
    <!-- include header navigation -->
        <?php $current_page = "login.php"?>
        <?php include 'header_nav.inc.php';?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <?php include 'side_bar.inc.php';?>

            <div class="col-md-10">
                <section class="login">
                  <form id="loginform" action="login.php" method="post">
                      <input type="hidden" name="url" value="<?php print filter_input(INPUT_GET, "url"); ?>">
                      <h1>Login</h1>
                      <label>Email <span>*</span></label>
                      <input type="email" id="useremail" name="useremail" required/>
                      <label>Password <span>*</span></label>
                      <input type="password" id="userpass" name="userpass" required/>
                      
                      <button type="button" onclick="validate()">Login</button>
                      
                      <div class="error"><span><?php echo $error ?></span></div>
                  </form>
                </section>

            </div>
        </div>
    </div>
    <!-- /.container -->

   
    <!-- Footer -->
    <?php include 'footer.inc.php';?>

    
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
