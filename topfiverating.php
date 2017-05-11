<?php require_once('config.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>

</head>

<body>
    <!-- include header navigation -->
        <?php $current_page = "product.php"; ?>
        <?php include 'header_nav.inc.php'; ?>

   <!-- Page Content -->
    <div class="container">
        <div class="row">
            <?php include 'side_bar.inc.php';?>
            <div class="col-md-10">
                <h3>TOP FIVE RATING</h3>

                <div class="row">

                   <?php 

                      $top_auto = getMarketProduct('http://match-all.com/topfiveout.php');                       
                      $top_hroboter = getMarketProduct('http://hroboter.com/topfiveout.php');
                      
                      $merge_array = array_merge($top_auto, $top_hroboter);

                      $avgRating = array();
                      $count = array();
                      $id = array();
                      $price = array();
                      $location = array();
                      $title = array();
                      $image = array();
                      foreach ($merge_array as $key => $row) {
                        $avgRating[$key] = $row['avgRating'];
                        $count[$key] = $row['count'];
                        $id[$key] = $row['id'];
                        $price[$key] = $row['price'];
                        $location[$key] = $row['location'];
                        $title[$key] = $row['title'];
                        $image[$key] = $row['image'];
                      }

                      array_multisort($avgRating, SORT_DESC, $count, SORT_DESC, $merge_array);
                      
                      $count = 0;  
                      foreach ($merge_array as $row) {
                        if($count >= 5)
                          return;
                        else {
                          $count++;
                           print " <div class='col-sm-4 col-lg-4 col-md-4'> \n";
                             print " <div class='thumbnail'> \n";
                                print " <img src='" . $row["image"] . "' alt='' style='width:256px;height:200px;'> \n";
                                print " <div class='caption'> \n";
                                   print " <h5><a href='detail.php?id=" . $row["id"] ."'>" . $row["title"] . "</a></h5> \n";
                                    print " <h5>$ " . $row["price"] . "</h5> \n";
                                   print " <h5>" . $row["location"] . "</h5> \n";
                                   print " <div class='ratings'> \n";
                                   print " <p class='pull-right'>" . $row["count"] ." reviews</p>";
                                   print "<p>";            
                                     $round_rating = round($row["avgRating"]);
                                     $avgRating = number_format($row["avgRating"], 1, '.', '');
                                     drawStars($round_rating);
                                     print " " . $avgRating  . " stars";
                                   print "</p>";    
                                   print " </div> \n";                          
                                print " </div> \n";
                             print " </div> \n";
                          print " </div> \n";
                        }
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
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
