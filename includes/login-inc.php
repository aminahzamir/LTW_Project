<?php

if (isset($_POST["login-submit"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    require_once 'dbh-inc.php';
    require_once 'functions-inc.php';

    if (emptyInputLogin($username, $password) !== false) { /*check if user left input box empty*/ 
        header("location: ../login.php?error=emptyinput"); /*error msg*/
        exit();
    }

    loginUser($conn, $username, $password);
    $_SESSION["memberusername"] = $username; /*setting the session*/

}
else {
    header("location: ../login.php"); 
    exit();
}