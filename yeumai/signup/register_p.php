<?php session_start(); ?>
<?php require_once('../utils/config.php'); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
    
    </head>
    <body>
        <!-- include header navigation -->
        <?php $current_page = "register_p.php" ?>
        <?php include '../utils/header_nav.inc.php'; ?>

        <div class="container">
            <div class="row">

            <section id="page">
                <div id="page-bgtop">
                    <div id="page-bgbtm">

                        <?php
                            $useremail = filter_input(INPUT_POST, "inputEmail");
                            $userfirst = filter_input(INPUT_POST, "inputFirstName");
                            $userlast = filter_input(INPUT_POST, "inputLastName");
                            //$usergender = filter_input(INPUT_POST, "usergender");
                            $usergender = "N/A";
                            $cellphone = filter_input(INPUT_POST, "inputCellPhone");
                            $homephone = filter_input(INPUT_POST, "inputHomePhone");
                            $address = filter_input(INPUT_POST, "inputAddress");
                            //$city = filter_input(INPUT_POST, "city");
                            //$state = filter_input(INPUT_POST, "state");
                            //$zip = filter_input(INPUT_POST, "zip");
                            $city = "N/A";
                            $state = "N/A";
                            $zip = "N/A";
                            $userpass = filter_input(INPUT_POST, "inputPassword");
                            $userrole = "user";
                            
                            $search = $useremail . " " . $userfirst . " " . $userlast . " " . $usergender . " " . $cellphone 
                            . " " . $homephone . " " . $address . " " . $city . " " . $state . " " . $zip . " " . $userrole;

                            $created = createNewUser($useremail, $userfirst, $userlast, $usergender, 
                                        $cellphone, $homephone, $address, $city, $state, $zip, 
                                        $userpass, $userrole, $search);
                            
                            echo $created;
                            /*
                            if ($created){
                                echo "Congratulation! Your account has been created successfully. ";
                            }
                            else {
                                echo "Error! ";
                            }
                            */
                        ?>                   

                        <div style="clear: both;">&nbsp;</div>
                    </div>
            </div>
        </section>
        </div>
    </div>
        <!-- end #page -->

    <!-- Footer -->
       
    <!-- /.container -->
    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    </body>
</html>
