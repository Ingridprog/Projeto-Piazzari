<?php
   // Editar nossahistoria Passo 15 Iniciar a variavel de sessão 
   if(!isset($_SESSION)){
      session_start();
   }
   $codigoNivel = 0;
   // Editar nossahistoria Passo 11 Criar a variavel botão que vai ficar no value do botão
   $btnHistoria = 'salvar';
   $nomeFoto = (string) "";
    
   // Editar nossahistoria Passo 02 Verifica se a variavel modo existe
   if(isset($_GET['modo'])){
      // Editar nossahistoria 03 Verifica se a variavel modo é igual a editar
      if($_GET['modo'] == 'editar'){
         // Editar nossahistoria Passo 04 Importa o arq de conexão
         require_once('../../bancoDados/conexao.php');
         
         // Editar nossahistoria Passo 05 Chama a função de conexão
         $conexao = conexaoMysql();
         
         // Editar nossahistoria Passo 06 Resgatando a variavel codigo
         $codigo = $_GET['codigo'];
         
         // Editar nossahistoria Passo 16 a variavel de sessão recebe o código p/ enviar para o arq salvarUsuario onde vai ser salvo os dados editados
         $_SESSION['codigohistoria'] = $codigo;
         
         // Editar nossahistoria Passo 07 script para mandar no bd
         $sql = "SELECT * FROM tblsobrenossahistoria WHERE codigo=".$codigo;
         
         // Editar nossahistoria Passo 08 executa no bd
         $select = mysqli_query($conexao, $sql);
         
         // Editar nossahistoria Passo 09 Verifica se o script foi executado se foi retornará um array
         if($select){
            $rshistoriaedit = mysqli_fetch_array($select);
            
            // Editar nossahistoria Passo 10 Resgata os dados de cada campo 
            $textoedit = $rshistoriaedit['texto'];
            // imagem Editar p1 Resgatar
            $nomeFoto = $rshistoriaedit['foto'];
            $_SESSION['nomeFoto'] = $nomeFoto;

            // Editar nossahistoria Passo 13 quando o icone editar for clicado a variavel modo recebe o valor editar e entra aqui para alterar o value do botão
            $btnHistoria = 'editar';
         }else{
            echo($sql);
         }
         
      }
   }

?>

<!DOCTYPE html>
<html lang="pt-br">
   <head>
      <meta charset="utf-8">
      <title> CMS | Gerenciar Sobre </title>
      <link rel="stylesheet" href="../css/gerenciarSobre.css" type="text/css">
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
        <div id="container_frm_nossahistoria">
            <div class="conteudo center">
                <h1 class="texto_fonte center">
                    Administrar Nossa História 
                </h1>
                <div id="container_frm" class="center">
                    <!--  upload de img passo 02 outro formulário -->
                    <form action="../bd/uploadimgnossahistoria.php" method="post" id="frmimg" name="frmfoto" class="center" enctype="multipart/form-data">
                        <input type="file" name="flefoto" value="" class="texto_fonte" id="fileFoto" >  
                    </form>
                    <!--  Editar nossahistoria Passo 14 Colocar as variaveis no value  -->
                    <form action="../bd/salvarSobrenossahistoria.php" method="post" name="frmnossahistoria" id="frmnossahistoria" class="center">
                        <!--  upload de img passo 03 descarrega a img -->
                        <div id="carrega_img" class="center">
                            <img src="../../img/<?=$nomeFoto?>" class="img_editar">
                        </div>
                        <textarea name="txtnossahistoria" class="center" id="texto" cols="100" rows="10" maxlength="3000"required><?=@$textoedit?></textarea>
                        <!-- Editar nossahistoria Passo 12 colocar o value no botão -->
                        <div id="btnnossahistoria" class="center">
                            <input type="submit" value="<?=$btnHistoria?>" name="btnnossahistoria" id="botao" class="texto_fonte">
                        </div>
                    </form>
                </div>

                <div class="container_ver_nossahistoria center">
                    <div class="campos_nossahistoria_container">
                        <div class="campos_nossahistoria texto_fonte">
                            Imagem 
                        </div>
                        <div class="campos_nossahistoria_texto texto_fonte">
                            Texto
                        </div>
                        <div class="campos_nossahistoria texto_fonte">
                            Ações
                        </div>
                    </div>
                    <?php
                        // Exibir nossahistoria Passo 01 conectar com o bd
                        require_once('../../bancoDados/conexao.php');
                    
                        // Exibir nossahistoria Passo 02 chamar a função de conexão
                        $conexao = conexaoMysql();
                    
                        // Exibir nossahistoria Passo 03 Script para executar no BD
                        $sql = "SELECT * FROM tblsobrenossahistoria";
                    
                        // Exibir nossahistoria Passo 04 para executar no bd
                        $select = mysqli_query($conexao, $sql);
                        
                        // Exibir nossahistoria Passo 05 enquanto houver conteudo retorna como array 
                        while($rshistoria = mysqli_fetch_array($select)){
                    ?>
                    <div class="dados_nossahistoria_container texto_fonte">
                        <div class="dados_nossahistoria">
                            <img src="../../img/<?=$rshistoria['foto']?>" class="img_curiosidades">
                        </div>
                        <div class="dados_nossahistoria_texto texto_fonte">
                           <?=$rshistoria['texto']?> 
                        </div>
                        <div class="dados_nossahistoria_icons texto_fonte">
                            <div id="container_icons" class="center">
                                <!-- Editar nossahistoria passo 01 -->
                                <a href="nossahistoriaSobre.php?codigo=<?=$rshistoria['codigo']?>&modo=editar">
                                    <img src="../img/editar.png" alt="icon" class="icon_nossahistoria" title="editar"> 
                                </a>
                                <!-- Excluir nossahistoria passo 01 -->
                                <a 
                                   <?php
                                       if($rshistoria['status'] == 1){
                                   ?>
                                       onclick="alert('Não é possivel excluir!')"  
                                   <?php
                                       }else{
                                    ?>
                                       href="../bd/deletarnossahistoria.php?modo=excluir&codigo=<?=$rshistoria['codigo']?>&nomeFoto=<?=$rshistoria['foto']?>" onclick="return confirm('Deseja excluir?');" 
                                   <?php
                                       }
                                   ?>
                                   >
                                    <img src="../img/excluir.png" alt="icon" class="icon_nossahistoria" title="excluir"> 
                                </a>
                                 <!-- ativar/ desativar ícone passo 01 passando o codigo e status via get -->
                                    <?php
                                        if($rshistoria['status'] == 1){
                                    ?>
                                    <a onclick="alert('Você não desativar este campo! Clique no que deseja ativar')" >
                                        <img src="../img/ativa.png" class="icon_nossahistoria" alt="ativa" title="ativa">
                                    </a>
                                    <?php
                                        }else{
                                    ?>
                                    <a href="../bd/statusnossahistoriaSobre.php?status=<?=$rshistoria['status']?>&codigo=<?=$rshistoria['codigo']?>">
                                        <img src="../img/desativar.png" class="icon_nossahistoria" alt="ativa" title="ativa">
                                    </a>
                                    <?php
                                        }
                                    ?>
                            </div>
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