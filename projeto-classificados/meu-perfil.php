<!-- Importa navbar-->
<?php require 'assets/components/navbar.php'; ?>
<?php 
    if(!isset($_SESSION['cLogin']) || empty($_SESSION['cLogin'])){
        header('Location: index.php');
        exit;
    }
?>
<div class="container-fluid">
    <div class="jumbotron">
        <h2>Olá, <?php echo $_SESSION['cLogin']['nome']; ?>! Nós temos hoje 800 anúncios</h2>
        <p>E mais de 54654 usuários cadastrados</p>
    </div>
    <div class="row">
        <div class="col-sm-3"><h4>Pesquisa Avançada</h4></div>
        <div class="col-sm-9"><h4>Últimos anúncios</h4></div>
    </div>
</div>
<!-- Importa footer-->
<?php require 'assets/components/footer.php'; ?>