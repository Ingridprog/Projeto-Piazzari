<?php
    $cat = 0;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=], initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>CMS | PRODUTOS</title>
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
                        <div class="center divCenter">
                            <div class="txt_frm_foto center letras"> Foto: </div>  
                        </div>
                            <div class="caixa_input_img center"><input type="file" name="flefoto" value="" class="img_input center letras" id="fileFoto"> 
                        </div>
                        <div id="img_carrega" class="center">
                            <img src="view/img/background.png" alt="img" class="img_default">
                        </div>    
                    </form>
                    <form action="router.php?modo=porcategoria&controller=subcategorias" method="post" name="frmselect" id="frmselect" class="center">
                        <div class="txt_frm center letras float-left"> Categoria: </div>

                        <select name="sltcat" id="sltcat" class="letras">
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
                        <div class="chk">
                            <div class="txt_frm letras float-left"> Subcategorias: </div>
                            <div id="sub" class="letras"></div>    
                        </div>
                        
                        <div class="container_inp">
                            <div class="txt_frm letras float-left"> Nome: </div>
                            <input type="text" name="txtnome" value="" class="inp_camp float-left">            
                        </div>
                        
                        <div class="container_inp">
                            <div class="txt_frm letras float-left"> preço: </div>
                            <input class="inp_camp float-left" type="number_format" name="frmpreco" value="">     
                        </div>        
                        
                        <div class="container_inp">        
                            <div class="txt_frm letras float-left"> Descrição: </div>
                            <textarea name="txtdescricao" class="inp_camp letras font-size" cols="30" rows="3"></textarea>
                        </div> 
                        
                        <div class="container_inp">      
                            <div class="txt_frm letras float-left"> Destaque: </div>
                            <input type="checkbox" value="" name="chkdestaque" id="chkdestaque">
                        </div>    

                        <div class="container_inp">      
                            <div class="txt_frm letras float-left"> intro Destaque: </div>
                            <textarea name="txtdestaqueintro" class="inp_camp letras font-size" cols="30" rows="10"></textarea>
                        </div>     

                        <div class="container_inp">
                            <div class="txt_frm letras float-left"> Des Destaque: </div>
                            <textarea name="txtdestaque" class="inp_camp letras font-size" cols="30" rows="10"></textarea>
                        </div>

                        <div class="container_inp">
                            <div class="txt_frm letras float-left"> Desconto: </div>
                            <input type="number_format" name="frmdesconto" class="inp_camp letras font-size" value="">
                        </div>
                        
                        <div class="btn_cat center">
                            <input type="submit" name="btnsave" value="Salvar" id="btn_cate" class="letras font-size">
                        </div>     
                    </form> 
                </div>
            </div>
        </div>
        <?php
            require_once('view/footer.php');
        ?>
    </body>
</html>

