<?php require 'assets/components/header.php'; ?>
<?php 

    if(isset($_GET['id']) && !empty($_GET['id'])){
        $id = addslashes($_GET['id']);
    }else{
        header('Location: index.php');
    }

    require 'pedidos.class.php';
    $pedidos = new Pedidos();
?>
<div class="container">
    <div class="row justify-content-center">
        <h1>Pedido <div id="idPedido"><?php echo $id; ?></div></h1>
    </div>
    <div class="row justify-content-center">
        <div class="col-3">
        <a class="btn btn-success" href="adicionar-pedido.php?id_pedido=<?php echo $id; ?>">Adicionar Produto <i class="fas fa-plus"></i></a><br><br>
        </div>
        <div class="col-7"></div>
        <div class="col-2">
        <a class="btn btn-success" id="finalizarPedido">Finalizar Pedido <i class="fas fa-check"></i></a><br><br>
        </div>
    </div>
    <div class="row justify-content-center">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Qtd</th>
                    <th scope="col">Obs</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $lista = $pedidos->getPedido($id);
                    if($lista){
                        $valor_total = 0;
                    foreach($lista as $item){
                        $valor_produto = floatval($item['valor_produto']);
                        $quantidade = floatval($item['quantidade']);
                        $valor_total = $valor_total + ($valor_produto * $quantidade);
                    ?>
                    <tr>
                        <td><?php echo $item['nome_produto']; ?></td>
                        <td><?php echo $item['quantidade']; ?></td>
                        <td><?php echo $item['observacao']; ?></td>
                        <td><?php echo $item['valor_item']; ?></td>
                        <td>
                            <a class="btn btn-warning" href='editar-produto-pedido.php?id=<?php echo $item['id']; ?>'><i class="fas fa-pen"></i></a>
                            <a class="btn btn-danger" href="excluir-produto-pedido.php?id=<?php echo $item['id']; ?>"><i class="fas fa-times"></i></a>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>                    
                    <h6 id="valorTotal"><?php echo 'Valor Total - R$'.$valor_total; ?></h6>
                    <?php
                }else{
                    ?>
                    <br><div class="alert alert-warning" role="alert">Adicione um item ao pedido</div>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>    

<?php require 'assets/components/footer.php'; ?>
