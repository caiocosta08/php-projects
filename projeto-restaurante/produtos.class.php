<?php 

    class Produtos{

        public function adicionar($email, $nome = ''){
            global $pdo;

            if($this->existeEmail($email) == false){
                $sql = "INSERT INTO produtos SET nome='$nome', email='$email'";
                $sql = $pdo->prepare($sql);
                $sql->execute();
                return true;
            }else{
                return false;
            }
        }

        public function getInfo($id){
            global $pdo;
            $sql = "SELECT * FROM produtos WHERE id='$id'";
            $sql = $pdo->query($sql);
            if($sql->rowCount() > 0){
                return $sql->fetch();
            }else{
                return array();
            }
        }

        public function getAll(){
            global $pdo;
            $sql = 'SELECT * FROM produtos';
            $sql = $pdo->query($sql);
            if($sql->rowCount() > 0){
                return $sql->fetchAll();
            }else{
                return array();
            }
        }

        public function editar($nome, $id){
            global $pdo;
                $sql = "UPDATE produtos SET nome='$nome' WHERE id='$id'";
                $sql = $pdo->query($sql);
        }

        public function excluir($id){
            global $pdo;
                $sql = "DELETE FROM produtos WHERE id='$id'";
                $sql = $pdo->query($sql);
        }

        private function existeEmail($email){
            global $pdo;
            $sql = "SELECT * FROM produtos WHERE email='$email'";
            $sql = $pdo->prepare($sql);
            $sql->execute();
            if($sql->rowCount() > 0) return true;
            else return false;
        }
    }

?>