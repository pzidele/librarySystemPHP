<?php

// did the user get to this page the proper way - by submitting the submit button
if (isset($_POST["submit"])) { // if this is set inside the code
    echo "It works!";
    $name = $_POST["name"];
    $email = $_POST["email"];
    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $pwdrepeat = $_POST["pwdrepeat"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    // error handlers
    // if any inputs are empty
    if (emptyInputSignup($name, $email, $username, $pwd, $pwdrepeat) !== false) { // anyhthing besides false
        // send back to signup
        header("Location: ../signup.php?error=emptyinput"); // send back with error
        exit();
    }
    if (invalidUid($username) !== false) {
        header("Location: ../signup.php?error=invaliduid");
        exit();
    }
    if (invalidEmail($email) !== false) {
        header("Location: ../signup.php?error=invalidemail");
        exit();
    }
    if (pwdMatch($pwd, $pwdrepeat) !== false) {
        header("Location: ../signup.php?error=passwordsdontmatch");
        exit();
    }
    if (uidExists($conn, $username, $email) !== false) {
        header("Location: ../signup.php?error=usernametaken");
        exit();
    }

    // no mistakes, sign up user
    createUser($conn, $name, $email, $username, $pwd);
} else {
    echo "not submitted";
    header("Location: ../signup.php");
    exit();
}