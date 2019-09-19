<?php 

    class Calculadora{

        private $n;

        public function __construct($numeroInicial)
        {
            $this->n = $numeroInicial;
        }

        public function somar($n1, $n2){
            return $n1 + $n2;
        }
        
        public function subtrair($n1, $n2){
            return $n1-$n2;
        }
        
        public function multiplicar($n1, $n2){
            return $n1*$n2;
        }
        
        public function dividir($n1, $n2){
            return $n1/$n2;
        }

    }

    $calculadora = new Calculadora(10);
    echo '2 + 10 = '.$calculadora->somar(2,10);

?>