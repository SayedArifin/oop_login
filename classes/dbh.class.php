<?php
class Dbh
{
    protected function connect()
    {
        try {
            $username = 'sayed';
            $password = '123456';
            $dbh = new PDO('mysql:host=localhost;dbname=oop_login_system', $username, $password);
            echo "You are connected with database";
            return $dbh;
        } catch (PDOException $e) {
            print "Error!" . $e->getMessage() . "<br>";
            die();
        }
    }
}
