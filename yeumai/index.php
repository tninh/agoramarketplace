<?php
    function Redirect($url)
    {
        //header("Location:  " . $url);
        print "<script type='text/javascript'>
            window.location = '". $url ."';
        </script>";
        exit();
    }
    Redirect("main.php"); 
?>