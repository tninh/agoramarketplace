<?php require_once('config.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>

</head>

<body>
    <!-- include header navigation -->
        <?php $current_page = "lastfive.php"?>
        <?php include 'header_nav.inc.php';?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

             <?php include 'side_bar.inc.php';?>


            <div class="col-md-10">

                <div class="row">

                   <?php 
                        try
                          {
                            $ids = unserialize($_COOKIE["id"]);  

                            $conn = getConnectionPDO();
                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                            for ($i = 0; $i < 5; $i++) {
                            
                              $id = $ids[$i];
                              $query = " select * from Product where id = :id \n";
                              
                              $params = array(':id' => $id);
                              $ps = $conn->prepare($query);
                              $ps->execute($params);
                              $data = $ps->fetchAll(PDO::FETCH_ASSOC);

                              foreach ($data as $row) {
                                       print " <div class='col-sm-4 col-lg-4 col-md-4'> \n";
                                         print " <div class='thumbnail'> \n";
                                            print " <img src='photo\\" . $row["image"] . "' alt='' style='width:256px;height:200px;'> \n";
                                            print " <div class='caption'> \n";
                                               print " <h5><a href='detail?id=" . $row["id"] ."'>" . $row["title"] . "</a></h5> \n";
                                                print " <h5>$ " . $row["price"] . "</h5> \n";
                                               print " <h5>" . $row["location"] . "</h5> \n";
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

        <hr>

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
