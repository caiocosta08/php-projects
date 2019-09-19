<?php 
    if(basename($_SERVER["PHP_SELF"])=='anuncios.class.php'){
        die("</script>\n<script>window.location=('index.php')</script>");
    }
    class Anuncios{
        
        public function adicionarAnuncio($id_usuario, $id_categoria, $titulo, $descricao, $valor, $estado){
            global $pdo;
            $id_usuario = intval($id_usuario);
            $id_categoria = intval($id_categoria);
            $estado = intval($estado);
            $valor = $this->converterValor($valor);
            $valor = floatval($valor);

            $sql = "INSERT INTO anuncios SET 
                id_usuario='$id_usuario', id_categoria='$id_categoria', titulo='$titulo',
                descricao='$descricao', valor='$valor', estado='$estado'
            ";
            $sql = $pdo->prepare($sql);
            $sql = $sql->execute();
            return $sql;
        }

        public function editarAnuncio($id_anuncio, $id_categoria, $titulo, $descricao, $valor, $estado, $fotos){
            global $pdo;
            $id_categoria = intval($id_categoria);
            $estado = intval($estado);
            $valor = $this->converterValor($valor);
            $valor = floatval($valor);
            $sql = "UPDATE anuncios 
            SET id_categoria='$id_categoria', titulo='$titulo', descricao='$descricao', valor='$valor', estado='$estado'
            WHERE id='$id_anuncio'";
            $sql = $pdo->prepare($sql);
            $sql = $sql->execute();

            if(count($fotos) > 0){
                for($i=0;$i<count($fotos['tmp_name']);$i++){
                    $tipo = $fotos['type'][$i];
                    if(in_array($tipo, array('image/jpeg', 'image/png'))){
                        $tmpname = md5(time().rand(0,9999)).'.jpg';
                        move_uploaded_file($fotos['tmp_name'][$i], 'assets/images/anuncios/'.$tmpname);

                        list($width_orig, $height_orig) = getimagesize('assets/images/anuncios/'.$tmpname);
                        $ratio = $width_orig/$height_orig;
                        
                        $width = 500;
                        $height = 500;

                        if($width/$height > $ratio){
                            $width = $height*$ratio;
                        }else{
                            $height = $width/$ratio;
                        }

                        $img = imagecreatetruecolor($width, $height);
                        if($tipo == 'image/jpeg'){
                            $origi = imagecreatefromjpeg('assets/images/anuncios/'.$tmpname);
                        }elseif ($tipo == 'image/png') {
                            $origi = imagecreatefrompng('assets/images/anuncios/'.$tmpname);
                        }

                        imagecopyresampled($img, $origi, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);

                        imagejpeg($img, 'assets/images/anuncios/'.$tmpname, 80);
                
                        $sql = "INSERT INTO anuncios_imagens SET id_anuncio='$id_anuncio', url='$tmpname'";
                        $sql = $pdo->query($sql);
                    }
                }
            }
            
            return $sql;
        }

        public function converterValor($valor){
            for($i=0; $i< strlen($valor); $i++){
                $valor = str_replace(".","",$valor);
            }
            for($i=0; $i< strlen($valor); $i++){
                $valor = str_replace(",",".",$valor);
            }
            return $valor;
        }

        public function formatarValor($valor){
            return number_format($valor, 2, ',','.');
        }

        public function excluirAnuncio($id_usuario, $id_anuncio){
            global $pdo;
            $sql = "DELETE FROM anuncios_imagens WHERE id_anuncio='$id_anuncio'";
            $sql = $pdo->query($sql);
            $sql = "DELETE FROM anuncios WHERE id='$id_anuncio' AND id_usuario='$id_usuario'";
            $sql = $pdo->query($sql);
            return $sql;
        }

        public function getAnuncios(){
            global $pdo;
            $sql = "SELECT * FROM anuncios ORDER BY id DESC";
            $sql = $pdo->query($sql);
            if($sql->rowCount() > 0){
                return $sql->fetchAll();
            }else{
                return false;
            }
        }

        
        public function getQtAnuncios($filtros){
            global $pdo;

            $filtrostring = array('1=1');
            if(!empty($filtros['categoria'])){
                $filtrostring[] = "anuncios.id_categoria = '".$filtros['categoria']."'";
            }
            if(!empty($filtros['preço'])){
                $preco = explode('-', $filtros['preço']);
                $preco1 = $preco[0];
                $preco2 = $preco[1];
                $filtrostring[] = "anuncios.valor BETWEEN '$preco1' AND '$preco2'";
            }
            if(!empty($filtros['estado'])){
                $filtrostring[] = "anuncios.estado = '".$filtros['estado']."'";
            }

            $sql = "SELECT COUNT(*) as c FROM anuncios WHERE ".implode(' AND ', $filtrostring);
            $sql = $pdo->query($sql);
            $sql = $sql->fetch();
            return $sql['c'];
        }
        
        public function getAnunciosDoUsuario($id){
            global $pdo;
            $sql = "SELECT *, 
            (select anuncios_imagens.url 
            from anuncios_imagens 
            where anuncios_imagens.id_anuncio = anuncios.id limit 1) 
            as url FROM anuncios WHERE id_usuario='$id'";
            $sql = $pdo->query($sql);
            if($sql->rowCount() > 0){
                return $sql->fetchAll();
            }else{
                return false;
            }
        }

        public function getUltimosAnuncios($page, $limite, $filtros){
            global $pdo;
            $offset = ($page - 1) * $limite;
            
            $filtrostring = array('1=1');
            if(!empty($filtros['categoria'])){
                $filtrostring[] = "anuncios.id_categoria = '".$filtros['categoria']."'";
            }
            if(!empty($filtros['preço'])){
                $preco = explode('-', $filtros['preço']);
                $preco1 = $preco[0];
                $preco2 = $preco[1];
                $filtrostring[] = "anuncios.valor BETWEEN '$preco1' AND '$preco2'";
            }
            if(!empty($filtros['estado'])){
                $filtrostring[] = "anuncios.estado = '".$filtros['estado']."'";
            }

            $sql = "SELECT *, 
            (select anuncios_imagens.url 
            from anuncios_imagens 
            where anuncios_imagens.id_anuncio = anuncios.id limit 1) 
            as url,
            (select categorias.nome 
            from categorias
            where categorias.id = anuncios.id_categoria) 
            as categoria
            FROM anuncios WHERE ".implode(' AND ', $filtrostring)." ORDER BY id DESC LIMIT $offset,$limite";
            $sql = $pdo->query($sql);
            if($sql->rowCount() > 0){
                return $sql->fetchAll();
            }else{
                return false;
            }
        }

        public function getAnuncio($id){
            global $pdo;
            $array = array();
            $sql = "SELECT *,
            (select categorias.nome 
            from categorias
            where categorias.id = anuncios.id_categoria) 
            as categoria,
            (select usuarios.telefone 
            from usuarios
            where usuarios.id = anuncios.id_usuario) 
            as telefone_do_anunciante
            FROM anuncios WHERE id='$id' ORDER BY id DESC";
            $sql = $pdo->query($sql);

            if($sql->rowCount() > 0){
                $array = $sql->fetch();
                $array['fotos'] = array();
                $sql = "SELECT id,url FROM anuncios_imagens WHERE id_anuncio='$id'";
                $sql = $pdo->query($sql);

                if($sql->rowCount() > 0){
                    $array['fotos'] = $sql->fetchAll();
                }
            }
            
            return $array;
        }

        public function getAnuncioEditavel($id_anuncio, $id_usuario){
            global $pdo;
            $array = array();
            $sql = "SELECT * FROM anuncios WHERE id='$id_anuncio' AND id_usuario='$id_usuario'";
            $sql = $pdo->query($sql);
            if($sql->rowCount() > 0){
                $array = $sql->fetch();
                $array['fotos'] = array();
                $sql = "SELECT id,url FROM anuncios_imagens WHERE id_anuncio='$id_anuncio'";
                $sql = $pdo->query($sql);

                if($sql->rowCount() > 0){
                    $array['fotos'] = $sql->fetchAll();
                }
            }
            
            return $array;
        }

        public function excluirFoto($id_foto){
            global $pdo;
            $sql = "SELECT * FROM anuncios_imagens WHERE id='$id_foto'";
            $sql = $pdo->query($sql);
            if($sql->rowCount() > 0){
                $sql = $sql->fetch();
                $id_anuncio = $sql['id_anuncio'];
            }
            $sql = "DELETE FROM anuncios_imagens WHERE id='$id_foto'";
            $sql = $pdo->query($sql);
            return $id_anuncio;
        }
    }
?>