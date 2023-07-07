<?php
class Signup extends Dbh
{
    protected function setUser($username, $password, $email)
    {
        $statement = $this->connect()->prepare('INSERT INTO `users` (`users_id`, `username`, `password`, `email`) VALUES (NULL, ?, ?, ?);');

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        if (!$statement->execute([$username, $hashedPassword, $email])) {
            $statement = null;
            header("Location: ../index.php?error=statementFailed");
            exit();
        }
        $statement = null;
    }
    protected function checkUser($username, $email)
    {
        $statement = $this->connect()->prepare('SELECT username FROM users WHERE username = ? or email = ?;');
        if (!$statement->execute([$username, $email])) {
            $statement = null;
            header("Location: ../index.php?error=statementFailed");
            exit();
        }
        if ($statement->rowCount() > 0) {
            $resultCheck = false;
        } else {
            $resultCheck = true;
        }
        return $resultCheck;
    }
}
