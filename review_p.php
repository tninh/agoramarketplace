<?php require_once('config.php'); ?>
<!DOCTYPE html>
<html lang="en">
    <head>

    </head>
    <body>
        <!-- include header navigation -->
        <?php $current_page = "review_p.php"; ?>
        <?php include 'header_nav.inc.php'; ?>

        <div class="container">
            <div class="row">
            <?php include 'side_bar.inc.php';?>

                <section id="page">
                    <div id="page-bgtop">
                        <div id="page-bgbtm">

                            <?php
                                $userEmail = filter_input(INPUT_GET, "userEmail");
                                $productId = filter_input(INPUT_GET, "productId");
                                $rating = filter_input(INPUT_GET, "rating");
                                $comments = filter_input(INPUT_GET, "comments");
                                $url = "detail.php?id=".$productId;

                                if ($userEmail == null || $userEmail == '' || $userEmail=='LOGIN_SESSION_KEY')
                                    $userEmail = 'Anonymous';

                                if (strlen($rating) > 0) {
                                    if ($userEmail != 'Anonymous' && checkRating($userEmail, $productId, $rating, $comments))
                                    {
                                        if (updateRating($userEmail, $productId, $rating, $comments))
                                            Redirect($url);
                                        else 
                                            echo "Cannot update rating for this product";
                                    }
                                    else if (insertRating($userEmail, $productId, $rating, $comments)) {
                                         Redirect($url);
                                    }
                                    else
                                        echo "Cannot rate this product";
                                }
                                else
                                        echo "Need to rate something";
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
