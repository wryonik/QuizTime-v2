<?php
    namespace Models;
    class Leaderboard {

        public static function getDB(){
            include __DIR__."/../../configs/credential.php";
            return new \PDO("mysql:dbname=".
            $db_connect['db_name'].";host=".
            $db_connect['server'] ,
            $db_connect['username'],
            $db_connect['password']);
        }

        public static function GetLeaderboard(){
            
            $db= self::getDB();
            
            $user = $db->prepare("SELECT user,score from user ORDER BY score DESC");
            
            $user->execute();

            $row = $user->fetchAll();
            return $row;
        }
    }
?>