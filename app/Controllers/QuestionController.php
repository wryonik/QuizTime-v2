<?php

    namespace Controllers;
    use \Models\Question;
    session_start();
    class QuestionController
    {

        protected $twig;

        public function __construct()
        {
            $loader = new \Twig_Loader_Filesystem(__DIR__ . '/../Views') ;
            $this->twig = new \Twig_Environment($loader) ;
        }

        public function get()
        {
            // $data = Question::GetQuestion();
            // $answer_data=Question::GetOptions();
            if($_SESSION['username']!="") {
                $data = Question::Populate();
                echo $this->twig->render("header.html") ;
                echo $this->twig->render("question.html",array(
                    // "questions_data" => $data,
                    // "choices_data"=>$answer_data
                    "data" => $data
                )) ;
            }
        }

        public function post() 
        {
            $question_number = $_POST['question_number'];
            $option = preg_grep("/^option*/", array_keys($_POST));
            $answer = $_POST[$option[1]];
            Question::Validate($question_number,$answer);
            header("Location: /question");
        }
    }
?>