<!DOCTYPE HTML>

<html lang="pt-br">
   <head>
      <meta charset="utf-8">
      <title> Sobre Nós </title>
       <link rel="stylesheet" type="text/css" href="../css/padronizacao.css">
       <link rel="stylesheet" type="text/css" href="../css/sobre.css">
      <link href="https://fonts.googleapis.com/css?family=Roboto+Mono&display=swap" rel="stylesheet">
   </head>
   <body>
       <!--  Cabeçalho  -->
       <?php
         if(!file_exists(require_once('header.php')))
         require_once('header.php');  
        ?>
       <!-- Imagem fixada -->
       <?php
            require_once("../bancoDados/conexao.php");
                     
            $conexao = conexaoMysql();
          
            $sql = "SELECT * FROM tbltoposobre WHERE status <> 0";
          
            $select = mysqli_query($conexao, $sql);
          
            while($rstopo = mysqli_fetch_array($select)){
        ?>
      <div class="img_sobre_nos" style = "background-image: url(../img/<?=$rstopo['foto']?>);"></div>
      <?php
            }
      ?>
      <div id="container_sobre_nos">
        <div class="conteudo center">
            <?php
               require_once("../bancoDados/conexao.php");
                     
               $conexao = conexaoMysql();
             
               $sql = "SELECT * FROM tblmissavisaovalores WHERE status <> 0 ORDER BY id";
             
               $select = mysqli_query($conexao, $sql);
             
               while($rsvalores = mysqli_fetch_array($select)){
            ?>
            <!-- Área de Missão -->
           <div class="box float-shadow">
              <div class="titulo_sobre_nos center"> <?=$rsvalores['titulo']?> </div>
              <div class="img_visao_missao_valores center">
                 <img src="../img/<?=$rsvalores['foto']?>" alt="missao" class="img"  title="Missão">
              </div>
               <p class="missao_visao_valores_txt center">
                  <?=$rsvalores['texto']?>
               </p>   
           </div>
           <?php
               }
           ?>
        </div> 
      </div>
       <!-- Área nossa história  -->
      <div class="historia">
         <div class="conteudo center"> 
            <h1> NOSSA HISTÓRIA </h1>
            <?php
               require_once("../bancoDados/conexao.php");
                     
               $conexao = conexaoMysql();
             
               $sql = "SELECT * FROM tblsobrenossahistoria WHERE status <> 0";
             
               $select = mysqli_query($conexao, $sql);
             
               while($rshistoria = mysqli_fetch_array($select)){   
            ?>
            <div id="txt_historia" class="float">
               <p>
                  <?=$rshistoria['texto']?>
               </p>
            </div>
            <div id="foto_historia" class="float">
               <img src="../img/<?=$rshistoria['foto']?>" class="img" alt="Foto_historia" title="nossa_Historia">
            </div>
            <?php
               }
            ?>
         </div>
      </div>
<!-- Rodapé -->
       <?php
         if(!file_exists(require_once('footer.php')))
         require_once('footer.php');  
        ?>
   </body> 
</html>