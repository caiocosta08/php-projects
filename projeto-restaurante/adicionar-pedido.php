<?php require 'assets/components/header.php'; ?>
<?php 
    require 'pedidos.class.php';
    require 'produtos.class.php';
    $pedidos = new Pedidos();
    $produtos = new Produtos();

    if(isset($_POST['id_pedido']) && !empty($_POST['id_pedido'])){
        //PEGA O ID DO PEDIDO ENVIADO AO ADICIONAR UM PRODUTO AO PEDIDO(SUBMETER O FORMULÁRIO)
        $id_pedido = addslashes($_POST['id_pedido']);
        $id_produto = addslashes($_POST['id_produto']);
        $quantidade = addslashes($_POST['quantidade']);
        
        $p = $pedidos->adicionarProdutoAoPedido($id_pedido, $id_produto, $quantidade);
    }else if(isset($_GET['id_pedido']) && !empty($_GET['id_pedido'])){
        //PEGA O ID ENVIADO PELO MÉTODO GET PARA ADICIONAR PRODUTO A UM PEDIDO EXISTENTE
        $id_pedido = addslashes($_GET['id_pedido']);
        $p = false;
    }else{
        //INSERE UM NOVO PEDIDO E PEGA UM NOVO ID PARA ELE
        $id_pedido = $pedidos->adicionarPedido();
        $p = false;
    }
    $lista = $produtos->getAll();

    
?>
    <div class="container">
        <div class="row justify-content-center">
            <h1>Adicionar produto ao pedido - ID: <?php echo $id_pedido; ?></h1><br>
            
        </div>
        <?php if($p){ ?>
                <br><div class="alert alert-success" role="alert">Produto adicionado com sucesso ao pedido!</div>
            <?php }else {}?>
        <div class="row justify-content-center">

            <div class="col-6">
                <form method="POST">
                    <div class="form-group">
                        <label for="produtos" style="color: #495057;">Produtos:</label>
                        <?php 
                            if($lista){
                        ?><select class="form-control" name="id_produto" id="produtos">
                        <?php
                            foreach ($lista as $produto) {
                                ?>
                                <option value="<?php echo $produto['id'];?>"><?php echo $produto['nome'].' - R$'.$produto['valor']; ?>
                                </option>
                                <?php
                                }
                        ?></select>
                        <?php
                            }else{
                                ?>
                                <div class="alert alert-warning" role="alert">Nenhum produto cadastrado</div>
                                <?php
                            }
                        ?>                
                    </div>
                    <div class="form-group">
                        <label style="color: #495057;">Quantidade:</label>
                        <input class="form-control" type="number" name="quantidade" value="1">
                    </div>
                    <div class="form-group">
                        <label style="color: #495057;">Observação:</label>
                        <input class="form-control" type="text" name="observacao" placeholder="Observação">
                    </div>
                    <?php if($id_pedido){?><input type="hidden" name="id_pedido" value="<?php echo $id_pedido; ?>"> <?php } ?>
                    <input id="btnAddProdutoPedido" class="btn btn-primary" type="submit" value="Adicionar">
                </form>
            </div>
        </div>
    </div>
    
<?php require 'assets/components/footer.php'; ?>