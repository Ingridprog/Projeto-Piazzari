<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>CMS | RELACIONAMENTOS</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href="https://fonts.googleapis.com/css?family=Dosis&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Tomorrow&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="view/css/padroniza.css">
    <link rel="stylesheet" type="text/css" href="view/css/relacionamentos.css">
    <link href="view/css/categorias.css" rel="stylesheet" type="text/css">
</head>
<body>
    <?php
        require_once('view/header.php');
    ?>
    <div class="container_rel">
        <div class="conteudo center">
            <h1 class="titulo texto_center titulo_principal">
                Administração de Produtos
            </h1>
            <h1 class="titulo letra_white titulo_categoria center">
                CRIE RELACIONAMENTOS
            </h1>
            <form action="" method="post" name="frmrel" id="frmrel" class="center">
                <div class="rel_form center">
                    <div class="rel_camp float-left letras">Categorias:</div>
                    <select name="sltcat" id="sltcat" class="stl letras">
                        <option value="" class="letras font-size">Selecione</option>
                    </select>
                </div>
                <div class="rel_form center">
                    <div class="rel_camp float-left letras">SubCategorias:</div>
                    <select name="sltsubcat" id="sltsubcat" class="stl letras">
                        <option value="" class="letras font-size">Selecione</option>
                    </select>
                </div>
                <div class="rel_form center">
                    <div class="rel_camp float-left letras">Produtos:</div>
                    <select name="sltproduto" id="sltproduto" class="stl letras">
                        <option value="" class="letras font-size">Selecione</option>
                    </select>
                </div>
                <div class="btn_rel center">
                    <input type="submit" name="btn_rel" value="Salvar" id="btn_rel" class="letras font-size">
                </div>
            </form>
        </div>
    </div>
    <?php
        require_once('view/footer.php');
    ?>
</body>
</html>