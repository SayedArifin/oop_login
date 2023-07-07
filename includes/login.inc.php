<?php

if (isset($_POST['Login'])) {
    $username = $_POST['username'];

    $password = $_POST['password'];



    include "../classes/dbh.class.php";
    include "../classes/login.class.php";
    include "../classes/loginContr.class.php";

    $login = new LoginContr($username, $password);



    //running error handlers and user signup
    $login->LoginUser();

    //going back to front page
    header('Location:../index.php?error=none');
}
