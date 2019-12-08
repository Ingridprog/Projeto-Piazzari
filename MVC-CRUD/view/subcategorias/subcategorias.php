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
                <form action="router.php?modo=novo&controller=subcategorias" id="frm_subcat" class="center" method="post" name="frmsubcategorias">
                    <div class="letras container_select center">
                        <div id="txtselect" class="letras"> Categoria: </div>
                        <select name="sltcat" id="sltcat" class="letras">
                            <?php
                                require_once('controller/categoriasController.php');

                                $categoriaController= new CategoriasController();

                                $categorias = $categoriaController->listaCategorias();

                                $cont = 0;

                                while($cont < count($categorias)){
                            ?>
                                <option class="letra_slt letras" value="<?=$categorias[$cont]->getCodigo()?>"><?=$categorias[$cont]->getNome()?></option>
                            <?php
                                    $cont++;
                                }
                            ?>
                        </select>

                    </div>
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
                        <div class="camp letras">Categoria</div>
                        <div class="camp letras">Subcategoria</div>
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
                        <div class="letras dados"><?=$listDados[$cont]->getCategoria()?></div>
                        <div class="letras dados"><?=$listDados[$cont]->getNome()?></div>
                        <div class="letras dados">
                            <?=$listDados[$cont]->getStatus()?>
                            <a href="router.php?controller=subcategorias&modo=buscar&id=<?=$listDados[$cont]->getCodigo()?>">
                                <img src="../cms/img/editar.png" alt="img" class="img" title="Editar">
                            </a> 
                            <a href="router.php?controller=subcategorias&modo=excluir&id=<?=$listDados[$cont]->getCodigo()?>">
                                <img src="../cms/img/excluir.png" alt="img" class="img" title="Excluir" onclick="confirm('Tem certeza que deseja excluir este item?')">
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