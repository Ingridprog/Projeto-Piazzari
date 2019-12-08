<?php
   // Editar nível Passo 17 Iniciar variavel de sessão
   if(!isset($_SESSION)){
      session_start();
   }
   
   $chkadmusuarios = 0;
   $chkadmfaleconosco = 0;
   $chkadmconteudo = 0;
   

   // nivel Passo 1 verificar se o botão foi clicado
   if(isset($_POST['btncadastrarnivel'])){
     
      // nivel Passo 2 Importa o arq de conexao
      require_once('../../bancoDados/conexao.php');
      
      // nivel Passo 3 Chama a função
      $conexao = conexaoMysql();
      
      // nivel Passo 4 Resgatar valores do Frm
      $nome = $_POST['txtnome'];
      
      // nivel Passo 6 Verificando se existe se sim recebe o valor 
      if($_POST['chkadmconteudo'] <> ""){
         $chkadmconteudo = $_POST['chkadmconteudo'];   
      }
      
      if($_POST['chkadmusuarios'] <> ""){
         $chkadmusuarios = $_POST['chkadmusuarios'];   
      }
      
      if($_POST['chkadmfaleconosco'] <> ""){
         $chkadmfaleconosco = $_POST['chkadmfaleconosco'];   
      }
      
      // Editar usuário Passo 18 verificar o botão
      if($_POST['btncadastrarnivel'] == 'criar'){
         // nivel Passo 7 script para inserir dados no BD
         $sql = "INSERT INTO
         tblniveis (descricao, administracaoConteudo, administracaoUsuario, administracaoFaleConosco)
      
         VALUES('".$nome."', '".$chkadmconteudo."', '".$chkadmusuarios."', '".$chkadmfaleconosco."');";
         //Editar usuário Passo 19 se for editar vai fazer o update onde o codigo for igual a variavel de sessão
      }else{
         $sql = "UPDATE tblniveis SET descricao='".$nome."', administracaoConteudo=".$chkadmconteudo.", 
            administracaoUsuario=".$chkadmusuarios.", administracaoFaleConosco=".$chkadmfaleconosco." WHERE codigo=".$_SESSION['codigoNivel'];        
      }
      
      
      
      // nivel Passo 8 Mandando executar no bd
      $select = mysqli_query($conexao, $sql);
      
      // nivel Passo 9 Verificando se o script foi executado com sucesso 
      if($select){
         header('location:../paginas/gerenciarNiveis.php');
      }else{
         echo('Erro ao executar no banco '.$sql);
      }
   
   }

?>