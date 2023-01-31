<?php 

function emptyInputSignup($title, $fname, $sname, $streetname, $cityname, $doornum, $postcode, $email, $username, $password, $passwordrepeat) {  /*checking if boxes filled out by user in signup stage*/
    $result = false;
    if (empty($title) || empty($fname) || empty($sname) || empty($streetname) || empty($cityname) || empty($doornum) || empty($postcode) || empty($email) ||empty($username) || empty($password) || empty($passwordrepeat)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function invalidUsername($username) { /*checking if username is valid*/
    $result = false;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {  
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function invalidEmail($email) {
    $result = false;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { /*checking if email is valid*/ 
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function pwdMatch($password, $passwordrepeat) {
    $result = false;
    if ($password !== $passwordrepeat) { /*checking if passwords match*/ 
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function usernameOrEmailExists($conn, $username, $email) { /*check if username & email already exists in db*/
    $sql = "SELECT * FROM Member WHERE MemberUsername = ? OR Email = ?;"; /*1st ; closes off sql, 2nd ; closes off php. using email or username to check if username exists already*/
    $stmt = mysqli_stmt_init($conn); /*prepared stmt-stop user from inputting code into boxes&destroy db*/
    if (!mysqli_stmt_prepare($stmt, $sql)) { /*checking if inserting is doable*/
        header("location: ../signup.php?error=stmtfailed"); 
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $username, $email); 
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }
    else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function createMember($conn, $title, $fname, $sname, $streetname, $cityname, $doornum, $postcode, $email, $username, $password) { /*signing up user*/
    $sql = "INSERT INTO Member (Title, FirstName, SurName, Street, City, Door, PostCode, Email, MemberUsername, MemberPassword) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?);"; 
    $stmt = mysqli_stmt_init($conn); 
    if (!mysqli_stmt_prepare($stmt, $sql)) { 
        header("location: ../signup.php?error=stmtfailed"); 
        exit();
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssssssssss", $title, $fname, $sname, $streetname, $cityname, $doornum, $postcode, $email, $username, $hashedPassword); 
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../signup.php?error=none"); 
    exit();
}

function emptyInputLogin($username, $password) {  /*checking if all boxes have been filled out by user in login page*/
    $result = false;
    if (empty($username) || empty($password)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function loginUser($conn, $username, $password){
    $usernameOrEmailExists = usernameOrEmailExists($conn, $username, $username); /*as they could login with either username or email, the email becomes a makeshift username*/

    if ($usernameOrEmailExists === false) {
        header("location: ../login.php?error=wronglogininfo"); 
        exit();
    }

    $passwordHashed =  $usernameOrEmailExists["MemberPassword"]; /*data from db is returned as associated array=referencing column name*/
    $checkPassword = password_verify($password, $passwordHashed); /*checking if db password fetched from line above matches what user inputted in login form*/

    if ($checkPassword === false) { /*if password from db and password entered from user in login form don't match*/
        header("location: ../login.php?error=wronglogininfo"); 
        exit();
    }
    else if ($checkPassword === true) {
        session_start();
        $_SESSION["memberid"] = $usernameOrEmailExists["MemberID"];
        $_SESSION["memberusername"] = $usernameOrEmailExists["MemberUsername"];
        header("location: ../index.php"); 
        exit();
    }
}
