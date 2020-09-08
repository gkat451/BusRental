<?php
if (session_status() == PHP_SESSION_NONE){
    session_start();
}
unset($_SESSION["loginName"]);
unset($_SESSION["loginPass"]);
unset($_SESSION["validation"]);

header("Refresh: 0, URL=../view/login.php");
?>