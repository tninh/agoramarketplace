<?php session_start(); ?>
<?php require_once('config.php'); ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include 'header_nav.inc.php'; ?>

        <title>LOGOUT</title>
    </head>
    <body>
        <!-- include header navigation -->
        <?php $current_page = "logout.php" ?>
        <?php include 'header_nav.inc.php'; ?>

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
            Redirect("login.php");
            ?>
        </section>
        <!-- end #page -->

        <!-- include footer -->
        <?php include 'footer.inc.php'; ?>
    </body>
</html>