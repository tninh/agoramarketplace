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
                <h3>AUTO CAR</h3>
                <div class="row">

                   <?php 
                        try
                          {
                            $conn = getConnectionPDO();

                            $query = " select distinct p.*, d.*" .
                                      " from  Product p " .
                                      " INNER JOIN ( " .
                               
                                      " SELECT r.productId, count(r.productId) as count, sum(r.rating) as sum, ".
                                      " sum(r.rating)/count(r.productId) as avgRating " .
                                      " FROM Rating r " .
                                      " GROUP BY r.productId ) d " .
                              
                                      " ON p.id = d.productId " .
                                      " order by d.avgRating desc " ;

                            $params = null;
                            $ps = $conn->prepare($query);
                            $ps->execute($params);
                            $data = $ps->fetchAll(PDO::FETCH_ASSOC);    
                            $count = 0;             
                            foreach ($data as $row) {
                                if($count >= 5)
                                  break;
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
                                           print " <p class='pull-right'>" . getCountRatingById($row["id"]) ." reviews</p>";
                                           print "<p>";
                                             $rating = getAvgRatingById($row["id"]);
                                             drawStars(round($rating));
                                             print "&nbsp&nbsp" . number_format($rating, '1', '.', '') . " stars";
                                           print "</p>";    
                                           print " </div> \n";                          
                                        print " </div> \n";
                                     print " </div> \n";
                                  print " </div> \n";

                                }
                            }                                   
                          }
                          catch (PDOException $ex)
                          {
                                echo 'ERROR: ' . $ex->getMessage();
                          }
                          catch (Exception $ex)
                          {
                                echo 'ERROR: ' . $ex->getMessage();
                          }
                   ?>

                </div>
            </div>
        </div>          
    </div>
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
