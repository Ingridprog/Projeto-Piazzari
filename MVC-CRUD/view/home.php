<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title> SISTEMA EM MVC </title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href="https://fonts.googleapis.com/css?family=Dosis&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Tomorrow&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="view/css/padroniza.css">
    <link rel="stylesheet" type="text/css" href="view/css/home.css">
</head>
<body>
    <!-- Cabeçalho -->
    <?php
        require_once('view/header.php');
    ?>
        <div class="container_menu">
            <div class="conteudo center">
                <h1 class="titulo menu_titulo letra_white">
                    BEM-VINDO, 
                    <?php
                        if(isset($_SESSION['usuario'])){
                            echo(strtoupper($_SESSION['usuario']));
                        }
                    ?>
                </h1>
                <div class="menu">
                    <a href="produtosindex.php">
                        <div class="menu_itens">
                            <div class="menu_icone"><img src="view/img/pizza-icon.png" alt="img" title="Produtos" class="img_icon"></div> 
                            <div class="menu_nome letras letra_white">Produtos</div>    
                        </div>  
                    </a>
                    <a href="categoriasindex.php ">
                        <div class="menu_itens">
                            <div class="menu_icone"><img src="view/img/categorias.png" alt="img" title="Categorias" class="img_icon"></div> 
                            <div class="menu_nome letras letra_white">Categorias</div>    
                        </div>  
                    </a>
                    <a href="subcategoriasindex.php">
                        <div class="menu_itens">
                            <div class="menu_icone"><img src="view/img/subcategorias.png" alt="img" title="Subcategorias" class="img_icon"></div> 
                            <div class="menu_nome letras letra_white">Subcategorias</div>    
                        </div>  
                    </a>
                </div>
                <a href="../paginas/login.php">
                    <div class="sair titulo letra_white center">
                        SAIR         
                    </div>    
                </a>
                
            </div>
        </div>
    <?php
        require_once('view/footer.php');
    ?>
</body>
</html>