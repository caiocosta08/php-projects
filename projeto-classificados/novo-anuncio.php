<!-- Importa navbar-->
<?php require 'assets/components/navbar.php'; ?>
<?php 
    if(!isset($_SESSION['cLogin']) || empty($_SESSION['cLogin'])){
        ?>
        <script type="text/javascript">window.location.href='login.php'</script>
        <?php
        exit;
    }?>
<div class="container">
    <h1>Meus Anúncios - Novo Anúncio</h1>
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
            echo floatval($valor);
            if(!empty($titulo) && !empty($descricao) && !empty($valor) && (strlen($estado) > 0) && (strlen($id_categoria) > 0) && !empty($id_usuario)){
                if($a->adicionarAnuncio($id_usuario, $id_categoria, $titulo, $descricao, $valor, $estado)){
                    header('Location: meus-anuncios.php');
                    exit;
                }else{
                    echo 'erro';
                }
            }else{
                ?>
                <div class="alert alert-warning">Preencha todos os campos</div>
                <?php
            }
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
                <option value="<?php echo $info['id']; ?>"><?php echo utf8_encode($info['nome']); ?></option>
            <?php
                    }
                }
            ?>
            </select>
        </div>
        <div class="form-group">
            <label for="titulo">Título:</label>
            <input type="text" name="titulo" id="titulo" class="form-control">
        </div>
        <div class="form-group">
            <label for="descricao">Descrição:</label>
            <textarea type="text" name="descricao" id="descricao" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="valor">Valor:</label>
            <input type="text" name="valor" id="valor" class="form-control">
        </div>
        <div class="form-group">
            <label for="estado">Estado de Conservação:</label>
            <select name="estado" id="estado" class="form-control">
                <option value="1">Ruim</option>
                <option value="2">Bom</option>
                <option value="3">Ótimo</option>
            </select>
        </div>
        <button class="btn btn-primary" type="submit">Adicionar Anúncio <i class="fas fa-plus"></i></button>
    </form>
</div>
<!-- Importa footer-->
<?php require 'assets/components/footer.php'; ?>