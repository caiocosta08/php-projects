<?php 

    class Usuario{
        private $id;
        private $nome;
        private $email;
        private $senha;
        private $pdo;
    
        public function __construct($i=''){
            try {
                $dsn = 'mysql:dbname=projeto_nb;host=localhost';
                $dbuser = 'root';
                $dbpass = '';
                $this->pdo = new PDO($dsn, $dbuser, $dbpass);
            } catch (PDOException $e) {
                echo 'Erro: '.$e->getMessage();
            }
            if(!empty($i)){
                
                $sql = 'SELECT * FROM usuarios WHERE id=?';
                $sql = $this->pdo->prepare($sql);
                $sql->execute(array($i));

                if($sql->rowCount() > 0){
                    $data = $sql->fetch();
                    $this->id = $data['id'];
                    $this->nome = $data['nome'];
                    $this->email = $data['email'];
                    $this->senha = $data['senha'];
                }

            }
        }

        public function getId(){
            return $this->id;
        }
        public function setNome($n){
            $this->nome = $n;
        }
        public function getNome(){
            return $this->nome;
        }
        public function setEmail($e){
            $this->email = $e;
        }
        public function getEmail(){
            return $this->email;
        }
        public function setSenha($s){
            $this->senha = md5($s);
        }

        public function salvar(){
            if(!empty($this->id)){
                $sql = 'UPDATE usuarios SET nome=?, email=?, senha=? WHERE id=?';
                $sql = $this->pdo->prepare($sql);
                $sql->execute(array($this->nome, $this->email, $this->senha, $this->id));
            }else{
                $sql = 'INSERT INTO usuarios SET nome=?, email=?, senha=?';
                $sql = $this->pdo->prepare($sql);
                $sql->execute(array($this->nome, $this->email, $this->senha));
            }
        }

        public function excluir($i){
            $sql = 'DELETE FROM usuarios WHERE id=?';
            $sql = $this->pdo->prepare($sql);
            $sql->execute(array($i));

        }
    }

?>