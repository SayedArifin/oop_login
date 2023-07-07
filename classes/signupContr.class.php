<?php

class SignupContr extends Signup
{
    private $username;
    private $password;
    private $passwordRepeat;
    private $email;

    public function __construct($username, $password, $passwordRepeat, $email)
    {
        $this->username = $username;
        $this->password = $password;
        $this->passwordRepeat = $passwordRepeat;
        $this->email = $email;
    }

    public function SignupUser()
    {
        if (!$this->emptyInput()) {
            //echo "";
            header("Location: ../index.php?error=emptyInput");
            exit();
        }
        if (!$this->invalidUsername()) {
            //echo "";
            header("Location: ../index.php?error=invalidUsername");
            exit();
        }
        if (!$this->invalidEmail()) {
            //echo "";
            header("Location: ../index.php?error=invalidEmail");
            exit();
        }
        if (!$this->passwordMatch()) {
            //echo "";
            header("Location: ../index.php?error=passwordMatch");
            exit();
        }
        if (!$this->usernameTakenCheck()) {
            //echo "";
            header("Location: ../index.php?error=usernameTakenCheck");
            exit();
        }
        if (!$this->strongPassword()) {
            //echo "";
            header("Location: ../index.php?error=strongPassword");
            exit();
        }

        $this->setUser($this->username, $this->password, $this->email);
    }

    private function emptyInput()
    {

        if (empty($this->username) || empty($this->password) || empty($this->passwordRepeat) || empty($this->email)) {
            $result = false;
        } else {
            $result = true;
        }

        return $result;
    }

    private function invalidUsername()
    {
        if (!preg_match('/^[a-zA-Z][0-9a-zA-Z]{5,19}$/', $this->username)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
    private function invalidEmail()
    {
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function strongPassword()
    {
        if (!preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[^\w\d\s:])([^\s]){8,}$/', $this->password)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function passwordMatch()
    {
        if ($this->password !== $this->passwordRepeat) {
            $result = false;
        } else {
            $result = true;
        }

        return $result;
    }
    private function usernameTakenCheck()
    {
        if (!$this->checkUser($this->username, $this->email)) {
            $result = false;
        } else {
            $result = true;
        }

        return $result;
    }
}
