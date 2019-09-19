<?php 
    if(basename($_SERVER["PHP_SELF"])=='categorias.class.php'){
        die("</script>\n<script>window.location=('index.php')</script>");
    }
    class Categorias{
        
        public function adicionarCategoria($nome){
            global $pdo;
            $sql = "INSERT INTO categorias SET nome='$nome'";
            $sql = $pdo->prepare($sql);
            $sql = $sql->execute();
            return $sql;
        }

        public function getCategorias(){
            global $pdo;
            $sql = "SELECT * FROM categorias";
            $sql = $pdo->query($sql);
            if($sql->rowCount() > 0){
                return $sql->fetchAll();
            }else{
                return false;
            }
        }
    }
?>