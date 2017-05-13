<?php
    session_start();

    if (count($_SESSION) != 0){

        //var_dump($_SESSION);
    }
    else {}//var_dump($_SESSION);
    
?>
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

<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!--<img class="pull-left" src="assets/img/logo/agora.png">-->
            <a class="navbar-brand" href="#">Agora Marketplace</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    <a href="main.php">Home</a>
                </li>
                <li>
                    <a href="about.php">About</a>
                </li>
                <li>
                    <a href="products.php">Products</a>
                </li>
                <li>
                    <a href="news.php">News</a>
                </li>
                <li>
                    <a href="contacts.php">Contacts</a>
                </li>
                <li>
                    <a href="users/users_main.php">Users</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <div class="col-md-3">
            <p class="lead">Cookies</p>
            <div class="list-group">
                <a href="lfive.php" class="list-group-item">Last five visited items</a>
                <a href="mfive.php" class="list-group-item">Five most visited items</a>
            </div>
            <p class="lead">Partners</p>
            <div class="list-group">
                <a href="http://hroboter.com/" class="list-group-item">HRoboter</a>
                <a href="http://taipham.info/index.php" class="list-group-item">SoccerGearX</a>
                <a href="http://match-all.com/matchall/" class="list-group-item">Auto Car</a>
            </div>
        </div>

        <div class="col-md-9">



            <div class="row">
                <?php
                //get the last 5 visited items ID.
                $arr=$_COOKIE;
                $keyArr= [];
                $i=0;
                foreach($arr as $key => $value){
                    if ($key == "PHPSESSID"){}
                    else {
                        $keyArr[$key] = $value;
                    }
                }
                
                arsort($keyArr);
                $count = 0;
                
                foreach ($keyArr as $value){
                    $temp = explode("_", $value);

                    if($temp[0] == "knowasian"){

                        $link = "http://" . $temp[0] . ".com/companywebsite/getProduct.php?id=" . $temp[1];
                        $temp = file_get_contents($link);
                        $row = json_decode($temp, true);
                        

                        $temp= "http://knowasian.com/companywebsite/detail.php?id=" . $row["id"];
                        echo "<div style='float:left;margin:20px;'><label>" . $row["title"] . "</label><br />";
                        echo "<a href=" . $temp . ">" . "<img src=" . $row["image"] . " style='width:340px;height:228px;'>" . "</a></div>";

                    }
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
