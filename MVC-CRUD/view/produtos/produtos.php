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
    <script src="view/js/jquery.js"></script>
    <script src="view/js/jquery.form.js"></script>
    <script>
        $(document).ready(function(){
                $('#sltcat').live('change', function(){
                    $('#frmselect').ajaxForm({
                        target: '#sub'
                }).submit();
            });
        });
    </script>
</head>
<body>
<form action="router.php?modo=porcategoria&controller=subcategorias" method="post" name="frmselect" id="frmselect">
    <label> Categoria </label><br>
    
    <select name="sltcat" id="sltcat">
        <option value="">SELECIONEEEE...</option>
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
    </select><br><br>
</form>
<form action="router.php?modo=novo&controller=produtos" id="" name="frmprodutos" method="post">
    <label> Subcategorias </label><br>
    <div id="sub">
            
    </div>
    
    <label> Nome </label><br>
    <input type="text" name="txtnome" value=""><br><br>

    <label > preço: </label><br>
    <input type="number_format" name="frmpreco" value=""><br><br>

    <label>decrição </label><br>
    <textarea name="txtdescricao" cols="30" rows="10"></textarea><br><br>

    <label>Destaque </label><br>
    <input type="checkbox" value="" name="chkdestaque"><br><br>

    <label> Introdução destaque: </label><br>
    <textarea name="txtdestaqueintro" cols="30" rows="10"></textarea><br><br>

    <label> Descrição destaque: </label><br>
    <textarea name="txtdestaque" cols="30" rows="10"></textarea><br><br>

    <label> Desconto: </label><br>
    <input type="number_format" name="frmdesconto" value=""><br><br>

    <input type="submit" name="btnsave" value="Salvar">

</form>  
</body>
</html>

