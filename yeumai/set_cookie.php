<?php

setcookie($_GET['val'], $_GET['val'], time()+60, "/match-all");
var_dump($_COOKIE);
?>