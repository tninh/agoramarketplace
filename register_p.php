<?php require_once('config.php'); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
    
    </head>
    <body>
        <!-- include header navigation -->
        <?php $current_page = "register_p.php" ?>
        <?php include 'header_nav.inc.php'; ?>

        <div class="container">
            <div class="row">
            <?php include 'side_bar.inc.php';?>

            <section id="page">
                <div id="page-bgtop">
                    <div id="page-bgbtm">

                        <?php
                            $useremail = filter_input(INPUT_POST, "useremail");
                            $userfirst = filter_input(INPUT_POST, "userfirst");
                            $userlast = filter_input(INPUT_POST, "userlast");
                            $usergender = filter_input(INPUT_POST, "usergender");
                            $cellphone = filter_input(INPUT_POST, "cellphone");
                            $homephone = filter_input(INPUT_POST, "homephone");
                            $address = filter_input(INPUT_POST, "address");
                            $city = filter_input(INPUT_POST, "city");
                            $state = filter_input(INPUT_POST, "state");
                            $zip = filter_input(INPUT_POST, "zip");
                            $userpass = filter_input(INPUT_POST, "userpass");
                            $userrole = "user";
                            
                            $search = $useremail . " " . $userfirst . " " . $userlast . " " . $usergender . " " . $cellphone 
                            . " " . $homephone . " " . $address . " " . $city . " " . $state . " " . $zip . " " . $userrole;

                            $created = createNewUser($useremail, $userfirst, $userlast, $usergender, 
                                        $cellphone, $homephone, $address, $city, $state, $zip, 
                                        $userpass, $userrole, $search);
                            
                            if ($created){
                                echo "Congratulation! Your account has been created successfully. ";
                            }
                            else {
                                echo "Error! ";
                            }
                        ?>                   

                        <div style="clear: both;">&nbsp;</div>
                    </div>
            </div>
        </section>
        </div>
    </div>
        <!-- end #page -->

    <!-- Footer -->
    <?php include 'footer.inc.php';?>
       
    <!-- /.container -->
    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    </body>
</html>
