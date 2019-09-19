<?php 
    class homeController extends controller{
        public function __construct(){

            $u = new usuarios();

            if(!$u->isLogged()){
                header('Location: /projetos/projeto-twitter/login');
            }
        }

        public function index(){
            $dados = array();

            $this->loadTemplate('home', $dados);
        }
    }
?>