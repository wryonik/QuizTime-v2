<?php

    namespace Controllers;
    use \Models\Leaderboard;

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
                $data = Leaderboard::GetLeaderboard();    

                echo $this->twig->render("leaderboard.html",array(
                    "arr" => $data,
                ));
        }

    }
?>