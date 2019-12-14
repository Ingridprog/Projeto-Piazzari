<?php

    $action = "router.php?controller=categorias&modo=novo";

    if(isset($_GET['modo'])){
        if(strtoupper($_GET['modo']) == "BUSCAR"){
            $nome = $categoriasDados->getNome();
            $status = $categoriasDados->getStatus();
            $codigo = $categoriasDados->getCodigo();
            
            $action = "router.php?controller=categorias&modo=editar&id=".$codigo;
        }
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title> CATEGORIAS </title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href="https://fonts.googleapis.com/css?family=Dosis&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Tomorrow&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="view/css/padroniza.css">
    <link rel="stylesheet" type="text/css" href="view/css/categorias.css">

</head>
<body>
    <?php
        require_once('view/header.php');
    ?>
    <div class="container_frm">
        <div class="conteudo center">
            <h1 class="titulo texto_center titulo_principal"> Administração de categorias</h1>
            <h1 class="titulo letra_white titulo_categoria center">CRIE CATEGORIAS</h1>
            <form action="<?=$action?>" id="frm_cat" class="center" method="post" name="frmcategorias">
                <div class="inputs center">
                    <div id="nome" class="letras"> Nome: </div>
                    <input type="text" name="txtnome" maxlength="40" size="40" value="<?=@$nome?>"  class="nome_input letras" required>
                </div>
                <div class="btn center ">
                    <input type="submit" name="btncategorias" value="Salvar" class="btnSave titulo">
                </div>
            </form>
            <h1 class="titulo letra_white titulo_categoria center">GERENCIE CATEGORIAS</h1>
            <div class="table center">
                <div class="container_table_nome">
                    <div class="table_nome letras"> Nome </div>
                    <div class="table_nome letras"> Ações </div>
                </div>
                <?php
                    // Import da controller
                    require_once("controller/categoriasController.php");

                    $categoriasController = new CategoriasController();

                    $listDados = $categoriasController->listaCategorias(0);

                    $cont = 0;

                    while($cont < count($listDados)){
                ?>
                <div class="container_table_nome">
                    <div class="table_nome_campos letras"><?=$listDados[$cont]->getNome()?></div>
                    <div class="table_nome_campos letras">
                        <a href="router.php?controller=categorias&modo=buscar&id=<?=$listDados[$cont]->getCodigo()?>">
                            <img src="../cms/img/editar.png" alt="img" class="img" title="Editar">
                        </a> 
                        <a href="router.php?controller=categorias&modo=excluir&id=<?=$listDados[$cont]->getCodigo()?>">
                            <img src="../cms/img/excluir.png" alt="img" class="img" title="Excluir" onclick="confirm('Tem certeza que deseja excluir este item?')">
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