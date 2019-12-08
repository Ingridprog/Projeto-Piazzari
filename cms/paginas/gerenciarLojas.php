<?php
   // Editar endereço Passo 15 Iniciar a variavel de sessão 
   if(!isset($_SESSION)){
      session_start();
   }

   // Editar endereço Passo 11 Criar a variavel botão que vai ficar no value do botão
   $btnLojas = 'cadastrar';
   $btnicones = 'salvar';
   $nomefoto = 'b.jpg';

   // Editar endereço Passo 02 Verifica se a variavel modo existe
   if(isset($_GET['modo'])){
       // Editar endereço 03 Verifica se a variavel modo é igual a editar
       if($_GET['modo'] == 'editar'){
          // Editar endereço Passo 04 Importa o arq de conexão
          require_once('../../bancoDados/conexao.php');
          
          // Editar endereço Passo 05 Chama a função de conexão
          $conexao = conexaoMysql();
          
          // Editar endereço Passo 06 Resgatando a variavel codigo
          $codigo = $_GET['codigo'];
          
          // Editar imagem verifica qual o formulario Passo 02
          if($_GET['form'] == 'icone'){
            $sql= "SELECT * FROM tblimglojas WHERE codigo=".$codigo;  
            
            $select = mysqli_query($conexao, $sql);

            // Editar imagem variavel de sessão para mandar o codigo para o salvarImgLojas
            $_SESSION['codicone'] = $codigo;

            if($select){
               $rsIcones = mysqli_fetch_array($select);
               $nomefoto = $rsIcones['foto'];
               $btnicones = 'editar';
               // Editar imagem variavel de sessão para mandar o nome da foto que vai ser editada
               $_SESSION['nomeFoto'] = $nomefoto;
            }else{
               echo($sql);
            }
          }else{
               // Editar endereço Passo 16 a variavel de sessão recebe o código p/ enviar para o arq salvarLojas onde vai ser salvo os dados editados
               $_SESSION['codigoLoja'] = $codigo; 

               // Editar endereço Passo 07 script para mandar no bd
               $sql= "SELECT * FROM tbllojas WHERE codigo=".$codigo;
               
               // Editar endereço Passo 08 executa no bd
               $select = mysqli_query($conexao, $sql);
               
               // Editar endereço Passo 09 Verifica se o script foi executado se foi retornará um array
               if($select){
                  $rsEnderecos = mysqli_fetch_array($select);
                  
                  // Editar endereço Passo 10 Resgata os dados de cada campo
                  $endereco = $rsEnderecos['endereco'];
                  $cep = $rsEnderecos['cep'];
                  $cidade = $rsEnderecos['cidade'];
                  $siglaestado = $rsEnderecos['siglaestado'];
                  $telefone = $rsEnderecos['telefone'];
                  
                  // Editar endereço Passo 13 quando o icone editar for clicado a variavel modo recebe o valor editar e entra aqui para alterar o value do botão
                  $btnLojas = 'editar'; 
                  
               }else{
                  echo($sql);
               }
          }
          
       }
   }
?>

<!DOCTYPE html>

<html>
    <head>
        <title>
            CMS | Nossas Lojas
        </title>
       <link rel="stylesheet" href="../css/gerenciarLojas.css" type="text/css">
       <link href="https://fonts.googleapis.com/css?family=Amatic+SC&display=swap" rel="stylesheet">
       <link href="https://fonts.googleapis.com/css?family=Playfair+Display&display=swap" rel="stylesheet">
       <link rel="stylesheet" href="../css/padronizacao.css" type="text/css">
       <script src="../js/jquery.js"></script>
       <script src="../js/jquery.form.js"></script>
       <script>
         // Upload de img Passo 02
         $('#fileFoto').live('change', function(){
              $('#formFoto').ajaxForm({
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
       <!-- Upload de img Passo 01 -->
       <div id="container_formulario_img">
         <div class="conteudo center">
            <h1 class="texto_fonte center">Administração Nossas Lojas </h1>
            <h2 class="texto_fonte center "> Selecione um ícone </h2>
            <div class="container_formularios center">
               <form name="frmfoto" class="center" id="formFoto" method="post" action="../bd/uploadimgLojas.php" enctype="multipart/form-data">     
                  <div class="txt_input texto_fonte"> Imagem: </div>
                  <div class="caixa_input"><input type="file" name="flefoto" value="" class="caixa_campos texto_fonte" id="fileFoto"> </div>
                  <div id="carrega_img" class="center">
                        <img src="../../img/<?=$nomefoto?>" class="img_editar">    
                  </div>
               </form>
               <form action="../bd/salvarImgLojas.php" method="post" name="frmbotao">
                  <div id="btnimg" class="center">
                     <input type="submit" value="<?=$btnicones?>" class="texto_fonte" name="btnsalvarimglojas" id="btnimglojas">
                  </div>
               </form>
            </div>
            <div id="container_icones_lojas" class="center">
               <div class="container_campos_icones">
                  <div class="campos_icones_lojas texto_fonte"> Código </div>
                  <div class="campos_icones_lojas texto_fonte"> Imagem </div>
                  <div class="campos_icones_lojas texto_fonte"> Ações </div>
               </div>
               <?php
                  // Exibir Imagem passo 01 importa o arq de conexão
                  require_once('../../bancoDados/conexao.php');

                  // Exibir Imagem passo 02 chama a função
                  $conexao = conexaoMysql();

                  // Exibir Imagem passo 03 script para o bd  
                  $sql = "SELECT * FROM tblimglojas";

                  // Exibir Imagem passo 04 Executa 
                  $select = mysqli_query($conexao, $sql);

                  // Exibir Imagem passo 05 transforma em array   
                  while($rsIcones = mysqli_fetch_array($select)){
               ?>
               <div class="container_campos_icones_cadastrados">
                  <div class="icones_cadastrados texto_fonte"><?=$rsIcones['codigo']?></div>
                  <div class="icones_cadastrados"><img src="../../img/<?=$rsIcones['foto']?>" class="img_icone"></div>
                  <div class="icones_cadastrados">
                     <div class="float-left container_acoes">
                        <!-- Editar imagem passo 01 mandar o modo, qual formulario e codigo via get-->
                        <a href="gerenciarLojas.php?modo=editar&codigo=<?=$rsIcones['codigo']?>&form=icone">
                        <img src="../img/editar.png" class="tamanho-acoes" alt="editar" title="editar">
                        </a>
                     </div>
                     <div class="float-left container_acoes">
                        <!-- Excluir imagem passo 01 -->
                        <a onclick="return confirm('Deseja realmente excluir? ');" href="../bd/deletarIconelojas.php?modo=excluir&codigo=<?=$rsIcones['codigo'] ?>&nomeFoto=<?=$rsIcones['foto']?>">
                           <img src="../img/excluir.png" class="tamanho-acoes" alt="excluir" title="excluir">
                        </a>
                     </div>
                     <div class="float-left container_acoes">
                        <!-- ativar/ desativar ícone passo 01 passando o codigo e status via get -->
                        <?php
                           if($rsIcones['status'] == 1){
                        ?>
                           <a onclick="alert('Você não desativar todos os ícones! Clique no que deseja ativar')" >
                              <img src="../img/ativa.png" class="tamanho-acoes" alt="ativa" title="ativa">
                           </a>
                        <?php
                           }else{
                        ?>
                           <a href="../bd/statusIconeLojas.php?status=<?=$rsIcones['status']?>&codigo=<?=$rsIcones['codigo']?>">
                              <img src="../img/desativar.png" class="tamanho-acoes" alt="ativa" title="ativa">
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
        <div id="container_frmLojas">
           <div class="conteudo center">
              <h1 class="center texto_fonte titulo_lojas"> Cadastro de Lojas </h1>
               <form method="post" action="../bd/salvarLojas.php" name="frmLojas" id="frmLojas" class="center">
                  <!--  Editar endereço Passo 14 Colocar as variaveis no value  -->
                  <div class="input_maior center"> 
                     <div class="input_campo_nome texto_fonte"> 
                        Endereço: 
                     </div>
                     <div class="input_campo_maior">
                        <input type="text" name="txtendereco" value="<?=@$endereco?>" required maxlength="70" size="70" class="input_campo texto_fonte">
                     </div>   
                  </div>
                  <div class="input_maior center">
                     <div class="input_campo_nome texto_fonte"> 
                        CEP: 
                     </div>
                     <div class="input_media">
                        <input type="text" name="txtcep" value="<?=@$cep?>" required maxlength="9" size="9" class="input_media_campo texto_fonte">
                     </div> 
                     
                     <div class="input_campo_nome texto_fonte"> 
                        Cidade: 
                     </div>
                     <div class="input_media">
                        <input type="text" name="txtcidade" value="<?=@$cidade?>" required maxlength="20" size="20" class="input_media_campo">
                     </div>
                  </div>
                  <div class="input_maior center">
                     <div class="input_campo_nome texto_fonte">
                        Sigla:
                     </div>
                     <div class="input_media">
                        <input type="text" name="txtsiglaestado" value="<?=@$siglaestado?>" required maxlength="2" size="2" class="input_media_campo">
                     </div>
                     <div class="input_campo_nome texto_fonte">
                        Telefone:
                     </div>  
                     <div class="input_media">
                        <input  onkeypress="return mascaraFone(this, event);" type="text" maxlength="15" name="txttelefone" size="15" id="tel" value="<?=@$telefone?>" class="input_media_campo">
                     </div>
                  </div>
                  <div class="input_maior center">
                     <div id="botaoLojas" class="center">
                        <!-- Editar endereco Passo 12 colocar o value no botão -->
                        <input type="submit" value="<?=$btnLojas?>" name="btnSalvarLojas" id="botaoLojas_input" class="texto_fonte">   
                     </div>
                  </div>
               </form>
               <div class="table center">   
                  <div class="container_nome_campos">
                     <div class="nome_campos texto_fonte">endereco</div>
                     <div class="nome_campos texto_fonte">CEP</div>
                     <div class="nome_campos texto_fonte">Cidade</div>
                     <div class="nome_campos texto_fonte">Estado</div>
                     <div class="nome_campos texto_fonte">Telefone</div>
                     <div class="nome_campos texto_fonte">Ações</div>
                  </div>
                  <?php
                     // Exibir endereços Passo 01 conectar com o bd
                     require_once('../../bancoDados/conexao.php');

                     // Exibir endereços Passo 02 chamar a função de conexão
                     $conexao = conexaoMysql();

                     // Exibir endereços Passo 03 Script para executar no BD
                     $sql = 'SELECT * FROM tbllojas';

                     // Exibir endereços Passo 04 para executar no bd
                     $select = mysqli_query($conexao, $sql);

                     // Exibir endereços Passo 05 enquanto houver conteudo retorna como array 
                     while($rsEnderecos = mysqli_fetch_array($select)){
                  ?>
                  <div class="container_dados_campos">
                     <div class="dados_campos texto_fonte input_overflow"><?=$rsEnderecos['endereco']?></div>
                     <div class="dados_campos texto_fonte"><?=$rsEnderecos['cep']?></div>
                     <div class="dados_campos texto_fonte"><?=$rsEnderecos['cidade']?></div>
                     <div class="dados_campos texto_fonte"><?=$rsEnderecos['siglaestado']?></div>
                     <div class="dados_campos texto_fonte"><?=$rsEnderecos['telefone']?></div>
                     <div class="dados_campos texto_fonte">
                        <!-- Editar endereço Passo 01 mandando o codigo do usuario para o get e mandando o modo  -->
                        <a href="gerenciarLojas.php?codigo=<?=$rsEnderecos['codigo']?>&modo=editar">
                           <img src="../img/editar.png" class="img_icon_lojas" alt="editar" title="editar"></a>
                        
                        <!-- Deletar endereço Passo 01 verifica se a variavel modo = excluir e pega o codigo do usuario que sera excluido--->
                        <a href="../bd/deletarLojas.php?codigo=<?=$rsEnderecos['codigo']?>&modo=deletar" onclick="return confirm('Deseja excluir?');">
                           <img src="../img/excluir.png" class="img_icon_lojas" alt="excluir" title="excluir"></a>
                        
                        <?php
                           // Ativar/Desativar Passo 1 verificar o valor do status p/ exibir os ícones 
                           if($rsEnderecos['status'] == 1){
                        ?>
                        <a href="../bd/statusLojas.php?codigo=<?=$rsEnderecos['codigo']?>&status=<?=$rsEnderecos['status']?>">
                        <img src="../img/ativa.png" class="img_icon_lojas" alt="ativo" title="ativo"></a>
                        <?php
                           }else{     
                        ?>
                           <a href="../bd/statusLojas.php?codigo=<?=$rsEnderecos['codigo']?>&status=<?=$rsEnderecos['status']?>">
                              <img src="../img/desativar.png" class="img_icon_lojas" alt="desativado" title="desativado"></a>
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