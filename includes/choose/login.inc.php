<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
</head>

<body>
    <h2>Login</h2>
    <form action="/includes/login.inc.php" method="POST">
        <input type="text" name="username" placeholder="Username" required><br><br>
        <input type="password" name="password" placeholder="Password" required><br><br>
        <button type="submit" name="Login">Login</button>
    </form>
    <p>Don't have an account? <a href="index.php?action=signup">Sign up</a></p>
</body>

</html>