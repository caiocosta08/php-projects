<!-- Importa navbar-->
<?php require 'assets/components/navbar.php'; ?>
<style type="text/css">

.cartao{
        display: flex; 
        flex-wrap: wrap;
        background-color: aqua;
        height: 100%;
    }
    .header{
        height:250px; 
        width:100%; 
        background-color: rgb(165, 165, 165);
        border: 2px solid gray;
        border-radius: 5px;
        display: flex;
        align-items: center;
        justify-content: center;
        background-image: url('../images/anuncios/1f071a7272e05a9f4b72573aa94eb74d.jpg'); 
    }
    .logo{
        font-size: 40px; background-color: cadetblue;border-radius: 40px;align-items: center;justify-content: center;
    }
    .corpo{
        height: 100%;
        width: 100%;
        background-color: #425161;
        color: #FFF;
    }
    .cartao img{
        display: block;
        margin-left: auto;
        margin-right: auto;
        height: 100%;
    }
</style>
<?php 
    if(!isset($_SESSION['cLogin']) || empty($_SESSION['cLogin'])){
        ?>
        <script type="text/javascript">window.location.href='login.php'</script>
        <?php
        exit;
    }
    
    require 'classes/anuncios.class.php';
    $a = new Anuncios();
    $id = $_SESSION['cLogin']['id'];

    if(isset($_GET['id']) && !empty($_GET['id'])){
        $id_anuncio = addslashes($_GET['id']);
        $anuncio = $a->getAnuncio($id_anuncio);
    }else{
        ?>
        <script type="text/javascript">window.location.href='index.php'</script>
        <?php
        exit;
    }
?>
<div class="container-fluid">
    <div class="cartao">
        <div class="header">
            <img src="assets/images/teste.jpg">
        </div>
        <div class="corpo" style="padding: 2% 5%">
            <div class="row corpo_head justify-content-center align-items-center" style="margin-bottom: 10px;">
                <div class="col-2 logo"><i class="fas fa-pen"></i></div>
                <div class="col-8">
                    <div style="font-size: 20px">Colégio Aprovação</div>
                    <div style="font-size: 12px">15 minutos atrás</div>
                </div>
                <div class="col-2" style="display:flex; justify-content: center; align-items:center; color: #FFF; height: 50px; width: 50px; border-radius: 50px; background-color: #FFC400;">20%</div>
            </div>
            <div class="corpo_items">
                <table>
                    <tr>
                        <td><i class="fas fa-pen"></i></td>
                        <td><div class="item-skill">Série: 1º Ano/Ensino Médio</div></td>
                    </tr>
                    <tr>
                        <td><i class="fas fa-user"></i></td>
                        <td><div class="item-skill">Grupo: 10 alunos</div></td>
                    </tr>
                    <tr>
                        <td><i class="fas fa-dollar-sign"></i></td>
                        <td><div class="item-skill">Desconto: 20%</div></td>
                    </tr>
                </table>
            </div>
            <div class="corpo_desc">
                <div class="desc_title">Descrições adicionais</div>
                <div class="desc_body">Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti vero quae explicabo minima aspernatur consequuntur perferendis, dolores praesentium at nisi voluptatum consectetur nostrum mollitia quasi tempora voluptatem obcaecati nulla totam.</div>
            </div>
            <button class="btn form-control" style="color:#FFF; background-color: #FFC400">Confirmar Matrícula</button>
        </div>
    </div>
</div>
<!-- Importa footer-->
<?php require 'assets/components/footer.php'; ?>