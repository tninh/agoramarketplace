<?php session_start(); ?>
<?php require_once('utils/config.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/img/logo/agora.png">

    <title>Products</title>

    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/css/shop-homepage.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <?php include 'utils/header_nav.inc.php'; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-md-3">
                <p class="lead">Cookies</p>
                <div class="list-group">
                    <a href="lfive.php" class="list-group-item">Last five visited items</a>
                    <a href="topfivemarket.php" class="list-group-item">Five most ratings items in Agora</a>
                    <a href="topfivereview.php" class="list-group-item">Five most reviews items in Agora</a>
                </div>
                <p class="lead">Partners</p>
                <div class="list-group">
                    <a href="http://4youinc.co/" class="list-group-item">4 You Inc</a>
                    <a href="http://nowasian.com/companywebsite/" class="list-group-item">Know Asian</a>
                    <a href="http://www.roobra.com/" class="list-group-item">Roobra</a>
                    <a href="http://taipham.info/index.php" class="list-group-item">SoccerGearX</a>
                    <a href="http://match-all.com//" class="list-group-item">Auto Car</a>
                </div>
            </div>

            <div class="col-md-9">
                <!--
                <div class="row carousel-holder">

                    <div class="col-md-12">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img class="slide-image" src="http://match-all.com/photo/car1.jpg" alt="http://placehold.it/800x300">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="http://taipham.info/image/adidas-toque-13-jersey.jpg" alt="http://placehold.it/800x300">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="http://match-all.com/matchall/photo/car2.jpg" alt="http://placehold.it/800x300">
                                </div>
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>

                </div>
                -->
                <div class="row">
                    <!-- TODO: Better to create a php function to do all of the below -->

                <h3>ROOBRA</h3>

                <div class="row">

                   <?php 
                                             
                      $data = getMarketProduct('http://roobra.com/sendproductsinfo.php');
                      foreach ($data as $row) {
                           print " <div class='col-sm-4 col-lg-4 col-md-4'> \n";
                             print " <div class='thumbnail'> \n";
                                print " <img src='" . $row["image"] . "' alt='' style='width:256px;height:200px;'> \n";
                                print " <div class='caption'> \n";
                                   print " <h5><a href='http://roobra.com/detail.php?id=" . $row["id"] ."'>" . $row["title"] . "</a></h5> \n";
                                    print " <h5>$ " . $row["price"] . "</h5> \n";
                                   print " <h5>" . $row["location"] . "</h5> \n";
                                   print " <div class='ratings'> \n";
                                   $review = $row["count"];
                            if ($review <= 0) {
                                $review = 0;
                            }
                            print " <p class='pull-right'>" . $row["count"] ." reviews</p>";
                            print "<p>";
                            $rating = $row["avgRating"];
                            $round_rating = round($rating);
                            drawStars($round_rating);
                            print " " . $round_rating . " stars";
                                   print "</p>";    
                                   print " </div> \n";                          
                                print " </div> \n";
                             print " </div> \n";
                          print " </div> \n";

                      }    
                   ?>
                </div>

                <h3>4 YOU INC</h3>

                <div class="row">

                   <?php 
                                             
                      $data = getMarketProduct('http://4youinc.co/outproduct.php');
                      foreach ($data as $row) {
                           print " <div class='col-sm-4 col-lg-4 col-md-4'> \n";
                             print " <div class='thumbnail'> \n";
                                print " <img src='" . $row["image"] . "' alt='' style='width:256px;height:200px;'> \n";
                                print " <div class='caption'> \n";
                                   print " <h5><a href='http://4youinc.co/detail.php?id=" . $row["id"] ."'>" . $row["title"] . "</a></h5> \n";
                                    print " <h5>$ " . $row["price"] . "</h5> \n";
                                   print " <h5>" . $row["location"] . "</h5> \n";
                                   print " <div class='ratings'> \n";
                                   $review = $row["count"];
                            if ($review <= 0) {
                                $review = 0;
                            }
                            print " <p class='pull-right'>" . $row["count"] ." reviews</p>";
                            print "<p>";
                            $rating = $row["avgRating"];
                            $round_rating = round($rating);
                            drawStars($round_rating);
                            print " " . $round_rating . " stars";
                                   print "</p>";    
                                   print " </div> \n";                          
                                print " </div> \n";
                             print " </div> \n";
                          print " </div> \n";

                      }    
                   ?>
                </div>

                <h3>SoccerGearX</h3>

                <div class="row">

                    <?php 
                                                 
                        $data = getMarketProduct('http://taipham.info/outproduct.php');
                        foreach ($data as $row) {
                            print " <div class='col-sm-4 col-lg-4 col-md-4'> \n";
                            print " <div class='thumbnail'> \n";
                            print " <img src='" . $row["image"] . "' alt='' style='width:256px;height:200px;'> \n";
                            print " <div class='caption'> \n";
                            print " <h5><a href='http://taipham.info/detail.php?id=" . $row["id"] ."'>" . $row["title"] . "</a></h5> \n";
                            print " <h5>$ " . $row["price"] . "</h5> \n";
                            print " <h5>" . $row["location"] . "</h5> \n";                          
                            print " <div class='ratings'> \n";
                            $review = $row["count"];
                            if ($review <= 0) {
                                $review = 0;
                            }
                            print " <p class='pull-right'>" . $row["count"] ." reviews</p>";
                            print "<p>";
                            $rating = $row["avgRating"];
                            $round_rating = round($rating);
                            drawStars($round_rating);
                            print " " . $round_rating . " stars";
                            print "</p>";    
                            print " </div> \n";                          
                            print " </div> \n";
                            print " </div> \n";
                            print " </div> \n";
                        }    
                    ?>
                </div>    
                
                <h3>Auto Car</h3>

                <div class="row">

                    <?php 
                                                 
                        $data = getMarketProduct('http://match-all.com/productout.php');
                        foreach ($data as $row) {
                            print " <div class='col-sm-4 col-lg-4 col-md-4'> \n";
                            print " <div class='thumbnail'> \n";
                            print " <img src='" . $row["image"] . "' alt='' style='width:256px;height:200px;'> \n";
                            print " <div class='caption'> \n";
                            print " <h5><a href='http://match-all.com/detail.php?id=" . $row["id"] ."'>" . $row["title"] . "</a></h5> \n";
                            print " <h5>$ " . $row["price"] . "</h5> \n";
                            print " <h5>" . $row["location"] . "</h5> \n";                          
                            print " <div class='ratings'> \n";
                            $review = $row["count"];
                            if ($review <= 0) {
                                $review = 0;
                            }
                            print " <p class='pull-right'>" . $row["count"] ." reviews</p>";
                            print "<p>";
                            $rating = $row["avgRating"];
                            $round_rating = round($rating);
                            drawStars($round_rating);
                            print " " . $round_rating . " stars";
                            print "</p>";    
                            print " </div> \n";                          
                            print " </div> \n";
                            print " </div> \n";
                            print " </div> \n";
                        }    
                    ?>
                </div>

                <h3>Know Asian</h3>

                <div class="row">

                    <?php 
                                                 
                        $data = getMarketProduct('http://knowasian.com/companywebsite/productout.php');
                        foreach ($data as $row) {
                            print " <div class='col-sm-4 col-lg-4 col-md-4'> \n";
                            print " <div class='thumbnail'> \n";
                            print " <img src='" . $row["image"] . "' alt='' style='width:256px;height:200px;'> \n";
                            print " <div class='caption'> \n";
                            print " <h5><a href='http://knowasian.com/companywebsite/detail.php?id=" . $row["id"] ."'>" . $row["title"] . "</a></h5> \n";
                            print " <h5>$ " . $row["price"] . "</h5> \n";
                            print " <h5>" . $row["location"] . "</h5> \n";                          
                            print " <div class='ratings'> \n";
                            $review = $row["count"];
                            if ($review <= 0) {
                                $review = 0;
                            }
                            print " <p class='pull-right'>" . $row["count"] ." reviews</p>";
                            print "<p>";
                            $rating = $row["avgRating"];
                            $round_rating = round($rating);
                            drawStars($round_rating);
                            print " " . $round_rating . " stars";
                            print "</p>";    
                            print " </div> \n";                          
                            print " </div> \n";
                            print " </div> \n";
                            print " </div> \n";
                        }    
                    ?>
                </div>

            </div>

        </div>

    </div>
    <!-- /.container -->

    <div class="container">

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Agora Team 2017</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
