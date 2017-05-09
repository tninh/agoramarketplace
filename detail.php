<?php session_start(); ?>
<?php require_once('config.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <script type = "text/javascript">
        function validate()
        {        
          document.getElementById('rating').value = document.getElementById('count').innerHTML;
          document.forms["reviewform"].submit();
        }
        $('body').keypress(function(e){
          if (e.keyCode == 13 || e.keyCode == 36)
          {
              $('#reviewform').submit();
          }
        });
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
                                        print " <img class='mg-responsive' src='" . $row["image"] . "' alt=''> \n";
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
                                $rating = $row["avg_rating"];
                                $round_rating = round($row["avg_rating"]);
                                print " <div class='ratings'> \n";
                                print " <p class='pull-right'>" . $row["count_rating"] ." reviews</p>";
                                print "<p>";
                                drawStars($round_rating);
                                
                                print "&nbsp&nbsp" . number_format($rating, 1, '.', ''). " stars";
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
                      <form name="reviewform" id='reviewform' method='GET' action="review_p.php">                               
                           
                              <input type="hidden" name="userEmail" id='userEmail' 
                                      value="<?php print $_SESSION[$g_login_session_key]; ?>">    
                          
                              <input type="hidden" name="productId" id='productId' 
                                      value="<?php print filter_input(INPUT_GET, "id"); ?>">    
                           
                               <input type="hidden" name="rating" id='rating' >        
                                   
                              <textarea id='comments' name='comments' class='form-control' rows='3' placeholder='Your comments'/> </textarea>
                           
                          <div class="container">
                            <div class="row lead">
                                  <div id="stars" class="starrr"></div>
                                 <span name="count" id="count" hidden></span>
                            </div>
                          </div>
                                                         
                          <div class='text-right'> 
                        
                            <button class='btn btn-success' type="button" onclick="validate()">Leave a Review</button> 
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
