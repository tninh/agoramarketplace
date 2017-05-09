<?php require_once('config.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>

</head>

<body>
    <!-- include header navigation -->
        <?php $current_page = "outuser.php"?>
       

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-md-10">
                <h3>Auto User</h3>

                <div class="row class='table-responsive'">
                 <?php 
                        try
                          {
                            $conn = getConnectionPDO();
                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                            $query = " select userFirst as 'First Name', userLast as 'Last Name' " .
                                     " , userEmail as 'Email' " .
                                     " , userGender as 'Gender', cellPhone as 'Cell Phone' " .
                                     " , address as 'Address', city as 'City', state as 'State' " .
                                     " , zip as 'Zip Code' " .
                                     "  from User ";
                            
                            $params = null;
                            $ps = $conn->prepare($query);
                            $ps->execute($params);
                            $data = $ps->fetchAll(PDO::FETCH_ASSOC);

                            
                           if (count($data) > 0)
                            constructTable($data, true, "", "", "");
                           else
                              print "<h3>There is no user</h3>\n";
                                   

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
        

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
