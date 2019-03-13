<?php

    namespace Controllers;
    use \Models\Login;

    class HomeController
    {

        protected $twig;

        public function __construct()
        {
            $loader = new \Twig_Loader_Filesystem(__DIR__ . '/../Views') ;
            $this->twig = new \Twig_Environment($loader) ;
        }

        public function get()
        {
            echo $this->twig->render("home.html", array(
                "title" => "Login")) ;
        }

        public function post() {
            $username = $_POST['username'];
            $password = $_POST['password'];
            if(Login::ValidateUser($username,$password)) {
                $_SESSION['username']= $username;
                header("Location: /menu");
            }
            else {
                echo $this->twig->render("home.html");
                echo "try again";
            }
        }
    }
?>