<!-- Importa navbar-->
<?php require 'assets/components/navbar.php'; ?>
<?php 
    require 'classes/anuncios.class.php';
    require 'classes/usuarios.class.php';
    require 'classes/categorias.class.php';
 
    $a = new Anuncios();
    $u = new Usuarios();
    $c = new Categorias();

    $filtros = array(
        'categoria' => '',
        'preço' => '',
        'estado' => ''
    );
    if(isset($_GET['filtros'])){
        $filtros = $_GET['filtros'];
    }

    $qt_anuncios = $a->getQtAnuncios($filtros);
    $qt_usuarios = $u->getQtUsuarios();
    
    $p = 1;
    if(isset($_GET['p']) && !empty($_GET['p'])){
        $p = addslashes($_GET['p']);
    }
    $limite_por_pagina = 3;
    $qt_paginas = ceil($qt_anuncios / $limite_por_pagina);
    $anuncios = $a->getUltimosAnuncios($p, $limite_por_pagina, $filtros);
    $categorias = $c->getCategorias();
    
?>
<div class="container-fluid">
    <div class="jumbotron">
        <h2>Nós temos hoje <?php echo $qt_anuncios; ?> anúncios</h2>
        <p>E mais de <?php echo $qt_usuarios; ?> usuários cadastrados</p>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <h4>Pesquisa Avançada</h4>
            <form method="GET">
                <div class="form-group">
                    <label for="categoria">Categoria:</label>
                    <select id="categoria" name="filtros[categoria]" class="form-control">
                        <option></option>
                        <?php 
                        foreach($categorias as $categoria){    
                        ?>
                        <option value="<?php echo $categoria['id']; ?>" <?php if($categoria['id']==$filtros['categoria']) echo 'selected'; ?>> 
                            <?php echo utf8_encode($categoria['nome']); ?>
                        </option>
                        <?php
                        } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="preco">Preço:</label>
                    <select id="preco" name="filtros[preço]" class="form-control">
                        <option></option>
                        <option <?php if($filtros['preço']=='0-50') echo 'selected'; ?> value="0-50">R$0 a R$50</option>
                        <option <?php if($filtros['preço']=='51-100') echo 'selected'; ?> value="51-100">R$51 a R$100</option>
                        <option <?php if($filtros['preço']=='101-200') echo 'selected'; ?> value="101-200">R$101 a R$200</option>
                        <option <?php if($filtros['preço']=='201-500') echo 'selected'; ?> value="201-500">R$201 a R$500</option>
                        <option <?php if($filtros['preço']=='501-1000') echo 'selected'; ?> value="501-1000">R$201 a R$1.000</option>                        
                    </select>
                </div>
                <div class="form-group">
                    <label for="estado">Estado de Conservação:</label>
                    <select id="estado" name="filtros[estado]" class="form-control">
                        <option></option>
                        <option <?php if($filtros['estado']==1) echo 'selected'; ?> value="1">Ruim</option>
                        <option <?php if($filtros['estado']==2) echo 'selected'; ?> value="2">Bom</option>
                        <option <?php if($filtros['estado']==3) echo 'selected'; ?> value="3">Ótimo</option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary form-control">Filtrar <i class="fas fa-filter"></i></button>
                </div>
            </form>

        </div>
        <div class="col-sm-9">
            <h4>Últimos anúncios</h4>
            <table class="table table-hover img-thumbnail">
                <tbody>
                <?php
                if($anuncios){
                    foreach ($anuncios as $anuncio) {
                ?>
                <tr class="table_row" data-href="anuncio.php?id=<?php echo $anuncio['id']; ?>">
                    <td>
                    <?php if(isset($anuncio['url']) && !empty($anuncio['url'])){ ?>
                        <img height="40" src="assets/images/anuncios/<?php echo $anuncio['url'];?>" border="0" alt="<?php echo $anuncio['titulo']; ?>">
                    <?php } else{
                    ?>
                        <img height="40" src="assets/images/default.png" border="0" alt="Imagem Padrão do Anúncio">
                    <?php
                    }?>
                    </td>
                    <td>
                        <a href="anuncio.php?id=<?php echo $anuncio['id']; ?>"><?php echo $anuncio['titulo']; ?></a><br>
                        <?php echo utf8_encode($anuncio['categoria']); ?>
                    </td>
                    <td>R$<?php echo $a->formatarValor($anuncio['valor']); ?></td>                    
                </tr>
                <?php
                    }
                }    
                ?>
                </tbody>
            </table>
            <ul class="pagination">
                <?php for($q=1; $q<=$qt_paginas; $q++){
                ?>
                <li class="page-item <?php if($q == $p) echo 'active'; ?>">
                    <a class="page-link" href="index.php?<?php 
                        $w = $_GET;
                        $w['p'] = $q;
                        echo http_build_query($w);
                        ?>">
                        <?php echo $q; ?>
                    </a>
                </li>
                <?php
                } ?>
            </ul>
        </div>
    </div>
</div>
<!-- Importa footer-->
<?php require 'assets/components/footer.php'; ?>