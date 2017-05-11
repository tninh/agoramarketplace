<?php
    require_once('config.php');
    session_start();

    if (count($_SESSION) != 0){
        //has session continue as user
        var_dump($_SESSION);
    }
    else {
        // no session continue as anonymous
        var_dump($_SESSION);
    }

?>
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

                    //get the last 5 visited items ID.
                    $arr=array_reverse($_COOKIE);
                    $keyArr= [];
                    $i=0;
                    foreach($arr as $key => $value){
                        if ($key == "PHPSESSID"){}
                        else {
                            array_push($keyArr, $value);
                            $i++;
                            if ($i == 5) break;
                        }
                    }
                    foreach ($keyArr as $value){
                        $temp = explode("_", $value);

                        if ($temp[0] == "knowasian"){

                            $link = "http://" . $temp[0] . ".com/companywebsite/getProduct.php?id=" . $temp[1];
                            $temp = file_get_contents($link);
                            $row = json_decode($temp, true);
                            var_dump($row);
                            $temp= "http://knowasian.com/companywebsite/detail.php?id=" . $row["ID"];

                        }
                        else if ($temp[0] == "taipham"){

                            $link = "http://" . $temp[0] . ".com/getProduct.php?id=" . $temp[1];
                            $temp = file_get_contents($link);
                            $row = json_decode($temp, true);
                            $temp= "http://taipham.info/detail.php?id=" . $row["ID"];
                        }
                        else if ($temp[0] == "match-all"){

                            $link = "http://" . $temp[0] . ".com/getProduct.php?id=" . $temp[1];
                            $temp = file_get_contents($link);
                            $row = json_decode($temp, true);
                            $temp= "http://match-all.com/detail.php?id=" . $row["ID"];

                        }
                        else{}
                        print "<div class='col-sm-4 col-lg-4 col-md-4'> \n";
                        print "<div class='thumbnail'> \n";
                        print "<a href=" . $temp . ">" . "<img src=" . $row["image"] . " style='width:256px;height:200px;'>" . "</a> \n";
                        print "<div class='caption'> \n";
                        print "<h5><a href='detail?id=" . $row["id"] ."'>" . $row["title"] . "</a></h5> \n";
                        print " <h5>$ " . $row["price"] . "</h5> \n";
                        print " <h5>" . $row["location"] . "</h5> \n";
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
        <?php include 'footer.inc.php';?>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
