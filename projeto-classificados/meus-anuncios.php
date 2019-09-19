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
?>
<div class="container">
        <h1>Meus anúncios</h2>
        <a class="btn btn-primary" href="novo-anuncio.php">Novo anúncio <i class="fas fa-plus"></i></a><br>
    <div class="row">
        <!--<div class="col-10-sm table-responsive-sm">-->
        <div class="col">
            <table class="table table-hover img-thumbnail">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Foto</th>
                        <th scope="col">Título</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                $anuncios = $a->getAnunciosDoUsuario($id);
                if($anuncios){
                    foreach ($anuncios as $anuncio) {
                ?>
                    <tr class="table_row" data-href="anuncio.php?id=<?php echo $anuncio['id']; ?>">
                        <td>
                        <?php   if(isset($anuncio['url']) && !empty($anuncio['url'])){ ?>
                            <img height="40" src="assets/images/anuncios/<?php echo $anuncio['url'];?>" border="0" alt="<?php echo $anuncio['titulo']; ?>">
                        <?php } else{
                        ?>
                            <img height="40" src="assets/images/default.png" border="0" alt="Imagem Padrão do Anúncio">
                        <?php
                        }?>
                        </td>
                        <td><?php echo $anuncio['titulo']; ?></td>
                        <td>R$<?php echo $a->formatarValor($anuncio['valor']); ?></td>
                        <td>
                            <a class="btn btn-warning" href="editar-anuncio.php?id=<?php echo $anuncio['id']; ?>"><i class="fas fa-pen"></i></a>
                            <a class="btn btn-danger" href="excluir-anuncio.php?id=<?php echo $anuncio['id']; ?>"><i class="fas fa-times"></i></a>
                        </td>
                    </tr>
        <?php
                }
        ?>
                
        <?php
            }else{
        ?>
            <div class="col">
                <h3>Nenhum anúncio adicionado por você. ):</h3>
            </div>
        <?php
            }
        ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Importa footer-->
<?php require 'assets/components/footer.php'; ?>