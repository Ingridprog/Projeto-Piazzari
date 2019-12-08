<?php
   // Editar nível Passo 11 Criar a variavel botão que vai ficar no value do botão
   $btnNivel = 'criar';
   $checked1 = "";
   $checked2 = "";
   $checked3 = "";

   // Editar nível Passo 15 Iniciar a variavel de sessão
   if(!isset($_SESSION)){
      session_start();
   }

   // Editar nível Passo 02 Verifica se a variavel modo existe
   if(isset($_GET['modo'])){
      
      // Editar nível 03 Verifica se a variavel modo é igual a editar
      if($_GET['modo'] == 'editar'){
         
          // Editar nível Passo 04 Importa o arq de conexão
          require_once("../../bancoDados/conexao.php");
         
         // Editar nível Passo 05 Chama a função de conexão
         $conexao = conexaoMysql();
         
          // Editar nível Passo 06 Resgatando a variavel codigo
          $codigoNivel = $_GET['codigo'];
         
         // Editar nível Passo 16 a variavel de sessão recebe o código p/ enviar para o arq salvarNivel onde vai ser salvo os dados editados
         $_SESSION['codigoNivel'] = $codigoNivel;
         
         // Editar nível Passo 07 script para mandar no bd
         $sql = "SELECT * FROM tblniveis WHERE codigo=".$codigoNivel;
         
         // Editar nível Passo 08 executa no bd
         $select = mysqli_query($conexao, $sql);
         
         // Editar nível Passo 09 Verifica se o script foi executado se foi retornará um array
         if($select){
            $rsNiveis = mysqli_fetch_array($select);
            
            // Editar nível Passo 10 Resgata os dados de cada campo 
            $nome = $rsNiveis['descricao'];
            $administracaoConteudo = $rsNiveis['administracaoConteudo'];
            $administracaoUsuario = $rsNiveis['administracaoUsuario'];
            $administracaoFaleConosco = $rsNiveis['administracaoFaleConosco'];
            
            // verifica as permissões ativas
            if($administracaoConteudo == 1){
               $checked1 = 'checked';
            }
            if($administracaoFaleConosco == 1){
               $checked2 = 'checked';
            }
            if($administracaoUsuario == 1){
               $checked3 = 'checked';
            }
            
            // Editar nível Passo 13 quando o icone editar for clicado a variavel modo recebe o valor editar e entra aqui para alterar o value do botão
            $btnNivel = 'editar';
         }else{
            echo($sql);
         }
      }
   }
?>

<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <title>
            CMS | Níveis de Usuários
        </title>
        <link href="https://fonts.googleapis.com/css?family=Amatic+SC&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Playfair+Display&display=swap" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="../css/padronizacao.css">
        <link type="text/css" rel="stylesheet" href="../css/gerenciarNiveis.css">
       <script src="../../js/jquery.js"></script>
        <script src="../../js/ancora.js"></script>
    </head>
    <body>
        <!-- Cabeçalho -->
        <?php
            if(!file_exists(require_once('header.php')))
            {
                require_once('header.php');
            }
        ?>
        <!-- Container do Cadastrar Níveis -->
        <div id="container_cadastrar_niveis">
           <div class="conteudo_gerenciar_niveis center">
               <div id="container_menu_titulo">
                    <!-- Título -->
                   <h1 class="texto_fonte" id="titulo_cadastrar_nivel"> Cadastrar Níveis </h1>
                   <!-- Menu -->
                   <div id="redirecina_gerenciar_niveis">
                       <a href="#titulo_gerenciar_nivel"> <p class="letra_fonte">
                           Clique aqui para Gerenciar Níveis
                          </p> </a>     
                   </div>
               </div>
               <div id="container_frmcadastrarnivel" class="center">
                    <div id="icone_gerenciar_niveis">
                        <img src="../img/niveis.png" alt="Hierarquia Niveis" class="img">
                    </div>
                   <!-- Formulário Cadastrar Nível -->
                    <form action="../bd/salvarNivel.php" method="post" id="frm_cadastrar_nivel">
                       <!--  Editar nível Passo 14 Colocar as variaveis no value  -->
                        <div id="campo_cadastrar_nome">
                            <p>Nome:</p>
                            
                            <input type="text" name="txtnome" value="<?=@$nome?>" id="campo_cadastrar_nome_container" required>
                        </div>
                        <h3 id="permissoes"> Permissões </h3>
                        <div id="container_permissoes" class="center">
                             <div class="chk_permissoes">
                                <input type="checkbox" name="chkadmconteudo" value="1" <?=$checked1?> class="chk_container">
                                <p> Administração de conteúdo </p>
                             </div>
                       
                             <div class="chk_permissoes">
                                <input type="checkbox" name="chkadmusuarios" value="1" <?=$checked3?> class="chk_container">
                                <p> Administração de Usuários </p>
                             </div>
                             
                             <div class="chk_permissoes">
                                <input type="checkbox" name="chkadmfaleconosco" value="1" <?=$checked2?> class="chk_container">
                                <p> Administração do Fale Conosco </p>
                             </div>
                        </div>
                       <div id="btn_cadastrar_nivel" class="center">
                          <!-- Editar nível Passo 12 colocar o value no botão -->
                            <input type="submit" value="<?=$btnNivel?>" name="btncadastrarnivel" id="btn_nivel">
                       </div>
                    </form> 
               </div>
           </div>
        </div>
        <!-- Container Gerenciar Níveis  -->
        <div id="container_gerenciar_niveis">
            <div class="conteudo_gerenciar_niveis center">
                <div id="menu_titulo" class="center">
                    <!-- Título -->
                    <h1 class="texto_fonte" id="titulo_gerenciar_nivel"> Gerenciar Níveis de Usuário </h1>
                </div>
                <!-- Tabela -->
                <div id="tabela_gerenciar_nivel" class="center">
                    <div id="container_nome_campos_gerenciar_nivel">
                        <div class="nome_campos_gerenciar_niveis_des texto_fonte"> Nome </div>
                        <div class="nome_campos_gerenciar_niveis texto_fonte"> Adm Conteúdo </div>
                        <div class="nome_campos_gerenciar_niveis texto_fonte"> Adm Usuários </div>
                        <div class="nome_campos_gerenciar_niveis texto_fonte"> Adm Fale Conosco </div>
                        <div class="nome_campos_gerenciar_niveis texto_fonte"> Ações </div>
                        <div class="nome_campos_gerenciar_niveis texto_fonte"> Ativar | Desativar </div>
                    </div>
                   <!-- exibirNiveis Passo 1 criar o laço para pegar os dados -->
                     <?php
                        require_once('../../bancoDados/conexao.php');
                        
                        $conexao = conexaoMysql();   
                   
                        $sql = 'select * from tblniveis';
                   
                        $select = mysqli_query($conexao, $sql);
                   
                        while($rsNiveisExibir = mysqli_fetch_array($select)){
                     ?>
                   
                    <div id="container_dados_gerenciar_niveis">
                        <div class="dados_gerenciar_niveis_des"><?=$rsNiveisExibir['descricao'];?></div>
                        <div class="dados_gerenciar_niveis"><?=$rsNiveisExibir['administracaoConteudo'];?></div>
                        <div class="dados_gerenciar_niveis"><?=$rsNiveisExibir['administracaoUsuario'];?></div>
                        <div class="dados_gerenciar_niveis"><?=$rsNiveisExibir['administracaoFaleConosco'];?></div>
                        <div class="dados_gerenciar_niveis">
                            <div class="icones center">
                                <!-- Editar niveis Passo 01 mandando o codigo do usuario para o get e mandando o modo  -->
                                <a href="gerenciarNiveis.php?codigo=<?=$rsNiveisExibir['codigo']?>&modo=editar">
                                    <img src="../img/EditarUser.png" alt="icon" class="img_user" title="editar"> 
                                </a>
                            </div>
                        </div>
                        <div class="dados_gerenciar_niveis">
                           <?php
                              // Ativar/Desativar Passo 1 verificar o valor do status p/ exibir os ícones 
                              if($rsNiveisExibir['status'] == 1){ 
                           ?>
                           <!-- Ativar/Desativar Passo 2 mandar o valor do status e código do nível via get para o arq do statusUsuario.php --> 
                              <a <?php
                                    if($rsNiveisExibir['codigo'] == $_SESSION['nivelcod']){
                                 ?>
                                    onclick="alert('Você não pode desativar seu nível!')"
                                 <?php  
                                    }else{
                                 ?>
                                    href="../bd/statusNivel.php?status=<?=$rsNiveisExibir['status']?>&codigo=<?=$rsNiveisExibir['codigo']?>"
                                 <?php
                                    }
                                 ?>
                                 >
                                 <img src="../img/ativar.png" alt="icon" class="img_user" title="desativar"> 
                              </a>
                           <?php
                              }else{
                           ?>
                              <a href="../bd/statusNivel.php?status=<?=$rsNiveisExibir['status']?>&codigo=<?=$rsNiveisExibir['codigo']?>">
                                 <img src="../img/desativar.png" alt="icon" class="img_user" title="ativar"> 
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