<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>
            Nossas Lojas   
        </title>
        <link rel="stylesheet" type="text/css" href="../css/padronizacao.css">
        <link rel="stylesheet" type="text/css" href="../css/nossaLojas.css">
        <link href="https://fonts.googleapis.com/css?family=Roboto+Mono&display=swap" rel="stylesheet">
    </head>
    <body>
        <!--  Cabeçalho  -->
       <?php
         if(!file_exists(require_once('header.php')))
         require_once('header.php');  
        ?>
        <!--  Nossas Lojas Título -->
        <div class="nossas_lojas_titulo"> 
           <div class="conteudo center">
               <div class="img_loja">
                  <img src="../img/loja.png" alt="loja" title="loja" class="img">
               </div>
               <h1>
                   Nossas Lojas 
               </h1>
            </div>
        </div>
        <div class="container_endereco_telefone">
            <div class="conteudo center">
                <!-- Coluna 1 -->
                <div class="endereco_telefone">
                   <?php
                     require_once("../bancoDados/conexao.php");
                     
                     $conexao = conexaoMysql();
                   
                     $sql = "SELECT * FROM tbllojas WHERE status <> 0";
                   
                     $select = mysqli_query($conexao, $sql);

                     $sql = "SELECT * FROM tblimglojas WHERE status = 1";

                     $select1 = mysqli_query($conexao, $sql);
                     
                     $rsIcone = mysqli_fetch_array($select1);

                     $icone = $rsIcone['foto'];
                   
                     while($rsLojas = mysqli_fetch_array($select)){
                        
                   ?>
                    <div class="localizacao">
                        <div class="img_localizacao">
                            <img src="../img/<?=$icone?>" class="img" alt="icone_localizacao" title="icone_localizacao">
                        </div>
                        <div class="txt_endereco_loja">
                            <h2>
                                 <?php
                                    echo($rsLojas['endereco'].", ".$rsLojas['cep']);
                                 ?>
                            </h2>  
                            <p> 
                               <?php
                                 echo($rsLojas['cidade']."/".$rsLojas['siglaestado']." ".$rsLojas['telefone']);  
                               ?> 
                           </p>
                        </div>
                   </div>
                   <?php
                      }
                   ?>
                </div> 
            </div>    
        </div>
        <!-- Rodapé -->
         <?php
           if(!file_exists(require_once('footer.php')))
           require_once('footer.php');  
         ?>
    </body>
</html>