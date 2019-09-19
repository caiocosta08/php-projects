<?php 

    class Usuarios{

        private $db;

        public function __construct()
        {
            try{
               $dsn = 'mysql:dbname=projeto_pdo;host=localhost';
                $dbuser = 'root';
                $dbpass = '';
                $this->db = new PDO($dsn, $dbuser, $dbpass);
            }catch(PDOException $e){
                echo 'Erro: '.$e->getMessage();
            }

        }

        public function selecionar($id){
            
            $sql = $this->db->prepare("SELECT * FROM usuarios WHERE id = :id");
            $sql->bindValue(':id', $id);
            $sql->execute();

            $array = array();
            if($sql->rowCount() > 0){
                $array = $sql->fetch();
            }else{
                echo 'Nenhum usuário encontrado.';
            }
            return $array;
        }

        public function inserir($nome, $email, $senha){
            $sql = $this->db->prepare("INSERT INTO usuarios SET nome=:nome, email=:email, senha=:senha");
            $sql->bindParam(':nome', $nome);
            $sql->bindParam(':email', $email);
            $sql->bindValue(':senha', md5($senha));
            $sql->execute();
        }

        public function atualizar($nome, $email, $senha, $id){
            $sql = $this->db->prepare("UPDATE usuarios SET nome=?, email=?, senha=? WHERE id=?");
            $sql->execute(array($nome, $email, md5($senha), $id));
        }


    }

?>