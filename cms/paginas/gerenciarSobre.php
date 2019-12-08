<!DOCTYPE HTML>

<html lang="pt-br">
   <head>
      <meta charset="utf-8">
      <title> CMS | Gerenciar Sobre </title>
      <link rel="stylesheet" href="../css/gerenciarSobre.css" type="text/css">
      <link href="https://fonts.googleapis.com/css?family=Amatic+SC&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Playfair+Display&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="../css/padronizacao.css" type="text/css">
   </head>
   <body>
        <!-- Cabeçalho -->
        <?php
            if(!file_exists(require_once('header.php')))
            {
               require_once('header.php');
            }
        ?>
        <div id="container_menu_sobre">
            <div class="conteudo center">
               <h1 class="texto_fonte center"> Componentes da Página Sobre</h1>
               <div id="container_menu" class="center">
                  <a href="topoSobre.php">
                     <div class="menu_itens texto_fonte">
                        Topo da Página
                     </div>
                  </a>
                  <a href="valores.php">
                     <div class="menu_itens texto_fonte">
                        Missão, visão, valores 
                     </div>
                  </a>
                  <a href="nossahistoriaSobre.php">
                     <div class="menu_itens texto_fonte">
                        Nossa História  
                     </div>
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