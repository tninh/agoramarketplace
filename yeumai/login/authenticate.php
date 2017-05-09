<?php
// testing session
extract($_POST);
if ($USERNAME == "trung@gmail.com" && $PASSWORD == "123") {
    session_set_cookie_params(30);
    session_start();
    $_SESSION["username"] = "trung@gmail.com";
    header('Location: http://localhost/match-all/yeumai/main.php');
    exit();

}
else{}
?>
