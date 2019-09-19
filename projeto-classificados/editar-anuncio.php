<!-- Importa navbar-->
<?php require 'assets/components/navbar.php'; 
if(!isset($_SESSION['cLogin']) || empty($_SESSION['cLogin'])){
    ?>
    <script type="text/javascript">window.location.href='login.php'</script>
    <?php
    exit;
} 
?>
<div class="container">
    <h1>Editar anúncio</h1>
    <?php 
        require 'classes/anuncios.class.php'; 
        require 'classes/categorias.class.php'; 

        $a = new Anuncios();
        $c = new Categorias();

        if(isset($_POST['titulo']) && !empty($_POST['titulo'])){
            $titulo = addslashes($_POST['titulo']);
            $descricao = addslashes($_POST['descricao']);
            $valor = addslashes($_POST['valor']);
            $estado = addslashes($_POST['estado']);
            $id_categoria = addslashes($_POST['categoria']);
            $id_usuario = $_SESSION['cLogin']['id'];
            $id_anuncio = $_POST['id_anuncio'];
            if(isset($_FILES['fotos'])){
                $fotos = $_FILES['fotos'];
            }else{
                $fotos = array();
            }
            if(!empty($titulo) && !empty($descricao) && !empty($valor) && (strlen($estado) > 0) && (strlen($id_categoria) > 0) && !empty($id_usuario)){
                
                if($a->editarAnuncio($id_anuncio, $id_categoria, $titulo, $descricao, $valor, $estado, $fotos)){
                ?>
                <div class="alert alert-success">Anúncio editado com sucesso!</div>
                <?php

                }else{
                    ?>
                    <div class="alert alert-danger">Não foi possível atualizar as informações.</div>
                    <?php
                }
            }else{
                ?>
                <div class="alert alert-warning">Preencha todos os campos</div>
                <?php
            }
        }

        if(isset($_GET['id']) && !empty($_GET['id']) && isset($_SESSION['cLogin']) && !empty($_SESSION['cLogin'])){
            $id_usuario = $_SESSION['cLogin']['id'];
            $id_anuncio = $_GET['id'];
            $anuncio = $a->getAnuncioEditavel($id_anuncio, $id_usuario);
            if(!$anuncio){
                ?>
                <script type="text/javascript">window.location.href='meus-anuncios.php'</script>
                <?php
            }
        }else{
            '<h3>Nenhum anúncio encontrado.';
        }
    ?>
    <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="categoria">Categoria:</label>
            <select name="categoria" id="categoria" class="form-control">
            <?php 
                $categorias = $c->getCategorias();
                if($categorias){
                    foreach ($categorias as $info) {
            ?>
                <option value="<?php echo $info['id']; ?>" <?php if($anuncio['id_categoria'] == $info['id']) echo 'selected'; ?>>
                <?php 
                    echo utf8_encode($info['nome']);  
                ?>
                </option>
            <?php
                    }
                }
            ?>
            </select>
        </div>
        <div class="form-group">
            <label for="titulo">Título:</label>
            <input type="text" name="titulo" id="titulo" class="form-control" value="<?php if($anuncio) echo $anuncio['titulo']; ?>">
        </div>
        <div class="form-group">
            <label for="descricao">Descrição:</label>
            <textarea name="descricao" id="descricao" class="form-control"><?php if($anuncio) echo $anuncio['descricao']; ?></textarea>
        </div>
        <div class="form-group">
            <label for="valor">Valor:</label>
            <?php $anuncio['valor'] = 100 * (number_format($anuncio['valor'],2,".","")); ?>
            <input type="text" name="valor" id="valor" class="form-control" value="<?php if($anuncio) echo $anuncio['valor']; ?>">
        </div>
        <div class="form-group">
            <label for="estado">Estado de Conservação:</label>
            <select name="estado" id="estado" class="form-control">
                <option value="1" <?php if($anuncio['estado'] == 1) echo 'selected'; ?>>Ruim</option>
                <option value="2" <?php if($anuncio['estado'] == 2) echo 'selected'; ?>>Bom</option>
                <option value="3" <?php if($anuncio['estado'] == 3) echo 'selected'; ?>>Ótimo</option>
            </select>
        </div>
        <div class="form-group">
            <label for="add_foto">Fotos do Anúncio:</label>
            <input type="file" name="fotos[]" multiple/><br>
            
            <div class="card text-center">
                <div class="card-header">Fotos do anúncio</div>
                <div class="card-body">
                <?php foreach($anuncio['fotos'] as $foto){ ?>
                    <div class="foto_item">
                        <img src="assets/images/anuncios/<?php echo $foto['url']; ?>" border="0" class="img-thumbnail"><br>
                        <a class="btn btn-danger"href="excluir-foto.php?id=<?php echo $foto['id']; ?>">Excluir <i class="fas fa-times"></i></a>
                    </div>
                <?php
                    } 
                ?>
                </div>                
            </div>
        </div>

        <input type="hidden" name="id_anuncio" value="<?php echo $_GET['id']; ?>">
        <button class="btn btn-primary" type="submit">Salvar <i class="fas fa-save"></i></button>
    </form>
</div>
<!-- Importa footer-->
<?php require 'assets/components/footer.php'; ?>