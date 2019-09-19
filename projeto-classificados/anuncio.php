<!-- Importa navbar-->
<?php require 'assets/components/navbar.php'; ?>
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
    <div class="row">
        <div class="col-md-4">
            <div id="carousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                <?php $qt_fotos = count($anuncio['fotos']); 
                    for($q=0; $q<$qt_fotos; $q++){
                ?>
                    <li data-target="#carousel" data-slide-to="<?php echo $q; ?>" <?php if($q==0) echo 'class="active"'; ?>></li>
                <?php
                    }
                ?>
                </ol>
                <div class="carousel-inner">
                <?php 
                    $qt_fotos = count($anuncio['fotos']); 
                    $q = 0; 
                    foreach($anuncio['fotos'] as $foto){ 
                ?>
                <div class="carousel-item <?php if($q==0) echo 'active'; ?>">
                    <div>
                        <img style='display: block;margin-left: auto;margin-right: auto; height: 100%;' src="assets/images/anuncios/<?php echo $foto['url']; ?>" border="0" class="d-block w-100">
                    </div>
                </div>
                <?php
                    $q++;
                    }
                ?>
                </div>
                <a style='background-color: red' class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Próxima</span>
                </a>
                <a style='background-color: red' class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Anterior</span>
                </a>
                </div>
        </div>
        <div class="col-md-8">

        <?php 
            if($anuncio){
        ?>
                <h1><?php echo $anuncio['titulo']; ?></h1>
                <h4><?php echo 'Categoria: '.utf8_encode($anuncio['categoria']); ?></h4>
                <p><?php echo 'Descrição: '.$anuncio['descricao']; ?></p>
                <br>
                <h3><?php echo 'Valor: R$'.$a->formatarValor($anuncio['valor']); ?></h3>
                <h4><?php echo 'Telefone: '.$anuncio['telefone_do_anunciante']; ?></h4>
        <?php
            }
        ?>
        </div>
    </div>
</div>
<!-- Importa footer-->
<?php require 'assets/components/footer.php'; ?>