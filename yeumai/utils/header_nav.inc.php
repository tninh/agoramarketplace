
  <!-- Navigation -->
  <header>
    <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Agora</title>

        <!-- Bootstrap Core CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../css/shop-homepage.css" rel="stylesheet">
        <!-- Bootstrap Core CSS -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="bootstrap/css/shop-homepage.css" rel="stylesheet">
         <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->


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
                <a class="navbar-brand" href="index.php">Agora</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="index.php">Home</a>
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
                        <a href="#">Users</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="login/index.php">Log in</a>
                    </li>
                    <li>
                        <a href="logout/index.php">Log out</a>
                    </li>
                    <li>
                        <a href="signup/index.php">Register</a>
                    </li>
                    <li>
                        <a href="#"><?php print $_SESSION[$g_login_session_key]?></a>
                    </li>
                    
                </ul>

            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

</header>