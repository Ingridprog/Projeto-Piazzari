<?php
    $action = "router.php?modo=novo&controller=subcategorias";
    $cat = 0;

    if(isset($_GET['modo'])){
        if($_GET['modo'] == "buscar"){
            $nome = $subcategoriasDados->getNome();
            $codigo = $subcategoriasDados->getCodigo();
            $action = "router.php?modo=editar&controller=subcategorias&id=".$codigo;
        }
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title> SUBCATEGORIAS </title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link href="https://fonts.googleapis.com/css?family=Dosis&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Tomorrow&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="view/css/padroniza.css">
        <link rel="stylesheet" type="text/css" href="view/css/categorias.css">
        <link rel="stylesheet" type="text/css" href="view/css/subcategorias.css">
    </head>
    <body>
        <?php
            require_once('view/header.php');
        ?>
        <div class="container_frm">
            <div class="conteudo center">
                <h1 class="titulo texto_center titulo_principal"> Administração de Subcategorias</h1>
                <h1 class="titulo letra_white titulo_categoria center">CRIE SUBCATEGORIAS</h1>
                <form action="<?=$action?>" id="frm_subcat" class="center" method="post" name="frmsubcategorias">
                    <div class="inputs center">
                        <div id="nome" class="letras"> Nome: </div>
                        <input type="text" name="txtnome" maxlength="40" size="40" value="<?=@$nome?>"  class="nome_input letras" required>
                    </div>
                    <div class="btn center ">
                        <input type="submit" name="btncategorias" value="Salvar" class="btnSave titulo">
                    </div>
                </form>
                <h1 class="titulo letra_white titulo_subcategoria center">GERENCIE SUBCATEGORIAS</h1>
                <div class="table_sub center letras">
                    <div class="nome_camp">
                        <div class="camp_nome letras">Subcategoria</div>
                        <div class="camp letras">Ações</div>
                    </div>
                    <?php
                         // Import da controller
                        require_once("controller/subcategoriasController.php");

                        $subcategoriasController = new SubcategoriasController();

                        $listDados = $subcategoriasController->listaSubcategorias();

                        $cont = 0;

                        while($cont < count($listDados)){
                    ?>
                    <div class="nome_camp">
                        <div class="letras dados_nome"><?=$listDados[$cont]->getNome()?></div>
                        <div class="letras dados">
                            <a href="router.php?controller=subcategorias&modo=buscar&id=<?=$listDados[$cont]->getCodigo()?>">
                                <img src="../cms/img/editar.png" alt="img" class="img" title="Editar">
                            </a> 
                            <a href="router.php?controller=subcategorias&modo=excluir&id=<?=$listDados[$cont]->getCodigo()?>">
                                <img src="../cms/img/excluir.png" alt="img" class="img" title="Excluir" onclick="confirm('Tem certeza que deseja excluir este item?')">
                            </a>
                            <!-- Status Passo 01 -->
                            <a href="router.php?controller=subcategorias&modo=statussub&id=<?=$listDados[$cont]->getCodigo()?>&status=<?=$listDados[$cont]->getStatus()?>">
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