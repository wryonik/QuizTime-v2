<?php

    namespace Controllers;
    class LogoutController
    {
        protected $twig ;

        public function __construct()
        {
            $loader = new \Twig_Loader_Filesystem(__DIR__ . '/../Views') ;
            $this->twig = new \Twig_Environment($loader) ;
        }
        public function get(){
            
            header("Location /login");
        }
    }
?>