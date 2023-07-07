<?php
include './includes/autoLoader.inc.php';
if (isset($_GET['action']) && $_GET['action'] == 'signup') {
    include './includes/choose/signup.inc.php';
} else {
    include './includes/choose/login.inc.php';
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <fieldset>
        <legend>Information</legend>

        <h1><?php
            session_start();

            if (isset($_SESSION['userid'])) {
                echo $_SESSION["username"] . " just logged in";
                echo '<br><a href="./includes/logout.inc.php">logout</a>';
            } else {
                echo "You are not logged in";
            }
            ?></h1>
    </fieldset>

</body>

</html>