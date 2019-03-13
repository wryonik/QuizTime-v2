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
            $password_hash = hash('sha256',$password);
            $_SESSION['username']=$username;
            $_SESSION['password']=$password_hash;
            $user = $db->prepare("SELECT * from user where user=:username and pass=:password");
            
            $user->execute(array(
                
                "username" => $username,
                "password" => $password_hash
            ));

            $row = $user->fetch(\PDO::FETCH_ASSOC);

            if($row) return true;
            else return false;
        }
    }