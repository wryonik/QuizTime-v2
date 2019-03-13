<?php

    namespace Controllers;
    class MenuController
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
                echo $this->twig->render("header.html");
                echo $this->twig->render("menu.html");
            }
        }
    }
?>