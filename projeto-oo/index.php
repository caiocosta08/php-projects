<?php 

    class Post{
        private $titulo;
        private $data;
        private $corpo;
        private $comentarios;
        private $qtComentarios;

        public function __construct($t, $c){
            $this->setTitulo($t);
            $this->setCorpo($c);
        }

        public function getTitulo(){
            return $this->titulo;
        }
        public function setTitulo($t){
            $this->titulo = $t;
        }
        public function getCorpo(){
            return $this->corpo;
        }
        public function setCorpo($c){
            $this->corpo = $c;
        }
        public function addComentario($msg){
            $this->comentarios[] = $msg;
            $this->contarComentarios();
        }
        public function getQtComentarios(){
            return $this->qtComentarios;
        }
        public function contarComentarios(){
            $this->qtComentarios = count($this->comentarios);
        }

    }

    $post = new Post('Título do Post','Corpo do Post dsfk djsk fjsdklf jdsklf jdsk fjds kfjd k.');
    echo '<h3>'.$post->getTitulo().'</h3><p>'.$post->getCorpo().'</p>';
    $post->addComentario('Teste');
    $post->addComentario('Teste 2');
    $post->addComentario('Teste 3');
    echo "Número de comentários: ".$post->getQtComentarios();
?>