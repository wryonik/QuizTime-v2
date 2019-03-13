<?php

    namespace Controllers;
    use \Models\Leaderboard;
    session_start();
    class LeaderboardController
    {

        protected $twig;

        public function __construct()
        {
            $loader = new \Twig_Loader_Filesystem(__DIR__ . '/../Views') ;
            $this->twig = new \Twig_Environment($loader) ;
        }

        public function get()
        {
            if($_SESSION['username']!="") {
                $data = Leaderboard::GetLeaderboard();    
                echo $this->twig->render("header.html") ;
                echo $this->twig->render("leaderboard.html",array(
                    "arr" => $data,
                ));
            }
        }

    }
?>