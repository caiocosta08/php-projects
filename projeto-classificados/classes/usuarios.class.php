<?php 
    if(basename($_SERVER["PHP_SELF"])=='usuarios.class.php'){
        die("</script>\n<script>window.location=('index.php')</script>");
    }
    class Usuarios{

        public function isLogged(){
            if(isset($_SESSION['cLogin']) && !empty($_SESSION['cLogin'])){
                return true;
            }else{
                return false;
            }
        }
        
        public function cadastrar($nome, $email, $senha, $telefone){
            
            global $pdo;
            $senha = md5($senha);
            $sql = "SELECT * FROM usuarios WHERE email='$email'";
            $sql = $pdo->prepare($sql);
            $sql->execute();
            
            if($sql->rowCount() == 0){
                
                $sql = "INSERT INTO usuarios SET nome ='$nome', email='$email', senha='$senha', telefone='$telefone', cadastrado_em=NOW()";
                $sql = $pdo->prepare($sql);
                $sql->execute();
                
                return true;
            }else{
                return false;
            }
        }

        public function getUsuarios(){
            global $pdo;
            $sql = "SELECT * FROM usuarios";
            $sql = $pdo->query($sql);
            if($sql->rowCount() > 0){
                return $sql->fetchAll();
            }else{
                return false;
            }
        }

        public function getQtUsuarios(){
            global $pdo;
            $sql = "SELECT COUNT(*) as c FROM usuarios";
            $sql = $pdo->query($sql);
            $sql = $sql->fetch();
            return $sql['c'];
        }

        public function fazerLogin($email, $senha){
            
            global $pdo;
            $senha = md5($senha);
            $sql = "SELECT * FROM usuarios WHERE email='$email' AND senha='$senha'";
            $sql = $pdo->query($sql);
            if($sql->rowCount() > 0){
                $sql = $sql->fetch();
                $_SESSION['cLogin'] = array(
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