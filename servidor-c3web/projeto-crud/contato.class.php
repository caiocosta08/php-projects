<?php 

    class Contato{
        
        private $pdo;

        public function __construct(){
            $dsn = 'mysql:dbname=c3webc33_usuarios;host=br548.hostgator.com.br';
            $dbuser = 'c3webc33_admin';
            $dbpass = 'caue3101';
            $this->pdo = new PDO($dsn, $dbuser, $dbpass);
        }

        public function adicionar($email, $nome = ''){
            //1-Verificar se o e-mail já existe
            //2-Adicionar

            if($this->existeEmail($email) == false){
                $sql = "INSERT INTO contatos SET nome='$nome', email='$email'";
                $sql = $this->pdo->prepare($sql);
                $sql->execute();
                return true;
            }else{
                return false;
            }
        }

        public function adicionarContato($email, $nome = ''){
            //1-Verificar se o e-mail já existe
            //2-Adicionar

            if($this->existeEmail($email) == false){
                $sql = "INSERT INTO contatos SET nome='$nome', email='$email'";
                $sql = $this->pdo->prepare($sql);
                $sql->execute();
                return 'Nome: '.$nome.' - E-mail: '.$email;
            }else{
                return false;
            }
        }

        public function getInfo($id){
            $sql = "SELECT * FROM contatos WHERE id='$id'";
            $sql = $this->pdo->query($sql);
            if($sql->rowCount() > 0){
                return $sql->fetch();
            }else{
                return array();
            }
        }

        public function getAll(){
            $sql = 'SELECT * FROM contatos';
            $sql = $this->pdo->query($sql);
            if($sql->rowCount() > 0){
                return $sql->fetchAll();
            }else{
                return array();
            }
        }

        public function editar($nome, $id){
                $sql = "UPDATE contatos SET nome='$nome' WHERE id='$id'";
                $sql = $this->pdo->query($sql);
                return $sql;
        }

        public function excluir($id){
                $sql = "DELETE FROM contatos WHERE id='$id'";
                $sql = $this->pdo->query($sql);
        }

        private function existeEmail($email){
            $sql = "SELECT * FROM contatos WHERE email='$email'";
            $sql = $this->pdo->prepare($sql);
            $sql->execute();
            if($sql->rowCount() > 0) return true;
            else return false;
        }
    }

?>