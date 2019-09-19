<?php require 'assets/components/header.php'; ?>
<?php 
    require 'pedidos.class.php';
    $pedidos = new Pedidos();

    if(isset($_GET['statusPedido']) && !empty($_GET['statusPedido'])){
        $statusPedido = addslashes($_GET['statusPedido']);
    }else{
        $statusPedido = false;
    }
?>
<div class="container">
    <div class="row justify-content-center">
        <h1>Pedidos</h1>
    </div>
    <?php if($statusPedido){?>
    <br><div class="alert alert-success" role="alert">Pedido <?php echo $statusPedido; ?> com sucesso!</div>
    <?php }else{}?>    
    <a class="btn btn-success" href="adicionar-pedido.php">Novo Pedido <i class="fas fa-plus"></i></a><br><br>
    <div class="row justify-content-center">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Pedido</th>
                    <th scope="col">Data</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Operador</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $lista = $pedidos->getAll();
                    if($lista){
                    foreach($lista as $item){
                        if($item['status'] == 'aberto'){
                    ?>
                        <tr class="click-row" data-href="pedido.php?id=<?php echo $item['id']; ?>">
                        <td><?php echo $item['id']; ?></td>
                        <td><?php echo $item['data']; ?></td>
                        <td>R$<?php echo $item['valor']; ?></td>
                        <td><?php echo $item['operador']; ?></td>
                        <td>
                            <a class="btn btn-warning" href="editar.php?id=<?php echo $item['id']; ?>"><i class="fas fa-pen"></i></a>
                            <a class="btn btn-danger" href="excluir-pedido.php?id=<?php echo $item['id']; ?>"><i class="fas fa-times"></i></a></td>
                        </tr>
                    <?php
                        }else{}
                    }}else{
                        ?>
                        <br><div class="alert alert-warning" role="alert">Adicione um novo pedido</div>
                        <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>    

<?php require 'assets/components/footer.php'; ?>
