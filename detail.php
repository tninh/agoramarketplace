<?php require_once('config.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
     <script type = "text/javascript">
            function validate()
            {        
                // var rating = document.getElementById("rating");      
                // var comments = document.getElementById("comments");   
                

                // session_start();
                // $_SESSION[$g_login_session_key] = "pdong@email.com";

                // echo(rating);

                // echo($g_login_session_key);

                //document.forms["reviewform"].submit();
            }
    </script>

    
</head>

<body>
    <!-- include header navigation -->
        <?php $current_page = "detail.php"; ?>
        <?php include 'header_nav.inc.php'; ?>

    <!-- Page Content -->
    <div class="container">
        <div class="row">

            <?php include 'side_bar.inc.php';?>
            <div class='col-md-9'>
                <div class='thumbnail'>

                <!-- Portfolio Item Row -->
                   <?php 
                        try
                          {
                            $conn = getConnectionPDO();
                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    
                            $id = filter_input(INPUT_GET, "id");

                            $query = " SELECT * from Product where id = :id ";
                            
                            $params = array(':id' => $id);
                            $ps = $conn->prepare($query);
                            $ps->execute($params);
                            $data = $ps->fetchAll(PDO::FETCH_ASSOC);

                            
                            foreach ($data as $row) {
                                        print " <img class='mg-responsive' src='photo\\" . $row["image"] . "' alt=''> \n";
                                        print " <div class='caption-full'> \n";
                                            print " <h3>" . $row["title"] . "</h3> \n";
                                            print " <h4 class='pull-right'>" . $row["price"] . "</h4> \n";
                                            print " <h4>" . $row["location"] . "</h4> \n";
                                            print " <p>"  . $row["description"] . " </p> \n";
                                        print " </div> \n";
                                       
                            }

                            $query = " SELECT avg(rating) as avg_rating, count(rating) as count_rating from Rating where productId = :id ";
                            
                            $params = array(':id' => $id);
                            $ps = $conn->prepare($query);
                            $ps->execute($params);
                            $data = $ps->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($data as $row) {
                                $avg_rating = round($row["avg_rating"]);
                                print " <div class='ratings'> \n";
                                print " <p class='pull-right'>" . $row["count_rating"] ." reviews</p>";
                                print "<p>";
                                drawStars($avg_rating);
                                
                                print " " . $avg_rating. " stars";
                                print "</p>";
                                print " </div> \n";
                            }

                
                            $query = " SELECT R.userEmail, R.rating, R.comments from Rating R where productId = :id ";
                            
                            $params = array(':id' => $id);
                            $ps = $conn->prepare($query);
                            $ps->execute($params);
                            $data = $ps->fetchAll(PDO::FETCH_ASSOC);
                            
                            print "<div class='well'>";                                                     
                            foreach ($data as $row) {
                                print " <hr> ";
                                print " <div class='row'> ";
                                    print " <div class='col-md-12'> ";
                                        drawStars($row["rating"]);
                                        print " ". $row["userEmail"];
                                        print " <p>" . $row["comments"] ."</p>";
                                    print " </div> \n";
                                print " </div> \n";
                            }
                            print " </div> \n";

                          }
                          catch (Exception $ex)
                          {
                                echo 'ERROR: ' . $ex->getMessage();
                          }
                          catch (PDOException $ex)
                          {
                              echo 'ERROR: ' . $ex->getMessage();
                          }

                   ?>
                    <section> 
                      <form class='form-inline' role='form' id='reviewform' method='GET' action='review_p.php'>                               
                           <div class='form-group'> 
                              <input type="hidden" name="userEmail" id='userEmail' 
                                      value="<?php print $g_login_session_key; ?>">    
                              <input type="hidden" name="productId" id='productId' 
                                      value="<?php print filter_input(INPUT_GET, "id"); ?>">                            
                              <textarea id='comments' name='comments' class='form-control' rows='3' placeholder='Your comments' style="margin: 0px; width: 490px;"/> </textarea>
                              <input type='text' name='rating' id='rating' "/>
                              <div class="container">
                                <div class="row lead">
                                      <div id="stars" class="starrr"></div>
                                     
                                </div>
                              </div>
                             
                           </div>                                    
                          <div class='text-right'> 
                           <button class='btn btn-success' type="submit" >Leave a Review</button> 
                          </div> 
                      </form>  
                  </section> 
                    
                   
                
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
                         
    <?php include 'footer.inc.php'; ?>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/starrating.js"></script>

</body>

</html>
