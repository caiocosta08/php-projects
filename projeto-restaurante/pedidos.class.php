<?php 

    class Pedidos{

        public function adicionarPedido(){
            global $pdo;
            $status = 'aberto';
            $operador = 'Caio';
            $valor = 0;
            $sql = "INSERT INTO pedidos SET data = NOW(), status='$status', operador='$operador', valor='$valor'";
            $sql = $pdo->query($sql);
            $id_pedido = $pdo->lastInsertId();
            return $id_pedido;
        }

        public function adicionarProdutoAoPedido($id_pedido, $id_produto, $quantidade){
            global $pdo;

            $sql = "SELECT valor FROM produtos WHERE id='$id_produto'";
            $sql = $pdo->query($sql);
            if($sql->rowCount() > 0){
                $valor_produto = $sql->fetch();
            }else{
                return false;
                exit;
            }
            $valor_produto = ($valor_produto['valor']) * ($quantidade);

            $sql = "INSERT INTO conteudo_pedido 
            SET id_pedido='$id_pedido'
            , id_produto='$id_produto'
            , quantidade='$quantidade'
            , valor_item='$valor_produto'";
            $sql = $pdo->query($sql);
            if($sql){
                $sql = "UPDATE pedidos SET valor = valor + '$valor_produto' WHERE id='$id_pedido'";
                $sql = $pdo->query($sql);
            }
            return $sql;
        }

        public function getInfo($id){
            global $pdo;
            $sql = "SELECT * FROM pedidos WHERE id='$id'";
            $sql = $pdo->query($sql);
            if($sql->rowCount() > 0){
                return $sql->fetch();
            }else{
                return array();
            }
        }

        private function salvarPedidos($pedidos){
            $string = $pedidos;
            $fp = fopen('json/pedidos.json', 'w');
            fwrite($fp, json_encode($string));
            fclose($fp);
            return true;
        }
      
        public function getPedido($id){
            global $pdo;
            $sql = "SELECT *, 
            (select produtos.nome from produtos where produtos.id=conteudo_pedido.id_produto) 
            as nome_produto,
            (select produtos.valor from produtos where produtos.id=conteudo_pedido.id_produto) 
            as valor_produto 
            FROM conteudo_pedido WHERE id_pedido='$id'";
            $sql = $pdo->query($sql);
            if($sql->rowCount() > 0){
                return $sql->fetchAll();
            }else{
                return array();
            }
        }

        public function getAll(){
            global $pdo;
            $sql = 'SELECT * FROM pedidos ORDER BY id DESC';
            $sql = $pdo->query($sql);
            if($sql->rowCount() > 0){
                return $sql->fetchAll();
            }else{
                return array();
            }
        }

        public function finalizarPedido($id_pedido){
            global $pdo;
            $sql = "UPDATE pedidos SET status='finalizado' WHERE id='$id_pedido'";
            $sql = $pdo->query($sql);
            return $sql;
        }

        public function editar($nome, $id){
            global $pdo;
            $sql = "UPDATE pedidos SET nome='$nome' WHERE id='$id'";
            $sql = $pdo->query($sql);
            return $sql;
        }

        public function excluir($id){
            global $pdo;
            $sql = "DELETE FROM pedidos WHERE id='$id'";
            $sql = $pdo->query($sql);
            $sql = "DELETE FROM conteudo_pedido WHERE id_pedido='$id'";
            $sql = $pdo->query($sql);
            return $sql;
        }

        public function excluirProdutoPedido($id){
            global $pdo;
            $sql = "DELETE FROM conteudo_pedido WHERE id='$id'";
            $sql = $pdo->query($sql);
            return $sql;
        }
    }

?>