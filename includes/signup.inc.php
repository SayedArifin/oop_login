<?php

if (isset($_POST['Signup'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordConfirm = $_POST['passwordRepeat'];

    //instatiating SignupContr class
    // include '../includes/autoLoader.inc.php';
    include "../classes/dbh.class.php";
    include "../classes/signup.class.php";
    include "../classes/signupContr.class.php";

    $signup = new SignupContr($username, $password, $passwordConfirm, $email);



    //running error handlers and user signup
    $signup->SignupUser();

    //going back to front page
    header('Location:../index.php?error=none');
}
