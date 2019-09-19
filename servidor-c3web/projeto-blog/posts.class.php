<?php 
    class Posts{
        
        public function __construct(){
            }

        public function adicionarPost($titulo, $descricao, $corpo, $autor){
            global $pdo;
            $sql = "INSERT INTO posts SET titulo='$titulo', descricao='$descricao', corpo='$corpo', autor='$autor', data=NOW()";
            $sql = $pdo->prepare($sql);
            $sql = $sql->execute();
            return $sql;
        }

        public function getInfo($id){
            global $pdo;
            $sql = "SELECT * FROM posts WHERE id='$id'";
            $sql = $pdo->query($sql);
            if($sql->rowCount() > 0){
                return $sql->fetch();
            }else{
                return array();
            }
        }

        public function getAll(){
            global $pdo;
            $sql = 'SELECT * FROM posts';
            $sql = $pdo->query($sql);
            if($sql->rowCount() > 0){
                return $sql->fetchAll();
            }else{
                return array();
            }
        }

        public function editar($nome, $id){
            global $pdo;
            $sql = "UPDATE posts SET nome='$nome' WHERE id='$id'";
                $sql = $pdo->query($sql);
                return $sql;
        }

        public function excluir($id){
            global $pdo;
                $sql = "DELETE FROM posts WHERE id='$id'";
                $sql = $pdo->query($sql);
        }

        private function existeEmail($email){
            global $pdo;
            $sql = "SELECT * FROM posts WHERE email='$email'";
            $sql = $pdo->prepare($sql);
            $sql->execute();
            if($sql->rowCount() > 0) return true;
            else return false;
        }
    }

?>