<?php

    namespace Controllers;
    use \Models\Menu;

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
                echo $this->twig->render("menu.html");
        }
    }
?>