<!DOCTYPE html>
<html>

<head>
    <title>Signup</title>
</head>

<body>
    <h2>Signup</h2>
    <form action="/includes/signup.inc.php" method="POST">

        <input type="text" name="username" placeholder="Username" required><br><br>
        <input type="email" name="email" placeholder="Email" required><br><br>
        <input type="password" name="password" placeholder="Password" required><br><br>
        <input type="password" name="passwordRepeat" placeholder="Repeat Password" required><br><br>
        <button type="submit" name="Signup">Sign Up</button>
    </form>
    <p>Already have an account? <a href="index.php">Login</a></p>
</body>

</html>