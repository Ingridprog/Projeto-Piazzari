<?php
    // Editar curiosidade Passo 15 Iniciar a variavel de sessão 
    if(!isset($_SESSION)){
        session_start();
    }

    // Editar curiosidade Passo 11 Criar a variavel botão que vai ficar no value do botão
    $btnCuriosidades = 'salvar';
    // imagem Editar p2 
    $nomeFoto = (string) "";

    // Editar curiosidade Passo 02 Verifica se a variavel modo existe
    if(isset($_GET['modo'])){

        // Editar curiosidade 03 Verifica se a variavel modo é igual a editar
        if($_GET['modo'] == 'editar'){

            // Editar curiosidade Passo 04 Importa o arq de conexão
            require_once('../../bancoDados/conexao.php');
            
            // Editar curiosidade Passo 05 Chama a função de conexão
            $conexao = conexaoMysql();
            
            // Editar curiosidade Passo 06 Resgatando a variavel codigo
            $codigo = $_GET['codigo'];

            // Editar curiosidade Passo 16 a variavel de sessão recebe o código p/ enviar para o arq salvarCuriosidade onde vai ser salvo os dados editados
            $_SESSION['codigo'] = $codigo;

            // Editar curiosidade Passo 07 script para mandar no bd
            $sql = "SELECT * FROM tblcuriosidades WHERE codigo=".$codigo;
            
            // Editar curiosidade Passo 08 executa no bd
            $select = mysqli_query($conexao, $sql);
            
            // Editar curiosidade Passo 09 Verifica se o script foi executado se foi retornará um array
            if($select){
                $rsCuriosidadeseditar = mysqli_fetch_array($select);

                // Editar curiosidade Passo 10 Resgata os dados de cada campo 
                $textoedit = $rsCuriosidadeseditar['texto'];
                // imagem Editar p1 Resgatar
                $nomeFoto = $rsCuriosidadeseditar['foto'];
                $_SESSION['nomeFoto'] = $nomeFoto;

                // Editar curiosidade Passo 13 quando o icone editar for clicado a variavel modo recebe o valor editar e entra aqui para alterar o value do botão
                $btnCuriosidades = 'editar';
            }
        }
    }
?>

<!DOCTYPE HTML>

<html lang="pt-br">
   <head>
      <meta charset="utf-8">
      <title>CMS | Adm Curiosidades</title>
      <link rel="stylesheet" href="../css/gerenciarCuriosidades.css" type="text/css">
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
        <div class="container_curiosides">
            <div class="conteudo center">
                <h1 class="texto_fonte"> Administração Curiosidades </h1>
                <div id="container_frm" class="center">
                    <!--  upload de img passo 02 outro formulário -->
                    <form action="../bd/uploadimgCuriosidades.php" enctype="multipart/form-data" method="post" id="frmimg" name="frmfoto" class="center">
                        <input type="file" name="flefoto" value="" class="texto_fonte" id="fileFoto" >  
                    </form>
                    <!--  Editar Curiosidade Passo 14 Colocar as variaveis no value  -->
                    <form action="../bd/salvarCuriosidades.php" method="post" name="frmcuriosidades" id="frmcuriosidades" class="center">
                        <!--  upload de img passo 03 descarrega a img -->
                        <div id="carrega_img" class="center">
                            <img src="../../img/<?=$nomeFoto?>" class="img_editar">
                        </div>
                        <textarea name="txtcuriosidades" class="center" id="texto" cols="100" rows="10" maxlength="3000"required><?=@$textoedit?></textarea>
                        <!-- Editar Curiosidade Passo 12 colocar o value no botão -->
                        <div id="btncuriosidade" class="center">
                            <input type="submit" value="<?=$btnCuriosidades?>" name="btnCuriosidades" id="botao" class="texto_fonte">
                        </div>
                    </form>
                </div>
                
                <div class="container_ver_curiosidades center">
                    <div class="campos_curiosidades_container">
                        <div class="campos_curiosidades texto_fonte">
                            Imagem 
                        </div>
                        <div class="campos_curiosidades_texto texto_fonte">
                            Texto
                        </div>
                        <div class="campos_curiosidades texto_fonte">
                            Ações
                        </div>
                    </div>
                    <?php
                        // ver curiosidades Passo 1 Importar o arquivo de conexão 
                        require_once('../../bancoDados/conexao.php');
        
                        // ver curiosidades Passo 2 Chama a função
                        $conexao = conexaoMysql();

                        // ver curiosidades Passo 3 script     
                        $sql = "SELECT * FROM tblcuriosidades";

                        //ver curiosidades Passo 4 Conecta com o banco e manda o script
                        $select = mysqli_query($conexao, $sql);
                        
                        // ver curiosidades Passo 5 laço que repete enquanto o banco tiver conteúdo
                        while($rsCuriosidades = mysqli_fetch_array($select)){
                    ?>
                    <div class="dados_curiosidades_container texto_fonte">
                        <div class="dados_curiosidades">
                            <img src="../../img/<?=$rsCuriosidades['foto']?>" class="img_curiosidades">
                        </div>
                        <div class="dados_curiosidades_texto texto_fonte">
                            <?=$rsCuriosidades['texto']?>
                        </div>
                        <div class="dados_curiosidades_icons texto_fonte">
                            <div id="container_icons" class="center">
                                <!-- Editar curiosidade Passo 01 mandando o codigo do usuario para o get e mandando o modo  -->
                                <a href="gerenciarCuriosidades.php?modo=editar&codigo=<?=$rsCuriosidades['codigo']?>"> 
                                    <img src="../img/editar.png" alt="editar" title="editar" class="icon_curiosidade"> 
                                </a>
                                <!-- Deletar curiosidade Passo 01 verifica se a variavel modo = excluir e pega o codigo da curiosidade que sera excluido--->
                                <a href="../bd/deletarCuriosidade.php?modo=excluir&codigo=<?=$rsCuriosidades['codigo']?>&nomeFoto=<?=$rsCuriosidades['foto']?>" onclick="return confirm('Deseja excluir?');"> 
                                    <img src="../img/excluir.png" alt="excluir" title="excluir" class="icon_curiosidade"> 
                                </a>
                                <?php
                                    // Ativar/Desativar curiosidade Passo 1 verificar o valor do status p/ exibir os ícones 
                                    if($rsCuriosidades['status'] == 1){
                                ?>
                                    <a href="../bd/statusCuriosidades.php?status=<?=$rsCuriosidades['status']?>&codigo=<?=$rsCuriosidades['codigo']?>">
                                        <img src="../img/ativa.png" alt="ativado" title="ativado" class="icon_curiosidade"> 
                                    </a>
                                <?php
                                    }else{
                                ?>
                                    <a href="../bd/statusCuriosidades.php?status=<?=$rsCuriosidades['status']?>&codigo=<?=$rsCuriosidades['codigo']?>">
                                        <img src="../img/desativar.png" alt="desativado" title="desativado" class="icon_curiosidade"> 
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