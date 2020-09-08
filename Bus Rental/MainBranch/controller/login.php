<?php 
if (session_status() == PHP_SESSION_NONE){
    session_start();
}
$_SESSION["login"] = "login";
$_SESSION["returnVal"] = "";
//should do this with javascript validation, not on request

if (isset($_REQUEST["login"])
     && !empty($_REQUEST["loginName"])
     && !empty($_REQUEST["loginPass"])){
    
    if (htmlentities($_REQUEST["loginName"]) == "admin1" && htmlentities($_REQUEST["loginPass"]) == "abc"){
        $_SESSION["validation"] = true;
        $_SESSION["loginName"] = "admin1";
        $_SESSION["login"] = "admin";
        header("Refresh: 0, URL=../view/admin.php");
    }
    else {
        $_SESSION["validation"] = false;
        $_SESSION["returnVal"] = "Wrong username or password.<br>Please try again.";
    }
}

if(isset($_SESSION["validation"])){
    if($_SESSION["validation"]){
        header("Refresh: 0, URL=../view/admin.php");
    }
}
?>