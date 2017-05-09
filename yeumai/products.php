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
                                    <img class="slide-image" src="http://match-all.com/matchall/photo/car1.jpg" alt="http://placehold.it/800x300">
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

                <div class="row">
                    <!-- TODO: Better to create a php function to do all of the below -->
                    <!-- TODO 2: Formatting -->
                    <?php
                        $json_data = file_get_contents('assets/data/hoang_data.dat'); 
                        $array = json_decode(trim($json_data), TRUE);
                        //$ch = curl_init();
                        //curl_setopt($ch, CURLOPT_URL, 'http://hroboter.com/sendproductsinfo.php');
                        //curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                        //$content = curl_exec($ch);
                        //curl_close($ch);
                        //$array = json_decode(trim($content), TRUE);
                        //var_dump($array);
                        foreach ($array as $row) {
                            echo '<div class="col-sm-4 col-lg-4 col-md-4">';
                            echo '<div class="thumbnail">';
                            echo '<img class="img-rounded mh-100"src="'.$row['image'].'" alt="">';
                            echo '<div class="caption">';
                            echo '<h4><a href="http://hroboter.com/single_product_page.php?id='.$row['id'].'">'.$row['title'].'</a></h4>';
                            echo '<p><h4>$'.$row['price'].'</h4></p>';
                            echo '<p>'.$row['description'].'</p>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                        }
                    ?>

                    <?php
                        $json_data = file_get_contents('assets/data/tai_data.dat'); 
                        $array = json_decode(trim($json_data), TRUE);
                    
                        foreach ($array as $row) {
                            echo '<div class="col-sm-4 col-lg-4 col-md-4">';
                            echo '<div class="thumbnail">';
                            echo '<img src="http://taipham.info/image/'.$row['image_uri'].'" alt="">';
                            echo '<div class="caption">';
                            echo '<h4><a href="http://taipham.info/single_product_page.php?id='.$row['prod_id'].'">'.$row['prod_name'].'</a></h4>';
                            echo '<p><h4>$'.$row['prod_price'].'</h4></p>';
                            echo '<p>'.$row['desc'].'</p>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                        }
                    ?>

                    
                    <?php
                        $json_data = file_get_contents('assets/data/phong_data.dat');
                        
                        $array = json_decode(trim($json_data), TRUE);
                        foreach ($array as $row) {
                            echo '<div class="col-sm-4 col-lg-4 col-md-4">';
                            echo '<div class="thumbnail">';
                            echo '<img src="'.$row['image'].'" alt="">';
                            echo '<div class="caption">';
                            echo '<h4><a href="http://match-all.com/detail.php?id='.$row['id'].'">'.$row['title'].'</a></h4>';
                            echo '<p><h4>$'.$row['price'].'</h4></p>';
                            echo '<p>'.$row['description'].'</p>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
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
