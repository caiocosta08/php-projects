<?php 

    class Usuarios{

        public function adicionar($email, $nome = ''){
            global $pdo;
            //1-Verificar se o e-mail já existe
            //2-Adicionar

            if($this->existeEmail($email) == false){
                $sql = "INSERT INTO usuarios SET nome='$nome', email='$email'";
                $sql = $pdo->prepare($sql);
                $sql = $sql->execute();
                if($sql){
                    $sql = $sql->fetch();
                    $_SESSION['blogCaioCosta'] = array(
                        'id' => $sql['id'],
                        'nome' => $sql['nome'],
                        'email' => $sql['email']
                    );
                    return true;
                }else{
                    return false;
                }
            }
        }

        public function adicionarUsuario($email, $nome, $senha){
            global $pdo;

            if($this->existeEmail($email) == false){
                $sql = "INSERT INTO usuarios SET nome='$nome', email='$email', senha='$senha'";
                $sql = $pdo->prepare($sql);
                $sql = $sql->execute();
                return $sql;
            }else{
                return false;
            }
        }

        public function getInfo($id){
            global $pdo;
            $sql = "SELECT * FROM usuarios WHERE id='$id'";
            $sql = $pdo->query($sql);
            if($sql->rowCount() > 0){
                return $sql->fetch();
            }else{
                return array();
            }
        }

        public function getAll(){
            global $pdo;
            $sql = 'SELECT * FROM usuarios';
            $sql = $pdo->query($sql);
            if($sql->rowCount() > 0){
                return $sql->fetchAll();
            }else{
                return array();
            }
        }

        public function editar($nome, $id){
            global $pdo;
                $sql = "UPDATE usuarios SET nome='$nome' WHERE id='$id'";
                $sql = $pdo->query($sql);
                return $sql;
        }

        public function excluir($id){
            global $pdo;
                $sql = "DELETE FROM usuarios WHERE id='$id'";
                $sql = $pdo->query($sql);
        }

        private function existeEmail($email){
            global $pdo;
            $sql = "SELECT * FROM usuarios WHERE email='$email'";
            $sql = $pdo->prepare($sql);
            $sql->execute();
            if($sql->rowCount() > 0) return true;
            else return false;
        }
        public function fazerLogin($email, $senha){
            global $pdo;
            $sql = "SELECT * FROM usuarios WHERE email='$email' AND senha='$senha'";
            $sql = $pdo->query($sql);
            if($sql->rowCount() > 0){
                $sql = $sql->fetch();
                $_SESSION['blogCaioCosta'] = array(
                    'id' => $sql['id'],
                    'nome' => $sql['nome'],
                    'email' => $sql['email']
                );
                return true;
            }else{
                return false;
            }
        }
    }

?>