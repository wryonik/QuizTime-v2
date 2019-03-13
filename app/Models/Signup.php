<?php
    namespace Models;

    class Signup {

        public static function getDB(){
            include __DIR__."/../../configs/credential.php";
            return new \PDO("mysql:dbname=".
            $db_connect['db_name'].";host=".
            $db_connect['server'] ,
            $db_connect['username'],
            $db_connect['password']);
        }

        public static function AddUser($username,$password) {
            $db = self::getDB();
            $password_hash = hash('sha256',$password);
            $user = $db->prepare("INSERT into user (user,pass) VALUES (:username, :password)");
            
            $user->execute(array(
                "username" => $username,
                "password" => $password_hash

            ));
        }
    }
    

?>