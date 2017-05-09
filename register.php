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
            .register {
                width: 980px;
                margin: 0 auto;

                display: flex;
                justify-content: center;
                align-items: center;
                font-size: 16px;
                padding-top: 12px;
                padding-bottom: 12px;
            }
            .register form {
                background: white;
                width: 40%;
                box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.7);
                font-family: lato;
                position: relative;
                color: #333;
                border-radius: 10px;
                margin: auto;
            }
            .register form h1 {
                background: #003300;
                padding: 30px 20px;
                color: white;
                font-size: 1.2em;
                font-weight: 600;
                border-radius: 10px 10px 0 0;
            }
            .register form label {
                margin-left: 20px;
                display: inline-block;
                margin-top: 20px;
                margin-bottom: 5px;
                position: relative;
            }
            .register form label span {
                color: #FF3838;
                font-size: 1em;
                position: static;
                left: 2.3em;
            }
            .register form input {
                display: block;
                width: 78%;
                margin-left: 20px;
                padding: 5px 20px;
                font-size: 1em;
                border-radius: 3px;
                outline: none;
                border: 1px solid #ccc;
            }
            .register form .help {
                margin-left: 20px;
                font-size: 0.8em;
                color: #777;
            }
            .register form button {
                position: relative;
                margin-top: 30px;
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
            .register form button:hover {
                background: #ff5252;
            }
        </style>
        <script type = "text/javascript">
            function validate()
            {
                var useremail = document.getElementById("useremail");
                var userfirst = document.getElementById("userfirst");
                var userlast = document.getElementById("userlast");
                var usergender = document.getElementById("usergender");
                var cellphone = document.getElementById("cellphone");
                var homephone= document.getElementById("homephone");
                var address = document.getElementById("address");
                var city = document.getElementById("city");
                var state = document.getElementById("state");
                var zip = document.getElementById("zip");
           
                     
                var userpass = document.getElementById("userpass");
                var errors = "";
                //Regular expressions
                var userregex = /^.{6,50}$/;
                var nameregex = /^[a-zA-Z]{2,50}$/;
                var pwregex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{6,50}$/;
                var phoneregex = /^[0-9]{3}-[0-9]{3}-[0-9]{4}$/;
                var zipregex = /^[0-9]{5}$/;
                var genderregex = /^[F,M,f,m]$/
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
                if (usergender.value != "" && !genderregex.test(usergender.value))
                {
                    errors += "Invalid gender!\n";
                    usergender.style.borderColor = "red";
                }
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
                if (!zipregex.test(zip.value))
                {
                    errors += "Invalid zip code!\n";
                    zip.style.borderColor = "red";
                }
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
                    usergender.style.borderColor = "green";
                    cellphone.style.borderColor = "green";
                    homephone.style.borderColor = "green";
                    address.style.borderColor = "green";
                    city.style.borderColor = "green";
                    state.style.borderColor = "green";
                    zip.style.borderColor = "green";
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

<body>
    <!-- include header navigation -->
        <?php $current_page = "register.php"?>
        <?php include 'header_nav.inc.php';?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <?php include 'side_bar.inc.php';?>

            <div class="col-md-10">
               <section class="register">
                <form id="registerform" action="register_p.php" method="post">
                    <h1>Registration</h1>
                    <label>Email <span>*</span></label>
                    <input type="text" id="useremail" name="useremail" required/>
                    <div class="help">Email@email.com</div>
                    
                    <label>First Name <span>*</span></label>
                    <input type="text" id="userfirst" name="userfirst" required/>
                    <div class="help">Can't be abbreviated(minimum 2 characters). Can't contain digits</div>
                    
                    <label>Last Name <span>*</span></label>
                    <input type="text" id="userlast" name="userlast" required/>
                    <div class="help">Can't be abbreviated(minimum 2 characters). Can't contain digits</div>
                    
                    <label>Gender <span></span></label>
                    <input type="text" id="usergender" name="usergender"/>
                    <div class="help">F:female - M:male</div>
                    
                    <label>Cell Phone <span>*</span></label>
                    <input type="text" id="cellphone" name="cellphone" required/>
                    <div class="help">408-123-4567</div>
                    
                    <label>Home Phone <span></span></label>
                    <input type="text" id="homephone" name="homephone"/>
                    <div class="help">408-123-4567</div>
                    
                    <label>Address <span>*</span></label>
                    <input type="text" id="address" name="address" required/>
                    <div class="help">123 Washington st</div>
                    
                    <label>City <span>*</span></label>
                    <input type="text" id="city" name="city" required/>
                    <div class="help">Ssan Jose</div>
                    
                    <label>State <span>*</span></label>
                    <input type="text" id="state" name="state" required/>
                    <div class="help">California</div>
                    
                    <label>Zip Code <span>*</span></label>
                    <input type="text" id="zip" name="zip" required/>
                    <div class="help">95122</div>
                    
                    <label>Password <span>*</span></label>
                    <input type="password" id="userpass" name="userpass" required/>
                    <div class="help">Minimum 6 characters. At least 1 digit, 1 upper case and 1 lower case letter</div>
                    
                    <label>Confirm Password <span>*</span></label>
                    <input type="password" id="userpass2" onkeyup="checkPassword();
                            return false;" required/>
                    <div class="help">Type your password again</div>
                    <button type="button" onclick="validate()">Register</button>
                </form>
            </section>

            </div>
        </div>
    </div>
    <!-- /.container -->

    <!-- Footer -->
    <?php include 'footer.inc.php';?>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
