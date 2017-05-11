<?php require_once('utils/config.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/css/shop-homepage.css" rel="stylesheet">
</head>

<body>
    <!-- include header navigation -->
        <?php include 'utils/header_nav.inc.php'; ?>

   <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h3>TOP FIVE AGORA</h3>

                <div class="row">

                   <?php 

                      $data1 = getMarketProduct('http://match-all.com/topfiveout.php');                       
                      $data2 = getMarketProduct('http://hroboter.com/topfiveout.php');
                      $data = array_merge($data1, $data2);


                      $count = 0;  
                      foreach ($data as $row) {
                          $count++;
                           print " <div class='col-sm-4 col-lg-4 col-md-4'> \n";
                             print " <div class='thumbnail'> \n";
                                print " <img src='" . $row["image"] . "' alt='' style='width:256px;height:200px;'> \n";
                                print " <div class='caption'> \n";
                                   print " <h5><a href='detail.php?id=" . $row["id"] ."'>" . $row["title"] . "</a></h5> \n";
                                    print " <h5>$ " . $row["price"] . "</h5> \n";
                                   print " <h5>" . $row["location"] . "</h5> \n";
                                   print " <div class='ratings'> \n";
                                   print " <p class='pull-right'>" . getCountRatingById($row["id"]) ." reviews</p>";
                                   print "<p>";
                                     drawStars(getAvgRatingById($row["id"]));
                                     print " " . getAvgRatingById($row["id"]) . " stars";
                                   print "</p>";    
                                   print " </div> \n";                          
                                print " </div> \n";
                             print " </div> \n";
                          print " </div> \n";
                        //}
                      }    
                   ?>
              </div>     
            </div>
        </div>          
    </div>
    <!-- /.container -->

    <!-- /.container -->

    <div class="container">

        <!-- Footer -->
        <?php include 'footer.inc.php';?>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="bootstrap/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="bootstrap/js/bootstrap.min.js"></script>

</body>

</html>
