<?php
class Login extends Dbh
{
    protected function getUser($username, $password)
    {
        $statement = $this->connect()->prepare('SELECT password FROM users WHERE username = ? or email = ?;');

        if (!$statement->execute([$username, $password])) {
            $statement = null;
            header("Location: ../index.php?error=statementFailed");
            exit();
        }
        if ($statement->rowCount() == 0) {
            $statement = null;
            header("Location: ../index.php?error=usernotfound");
            exit();
        }

        $passwordHashed  = $statement->fetchAll(PDO::FETCH_ASSOC);
        $checkPassword = password_verify($password, $passwordHashed[0]['password']);

        if (!$checkPassword) {
            header("Location: ../index.php?error=wrongPassword");
        } elseif ($checkPassword) {
            $statement = $this->connect()->prepare('SELECT * FROM users WHERE username = ? OR email = ? AND password = ?;');
            if (!$statement->execute([$username, $username, $password])) {
                $statement = null;
                header("Location: ../index.php?error=statementFailed");
                exit();
            }
            if ($statement->rowCount() == 0) {
                $statement = null;
                header("Location: ../index.php?error=usernotfound");
                exit();
            }
            $user = $statement->fetchAll(PDO::FETCH_ASSOC);
            session_start();
            $_SESSION['userid'] = $user[0]["users_id"];
            $_SESSION['username'] = $user[0]["username"];
            $statement = null;
        }
    }
}
