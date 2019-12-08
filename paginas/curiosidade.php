<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>
            Curiosidades
        </title>
        <link rel="stylesheet" type="text/css" href="../css/padronizacao.css">
        <link rel="stylesheet" type="text/css" href="../css/curiosidades.css">
       <link href="https://fonts.googleapis.com/css?family=Roboto+Mono&display=swap" rel="stylesheet">
    </head>
    <body>
        <!-- Cabecalho -->
         <?php
        if(!file_exists(require_once('header.php')))
        require_once('header.php');  
        ?>  
        <!-- Título -->
        <div id="curiosidades_titulo">
            <h1 class="center"> Curiosidades </h1>
        </div>
        <?php
            $cont = 0;
            require_once("../bancoDados/conexao.php");
                     
            $conexao = conexaoMysql();
          
            $sql = "SELECT * FROM tblcuriosidades WHERE status <> 0";
          
            $select = mysqli_query($conexao, $sql);
          
            while($rsCuriosidades = mysqli_fetch_array($select)){

                $cont++;
        ?>
        <!-- 1° Linha de curiosidades -->
        <?php
            if($cont % 2 == 0){
        ?>
        <div class="curiosidades_conteudo_claro">
            <div class="conteudo center">
                <div class="texto_curiosidades_claro">
                     <p>
                        <?=$rsCuriosidades['texto']?>
                    </p>
                </div>
                <div class="imagem_curiosidades">
                    <img src="../img/<?=$rsCuriosidades['foto']?>" alt="img_curiosidades" title="curiosidades" class="img">
                </div>
            </div>
       </div>
       <?php
            }else{
       ?>
        <!-- 2° Linha de curiosidades -->
       <div class="curiosidades_conteudo_escuro">
            <div class="conteudo center">
                <div class="imagem_curiosidades">
                    <img src="../img/<?=$rsCuriosidades['foto']?>" alt="img_curiosidades" title="curiosidades" class="img">
                </div>
                <div class="texto_curiosidades_claro">
                     <p>
                        <?=$rsCuriosidades['texto']?>
                    </p>
                </div>
            </div>
       </div>
       <?php
            }
        }
       ?> 
        <!-- Rodapé -->
         <?php
           if(!file_exists(require_once('footer.php')))
           require_once('footer.php');  
         ?>
    </body>
</html>