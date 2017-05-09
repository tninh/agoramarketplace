<?php
// testing session
extract($_POST);
if ($USERNAME == "trung@gmail.com" && $PASSWORD == "123") {
    session_set_cookie_params(30);
    session_start();
    $_SESSION["username"] = "trung@gmail.com";
    //set cookie to other domains
    $link = "http://knowasian.com/companywebsite/setSession.php?username=" . $_SESSION["username"];
    echo "<img src=" . $link . " style='display:none;'>";
    // dont do redidect it wont work.
    echo "<a href='../main.php'> aaaaa </a>>";

}
else{
    //redirect to login
    header('Location: http://localhost/match-all/yeumai/login/index.php');
    exit();
}
?>
