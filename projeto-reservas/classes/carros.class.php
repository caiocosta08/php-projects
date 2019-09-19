<?php 
    class Carros{
        private $pdo;

        public function __construct($p){
            $this->pdo = $p;
        }

        public function getCarros(){
            $array = array();
            
            $sql = "SELECT * FROM carros";
            $sql = $this->pdo->query($sql);
            if($sql->rowCount() > 0){
                $array = $sql->fetchAll();
            }
            return $array;
        }
    }
?>