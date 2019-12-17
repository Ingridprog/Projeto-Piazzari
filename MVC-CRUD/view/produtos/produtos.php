<?php
    if(!isset($_SESSION))
    session_start();

    if(isset($_SESSION['previewFoto']))
    unset($_SESSION['previewFoto']);

    $action = "router.php?controller=produtos&modo=novo";

    $foto = "background.png";

    if(isset($_GET['modo'])){
        if($_GET['modo'] == 'buscar'){
            
            $codigo = $produtos->getCodigo();
            $foto = $produtos->getFoto();
            $nome = $produtos->getNome();
            $preco = $produtos->getPreco();
            $descricao = $produtos->getDescricao();
            $introDestaque = $produtos->getIntroDestaque();
            $descricaoDestaque = $produtos->getDescricaoDestaque();
            $desconto = $produtos->getDesconto();
                
            

            $_SESSION['nomeFoto'] = $foto;

            $action = "router.php?controller=produtos&modo=editar&id=".$codigo;
        }
    }
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
                            <img src="view/img/<?=$foto?>" alt="img" class="img_default">
                        </div>    
                    </form>
                    
                    <form name="frmprodutos" method="post" action="<?=$action?>">
                        <div class="container_inp center">
                            <div class="txt_frm letras float-left"> Nome: </div>
                            <input type="text" name="txtnome" value="<?=@$nome?>" class="inp_camp float-left letras">            
                        </div>
                        
                        <div class="container_inp center">
                            <div class="txt_frm letras float-left"> preço: </div>
                            <input class="inp_camp float-left" type="number_format" name="frmpreco" value="<?=@$preco?>">     
                        </div>        
                        
                        <div class="container_inp center">        
                            <div class="txt_frm letras float-left"> Descrição: </div>
                            <textarea name="txtdescricao" class="inp_camp letras font-size" cols="30" rows="3"><?=@$descricao?></textarea>
                        </div> 
                        
                        <div class="container_inp center">      
                            <div class="txt_frm letras float-left"> intro Destaque: </div>
                            <textarea name="txtdestaqueintro" class="inp_camp letras font-size" cols="30" rows="10"><?=@$introDestaque?></textarea>
                        </div>     

                        <div class="container_inp center">
                            <div class="txt_frm letras float-left"> Des Destaque: </div>
                            <textarea name="txtdestaque" class="inp_camp letras font-size" cols="30" rows="10"><?=@$descricaoDestaque?></textarea>
                        </div>

                        <div class="container_inp center">
                            <div class="txt_frm letras float-left"> Desconto: </div>
                            <input type="number_format" name="frmdesconto" class="inp_camp letras font-size" value="<?=@$desconto?>">
                        </div>
                        
                        <div class="btn_cat center">
                            <input type="submit" name="btnsave" value="Salvar" id="btn_cate" class="letras font-size">
                        </div>     
                    </form> 
                </div>
                <h1 class="titulo_gerencia letra_white center titulo">
                    GERENCIE PRODUTOS
                </h1>
                <div class="tabela_prod center">
                    <div class="container_camp">
                        <div class="camp_prod_gr texto_center letras letras_campos">
                            Imagem
                        </div>
                        <div class="camp_prod_pq texto_center letras letras_campos">
                            Nome
                        </div>
                        <div class="camp_prod_pq texto_center letras letras_campos">
                            Preço
                        </div>
                        <div class="camp_prod_gr texto_center letras letras_campos">
                            Descrição
                        </div>
                        <div class="camp_prod_pq texto_center letras letras_campos">
                            Desconto
                        </div>
                        <div class="camp_prod_pq texto_center letras letras_campos">
                            Destaque
                        </div>
                        <div class="camp_prod_gr texto_center letras letras_campos">
                            Ações
                        </div>
                    </div>
                    <?php
                        // Import da controller
                        require_once("controller/produtosController.php");

                        $produtosController = new ProdutosController();

                        $listDados = $produtosController->listaProdutos();

                        $cont = 0;

                        while($cont < count($listDados)){
                    ?>
                    <div class="container_camp">
                        <div class="camp_prod_gr_dados texto_center letras">
                           <img src="view/img/<?=$listDados[$cont]->getFoto()?> " alt="img" class="prod_img center"> 
                        </div>    
                        <div class="camp_prod_pq_dados texto_center letras">
                            <?=$listDados[$cont]->getNome()?> 
                        </div>
                        <div class="camp_prod_pq_dados texto_center letras">
                            <?=$listDados[$cont]->getPreco()?>    
                        </div>
                        <div class="camp_prod_gr_dados texto_center letras">
                            <?=$listDados[$cont]->getDescricao()?>     
                        </div> 
                        <div class="camp_prod_pq_dados texto_center letras">
                            <?=$listDados[$cont]->getDesconto()?> 
                        </div>
                        <div class="camp_prod_pq_dados texto_center letras">
                            <?php
                                if($listDados[$cont]->getDestaque() == 1){
                            ?>
                                <img src="../cms/img/ativa.png" alt="img" class="img" title="Destaque">
                            <?php
                                }else{
                            ?>
                                <img src="../cms/img/desativar.png" alt="img" class="img" title="Destaque">
                            <?php
                                }
                            ?>
                            
                        </div>
                        <div class="camp_prod_gr_dados texto_center letras ">
                            <div class="container_acoes margin-top-10">
                                <a href="router.php?controller=produtos&modo=buscar&id=<?=$listDados[$cont]->getCodigo()?>">
                                    <img src="../cms/img/editar.png" alt="img" class="img" title="Editar">
                                </a> 
                                <a href="router.php?controller=categorias&modo=excluir&id=<?=$listDados[$cont]->getCodigo()?>">
                                    <img src="../cms/img/excluir.png" alt="img" class="img" title="Excluir" onclick="confirm('Tem certeza que deseja excluir este item?')">
                                </a>
                                <a href="router.php?controller=categorias&modo=excluir&id=<?=$listDados[$cont]->getCodigo()?>">
                                    <img src="../cms/img/search.png" alt="img" class="img" title="Ver" onclick="confirm('Tem certeza que deseja excluir este item?')">
                                </a>
                                <!-- Status Passo 01 -->
                                <a href="router.php?controller=categorias&modo=statuscat&id=<?=$listDados[$cont]->getCodigo()?>&status=<?=$listDados[$cont]->getStatus()?>">
                                    <?php
                                        if($listDados[$cont]->getStatus() == 1){
                                    ?>
                                        <img src="../cms/img/ativa.png" alt="img" class="img" title="Status">
                                    <?php
                                        }else{
                                    ?>
                                        <img src="../cms/img/desativar.png" alt="img" class="img" title="Status">
                                    <?php
                                        }
                                    ?>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php
                        $cont++;
                        }
                    ?>
                </div>
            </div>
        </div>
        <?php
            require_once('view/footer.php');
        ?>
    </body>
</html>

