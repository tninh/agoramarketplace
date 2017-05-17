<?php session_start(); ?>
<?php require_once('../utils/config.php'); ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include '../utils/header_nav.inc.php'; ?>

        <title>LOGOUT</title>
    </head>
    <body>
        <!-- include header navigation -->
        <?php $current_page = "logout.php" ?>
        <?php include '../utils/header_nav.inc.php'; ?>

        <section id="page">
            <?php
            // Inialize session
            //session_start();
			
            // Delete certain session
            //unset($_SESSION['username']);
            unset($_SESSION[$g_login_session_key]);
            // Delete all session variables
            session_destroy();
            // Jump to login page
            Redirect("../login/index.php");
            ?>
        </section>
        <!-- end #page -->

        <!-- include footer -->
        <?php include '../utils/footer.php'; ?>
    </body>
</html>