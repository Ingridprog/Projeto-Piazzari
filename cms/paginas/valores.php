<?php
   // Editar valores Passo 16 Iniciar a variavel de sessão 
   if(!isset($_SESSION)){
      session_start();
   }
   $codigoNivel = 0;
   // Editar valores Passo 11 Criar a variavel botão que vai ficar no value do botão
   $btnValores = 'salvar';
   $nomeFoto = (string) "";
    
   // Editar valores Passo 02 Verifica se a variavel modo existe
   if(isset($_GET['modo'])){
      // Editar valores 03 Verifica se a variavel modo é igual a editar
      if($_GET['modo'] == 'editar'){
         // Editar valores Passo 04 Importa o arq de conexão
         require_once('../../bancoDados/conexao.php');
         
         // Editar valores Passo 05 Chama a função de conexão
         $conexao = conexaoMysql();
         
         // Editar valores Passo 06 Resgatando a variavel codigo
         $codigo = $_GET['codigo'];
         
         // Editar valores Passo 17 a variavel de sessão recebe o código p/ enviar para o arq salvarUsuario onde vai ser salvo os dados editados
         $_SESSION['codigo'] = $codigo;
         
         // Editar valores Passo 07 script para mandar no bd
         $sql = "SELECT * FROM tblmissavisaovalores WHERE codigo=".$codigo;
         
         // Editar valores Passo 08 executa no bd
         $select = mysqli_query($conexao, $sql);
         
         // Editar valores Passo 09 Verifica se o script foi executado se foi retornará um array
         if($select){
            $rsValoresedit = mysqli_fetch_array($select);
            
            // Editar nossahistoria Passo 10 Resgata os dados de cada campo 
            $textoedit = $rsValoresedit['texto'];
            $id = $rsValoresedit['id'];
            $titulo = $rsValoresedit['titulo'];
            $nomeFoto = $rsValoresedit['foto'];
            $_SESSION['nomeFoto'] = $nomeFoto;

            // Editar valores Passo 13 quando o icone editar for clicado a variavel modo recebe o valor editar e entra aqui para alterar o value do botão
            $btnValores = 'editar';
         }else{
            echo($sql);
         }
         
      }
   }

?>

<!DOCTYPE HTML>

<html lang="pt-br">
   <head>
      <meta charset="utf-8">
      <title> CMS | Gerenciar Sobre </title>
      <link rel="stylesheet" href="../css/valores.css" type="text/css">
      <link href="https://fonts.googleapis.com/css?family=Amatic+SC&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Playfair+Display&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="../css/padronizacao.css" type="text/css">
      <script src="../js/jquery.js"></script>
      <script src="../js/jquery.form.js"></script>
      <script>
            // upload de img passo 01
            $('#fileFoto').live('change', function(){
                $('#frmimg').ajaxForm({
                    target: '#carrega_img' // call back do upload.php
                }).submit();    

            });
      </script>
   </head>
   <body>
        <!-- Cabeçalho -->
        <?php
            if(!file_exists(require_once('header.php')))
            {
               require_once('header.php');
            }
        ?>
        <div id="container_frmvalores">
            <div class="conteudo center">
                <h1 class="texto_fonte">
                    Administração Visão, Missão e Valores 
                </h1>
                <div id="fmr_container" class="center">
                    <form action="../bd/uploadvalores.php" method="post" name="frmicone"  enctype="multipart/form-data" id="frmimg">
                        <div id="container_foto" class="center">
                            <input type="file" name="flefoto" value="" class="texto_fonte" id="fileFoto" required>
                        </div>
                    </form>
                    <!--  Editar valores Passo 14 Colocar as variaveis no value  -->
                    <form action="../bd/salvarvalores.php" method="post" name="frmvalores" id="frm2" class="center">
                        <div class="inputtxt texto_fonte">
                            Imagem: 
                        </div>
                        <div id="carrega_img">
                            <img src="../../img/<?=$nomeFoto?>" id="descarrega_img">
                        </div>
                        <div class="inputtxt texto_fonte">
                            Título: 
                        </div>  
                        <div class="container_inputs">
                            <!-- Editar valores Passo 15 -->
                            <select name="sltvalores" id="slttitulo" class="texto_fonte" required>
                                <?php
                                    if($_GET['modo']){
                                ?>
                                    <option value="<?=$id?>"><?=$titulo?></option>
                                <?php
                                    }
                                    if($id <> 1){
                                ?>
                                    <option value="1"> Missão </option>
                                <?php        
                                    } 
                                    if($id <> 2){
                                ?>
                                    <option value="2"> Visão </option>
                                <?php        
                                    } 
                                    if($id <> 3){
                                ?>
                                    <option value="3"> Valores </option>
                                <?php        
                                    }
                                ?>
                            </select>   
                        </div>   
                        <div class="inputtxt texto_fonte">
                            Texto: 
                        </div>
                        <div class="container_inputs">
                            <textarea name="txttexto" class="texto_fonte" cols="100" rows="10" maxlength="3000" required><?=@$textoedit?></textarea>
                        </div>
                        <div id="btn">
                            <!-- Editar valores Passo 12 colocar o value no botão -->
                            <input type="submit" name="btnvalores" value="<?=$btnValores?>" id="btnvalores" class="texto_fonte">
                        </div>
                    </form>
                </div>
                <div id="container_table" class="center">
                    <div id="container_campos">
                        <div class="campos texto_fonte"> Título </div>
                        <div class="campos texto_fonte"> Imagem </div>
                        <div class="campos texto_fonte"> Texto </div>
                        <div class="campos texto_fonte"> Ações </div>
                    </div>
                    <?php
                        // Exibir valores Passo 01 conectar com o bd
                        require_once('../../bancoDados/conexao.php');

                        // Exibir valores Passo 02 chamar a função de conexão
                        $conexao = conexaoMysql();

                        // Exibir valores Passo 03 Script para executar no BD
                        $sql = "SELECT * FROM tblmissavisaovalores";

                        // Exibir valores Passo 04 para executar no bd
                        $select = mysqli_query($conexao, $sql);

                        // Exibir valores Passo 05 enquanto houver conteudo retorna como array 
                        while($rsValores = mysqli_fetch_array($select)){
                    ?>
                    <div id="container_dados">
                        <div class="dados texto_fonte lineheight"> <?=$rsValores['titulo']?> </div>
                        <div class="dados texto_fonte"> <img src="../../img/<?=$rsValores['foto']?>" class="img_valores"> </div>
                        <div class="dados texto_fonte overflow"> <?=$rsValores['texto']?> </div>
                        <div class="dados texto_fonte">
                           <!-- Editar valores passo 01 -->
                            <a href="valores.php?codigo=<?=$rsValores['codigo']?>&modo=editar">
                                <img src="../img/editar.png" alt="icon" class="icon_valores" title="editar"> 
                            </a>
                            <a 
                                <?php
                                    if($rsValores['status'] == 1){
                                ?>
                                    onclick="alert('Não é possivel excluir!')"  
                                <?php
                                    }else{
                                ?>
                                    href="../bd/deletarvalores.php?modo=excluir&codigo=<?=$rsValores['codigo']?>&nomeFoto=<?=$rsValores['foto']?>" onclick="return confirm('Deseja excluir?');" 
                                <?php
                                    }
                                ?>
                                >
                                <img src="../img/excluir.png" alt="icon" class="icon_valores" title="excluir"> 
                            </a>
                            <!-- ativar/ desativar ícone passo 01 passando o codigo e status via get -->
                            <?php
                                if($rsValores['status'] == 1){
                            ?>
                                <a onclick="alert('Você não desativar este campo! Clique no que deseja ativar')" >
                                    <img src="../img/ativa.png" class="icon_valores" alt="ativa" title="ativa">
                                </a>
                            <?php
                                }else{
                            ?>
                                <a href="../bd/statusvalores.php?codigo=<?=$rsValores['codigo']?>&id=<?=$rsValores['id']?>&status=<?=$rsValores['status']?>">
                                    <img src="../img/desativar.png" class="icon_valores" alt="ativa" title="ativa">
                                </a>
                            <?php
                                }
                            ?>
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
            {
                require_once('footer.php');
            }
        ?>  
   </body>
</html>




