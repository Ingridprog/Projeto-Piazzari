<?php
   // autenticar Passo 12 Iniciar variavel de sessão
   if(!isset($_SESSION)){
      session_start();
   }

   // autenticar Passo 13 Criar a variavel de sessão
   $_SESSION['errLogin'] = '';

   // autenticar Passo 14 Atribuir msgs de erro na variavel de sessão

   // autenticar Passo 1 Verificar se o botão foi clicado
   if(isset($_POST['btnOk'])){
      // autenticar Passo 2 Resgate dos valores do frm
      $nome = $_POST['txtNomeLogin'];
      $senha = $_POST['txtSenhaLogin'];
      $senha_cripty = md5($senha);
      
      // autenticar Passo 3 Importa o arq de conexao 
      require_once('../bancoDados/conexao.php');
      
      // autenticar Passo 4 Chama a função de conexão
      $conexao = conexaoMysql();
      
      // autenticar Passo 5 Script para executar no bd
      $sql = "SELECT * FROM tblusuarios WHERE tblusuarios.usuario ='".$nome."'";
      
      // autenticar Passo 6 executa no bd
      $select = mysqli_query($conexao, $sql);
      
      // autenticar Passo 7 Verificar se o script executou no banco
      if($select){
         // autenticar Passo 8 Transforma o retorno em array
         $rsAutenticacao = mysqli_fetch_array($select);
         
         // autenticar Passo 9 Verifica se o usuário existe
         if($rsAutenticacao <> "")
         {
            // autenticar Passo 10 Verifica se a senha está correta
            if($rsAutenticacao['senha'] == $senha_cripty)
            {
               // autenticar Passo 11 Verifica o usuário está ativado
               if($rsAutenticacao['status'] == 1)
               {
                  $sql = "SELECT * FROM tblniveis WHERE codigo=".$rsAutenticacao['codigoNivel'];

                  $select = mysqli_query($conexao, $sql);

                  $rsnivel = mysqli_fetch_array($select);

                  if($rsnivel['status'] == 1){
                     $_SESSION['nomeLogin'] = $rsAutenticacao['nome'];
                     $_SESSION['nivelcod'] = $rsAutenticacao['codigoNivel'];
                     header('location:../cms/paginas/cms.php');
                  }else{
                     $_SESSION['errLogin'] = '<script>alert("O nível deste usuário está desativado")</script>';
                     header('location:../paginas/principal.php');      
                  }
                  
               }
               else
               {
                  $_SESSION['errLogin'] = '<script>alert("Usuário Desativado!")</script>';
                  header('location:../paginas/principal.php');
               }
            }
            else
            {
                $_SESSION['errLogin'] = '<script>alert("Senha inválida!")</script>';
               header('location:../paginas/principal.php');
            }  
         }
         else
         {
            $_SESSION['errLogin'] = '<script>alert("Usuário inválido")</script>';
            header('location:../paginas/principal.php');
         }
         
      }
      else
      {
         echo($sql);
      }
   }

?>