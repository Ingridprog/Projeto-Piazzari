<!DOCTYPE html>

<html lang="pt">
   <head>
        <meta charset="utf-8">
        <title>
            CMS
        </title>
        <link href="https://fonts.googleapis.com/css?family=Amatic+SC&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Playfair+Display&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="../css/padronizacao.css">
    </head>
    <body>
        <!-- Cabeçalho -->
        <?php
            if(!file_exists(require_once('header.php')))
            {
                require_once('header.php');
            }
        ?>
        <!--  Conteudo a ser admistrado -->
        <div id="conteudo_para_adm">
            <div class="conteudo center">
                <div class="conteudo_adm_container"> 
                     <img src="../img/icon_adm.png">
                     <a href=""> 
                        <p> Conteudo Administrado </p>
                     </a>
                </div>
               <div class="conteudo_adm_container"> 
                     <img src="../img/icon_adm.png">
                     <a href=""> 
                        <p> Conteudo Administrado </p>
                     </a>
                </div>
               <div class="conteudo_adm_container"> 
                     <img src="../img/icon_adm.png">
                     <a href=""> 
                        <p> Conteudo Administrado </p>
                     </a>
                </div>
               <div class="conteudo_adm_container"> 
                     <img src="../img/icon_adm.png">
                     <a href=""> 
                        <p> Conteudo Administrado </p>
                     </a>
                </div>
               <div class="conteudo_adm_container"> 
                     <img src="../img/icon_adm.png">
                     <a href=""> 
                        <p> Conteudo Administrado </p>
                     </a>
                </div>
            </div>
        </div>
        <!-- Rodapé -->
        <?php
            if(!file_exists(require_once('footer.php')))
            {
                require_once('footer.php');
            }
        ?>
    </body>
</html>