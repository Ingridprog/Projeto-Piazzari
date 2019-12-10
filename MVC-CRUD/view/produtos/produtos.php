<?php
    $cat = 0;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=], initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <link href="https://fonts.googleapis.com/css?family=Dosis&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Tomorrow&display=swap" rel="stylesheet">
        <link href="view/css/produtos.css" rel="stylesheet" type="text/css">
        <link href="view/css/categorias.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="view/css/padroniza.css">
        <link rel="stylesheet" type="text/css" href="view/css/home.css">
        <script src="view/js/jquery.js"></script>
        <script src="view/js/jquery.form.js"></script>
        <script>
            $(document).ready(function(){
                    $('#fileFoto').live('change', function(){
                        $('#formFoto').ajaxForm({
                            target: '#img_carrega'
                        }).submit();
                    });

                    $('#sltcat').live('change', function(){
                        $('#frmselect').ajaxForm({
                            target: '#sub'
                    }).submit();
                });
            }); 
        </script>
    </head>
    <body>
        <?php
            require_once('view/header.php');
        ?>
        <div class="container_produtos">
            <div class="conteudo center">
                <h1 class="titulo texto_center titulo_principal">
                    Administração de Produtos
                </h1>
                <h1 class="titulo letra_white titulo_categoria center">
                    CRIE PRODUTOS
                </h1>
                <div class="container_forms center">
                    <form name="frmfoto" id="formFoto" method="post" action="router.php?controller=produtos&modo=foto" enctype="multipart/form-data">
                        <div class="campos center">
                            <div class="txt_input"> Foto: </div> <div class="caixa_input"><input type="file" name="flefoto" value="" class="caixa_campos" id="fileFoto"> </div>
                        </div>     
                    </form>
                    <form action="router.php?modo=porcategoria&controller=subcategorias" method="post" name="frmselect" id="frmselect">
                        <label> Categoria </label>

                        <select name="sltcat" id="sltcat">
                            <option value="">SELECIONE...</option>
                            <?php
                                require_once('controller/categoriasController.php');

                                $categoriaController= new CategoriasController();

                                $categorias = $categoriaController->listaCategorias($cat);

                                $cont = 0;

                                while($cont < count($categorias)){
                            ?>
                                <option class="letra_slt letras" value="<?=$categorias[$cont]->getCodigo()?>"><?=$categorias[$cont]->getNome()?></option>
                            <?php
                                    $cont++;
                                }
                            ?>
                        </select>
                    </form>
                    <form action="router.php?modo=novo&controller=produtos" id="" name="frmprodutos" method="post">
                        <label> Subcategorias </label>
                        <div id="sub">

                        </div>

                        <div id="img_carrega">

                        </div>
                        <label> Nome </label>
                        <input type="text" name="txtnome" value="">

                        <label > preço: </label>
                        <input type="number_format" name="frmpreco" value=""><br><br>

                        <label>decrição </label>
                        <textarea name="txtdescricao" cols="30" rows="10"></textarea>

                        <label>Destaque </label>
                        <input type="checkbox" value="" name="chkdestaque"><br><br>

                        <label> Introdução destaque: </label>
                        <textarea name="txtdestaqueintro" cols="30" rows="10"></textarea>

                        <label> Descrição destaque: </label>
                        <textarea name="txtdestaque" cols="30" rows="10"></textarea>

                        <label> Desconto: </label>
                        <input type="number_format" name="frmdesconto" value="">
                        <input type="submit" name="btnsave" value="Salvar">
                    </form> 
                </div>
            </div>
        </div>
        <?php
            require_once('view/footer.php');
        ?>
    </body>
</html>

