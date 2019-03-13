<?php
    namespace Models;
    session_start();
    class Login {

        public static function getDB(){
            include __DIR__."/../../configs/credential.php";
            return new \PDO("mysql:dbname=".
            $db_connect['db_name'].";host=".
            $db_connect['server'] ,
            $db_connect['username'],
            $db_connect['password']);
        }

        public static function ValidateUser($username,$password){
            
            $db= self::getDB();
            $_SESSION['username']=$username;
            $_SESSION['password']=$password;
            
            
            $user = $db->prepare("SELECT * from user where user=:username and pass=:password");
            
            $user->execute(array(
                
                "username" => $username,
                "password" => $password
            ));

            $row = $user->fetch(\PDO::FETCH_ASSOC);

            if($row) return true;
            else return false;
        }
    }