<?php
    namespace Models;

    class AddQuestion {

        public static function getDB(){
            include __DIR__."/../../configs/credential.php";
            return new \PDO("mysql:dbname=".
            $db_connect['db_name'].";host=".
            $db_connect['server'] ,
            $db_connect['username'],
            $db_connect['password']);
        }

        public static function AddQuestion($question_number,$question_text,$points) {
            $db = self::getDB();
            $user = $db->prepare("INSERT INTO questions (question_number,text, points) VALUES(:question_number, :text, :points)");
            
            $user->execute(array(
                "text" => $question_text,
                "points" => $points,
                "question_number" =>$question_number
            ));
        }

        public static function AddOptions($question_number,$correct_option,$options) {
            $db = self::getDB();
            $q = 'INSERT INTO choices (question_number, is_correct, options) VALUES (:q, :i, :o)';
            foreach ($options as $option=>$val) {
                if($val!='') {
                    $is_correct = 0;
                    if($correct_option==$option){
                        $is_correct=1;
                    }
                    $query = $db->prepare($q);
                    $query->execute(array(
                        "q"=>$question_number,
                        "i"=>$is_correct,
                        "o"=>$val,
                    ));
                } else {
                    die("enter something");
                }
            }
        }
    }
