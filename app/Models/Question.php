<?php
    namespace Models;

    class Question {

        public static function getDB(){
            include __DIR__."/../../configs/credential.php";
            return new \PDO("mysql:dbname=".
            $db_connect['db_name'].";host=".
            $db_connect['server'] ,
            $db_connect['username'],
            $db_connect['password']);
        }

        public static function GetQuestion(){
            
            $db= self::getDB();
            
            $sql_query = $db->prepare("SELECT question_number,text from questions");
            
            $sql_query->execute();

            $question_data = $sql_query->fetchAll();
            return $question_data;
        }
        public static function GetOptions(){
            
            $db= self::getDB();
            
            $sql_query = $db->prepare("SELECT options,is_correct,question_number from choices");
            
            $sql_query->execute();

            $choice_data = $sql_query->fetchAll();
            return $choice_data;
        }

        public static function Populate() {
            $db= self::getDB();
            
            $sql_query = $db->prepare("SELECT * FROM questions JOIN choices WHERE questions.question_number=choices.question_number");
            
            $sql_query->execute();

            $data = $sql_query->fetchAll();
            return $data;
        }

        public static function Validate($question_number,$answer) {
            $db=self::getDB();
            if($_SESSION['username']!=""){
                $query = $db->prepare("SELECT * FROM questions JOIN choices WHERE questions.question_number=choices.question_number AND questions.question_number=:question_number AND is_correct=1");
                $query->execute(array(
                    "question_number" => $question_number
                ));
                $result = $query->fetchAll();
                
                if($result[0]['options']==$answer)
                {
                    $query =$db->prepare("INSERT INTO result (user,question_number,status,score) VALUES (:username,:question_number,1,result['score'])");
                    
                    
                    $query->execute(array(
                        "question_number" => $question_number,
                        "username"=>$_SESSION['username']
                    ));
                }
                else{
                    $query =$db->prepare("INSERT INTO result (user,question_number,status,score) VALUES (:username,:question_number,0,0)");
                    $query->execute(array(
                        "question_number" => $question_number,
                        "username"=>$_SESSION['username']
                    ));
                }
            }
        }

        

    }
    

?>