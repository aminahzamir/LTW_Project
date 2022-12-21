<?php

if (isset($_POST["signup-submit"])) {      /*checking that user pressed signup button*/

    $title = $_POST["title"];
    $fname = $_POST["firstname"];
    $sname = $_POST["surname"];
    $streetname = $_POST["streetname"];
    $cityname = $_POST["cityname"];
    $doornum = $_POST["doornum"];
    $postcode = $_POST["postcode"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["pwd"];
    $passwordrepeat = $_POST["pwdrepeat"];

    require_once 'dbh-inc.php';      /*linking our db*/
    require_once 'functions-inc.php';

    if (emptyInputSignup($title, $fname, $sname, $streetname, $cityname, $doornum, $postcode, $email, $username, $password, $passwordrepeat) !== false) { /*check if user left input box empty*/ 
        header("location: ../signup.php?error=emptyinput"); /*error msg*/
        exit();
    }

    if (invalidUsername($username) !== false) { /*check if username is valid*/ 
        header("location: ../signup.php?error=invalidusername"); 
        exit();
    }

    if (invalidEmail($email) !== false) { /*check if email is valid*/ 
        header("location: ../signup.php?error=invalidemail"); 
        exit();
    }

    if (pwdMatch($password, $passwordrepeat) !== false) { /*check if passwords match*/ 
        header("location: ../signup.php?error=passwordsnomatch"); 
        exit();
    }    

    if (usernameemailExists($conn, $username, $email) !== false) { /*check if username and email already exists in db*/ 
        header("location: ../signup.php?error=usernametaken"); 
        exit();
    }

   createMember($conn, $title, $fname, $sname, $streetname, $cityname, $doornum, $postcode, $email, $username, $password);  /*if no error, user can be signed into db*/

}

else {
    header("location: ../signup.php");
    exit();
}