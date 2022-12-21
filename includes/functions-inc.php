<?php 

function emptyInputSignup($title, $fname, $sname, $streetname, $cityname, $doornum, $postcode, $email, $username, $password, $passwordrepeat) {  /*checking if boxes filled out by user*/
    $result;
    if (empty($title) || empty($fname) || empty($sname) || empty($streetname) || empty($cityname) || empty($doornum) || empty($postcode) || empty($email) ||empty($username) || empty($password) || empty($passwordrepeat)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result
}

function invalidUsername($username) { /*checking if username is valid*/
    $result;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {  
        $result = true;
    }
    else {
        $result = false;
    }
    return $result
}

function invalidEmail($email) {
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { /*checking if email is valid*/ 
        $result = true;
    }
    else {
        $result = false;
    }
    return $result
}

function pwdMatch($password, $passwordrepeat) {
    $result;
    if ($password !== $passwordrepeat) { /*checking if passwords match*/ 
        $result = true;
    }
    else {
        $result = false;
    }
    return $result
}

function usernameemailExists($conn, $username, $email) { /*check if username & email already exists in db*/
    $sql = "SELECT * FROM Member WHERE MemberUsername = ? OR Email = ?;"; /*1st ; closes off sql, 2nd ; closes off php*/
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
        return $resutl;
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