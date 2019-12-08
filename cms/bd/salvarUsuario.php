<?php
   // Editar usuário Passo 20 Iniciar variavel de sessão
   if(!isset($_SESSION)){
      session_start();
   }
   
   // inserir Usuario Passo 1 verificar se o botão foi clicado
   if(isset($_POST['btncadastrar'])){
      // inserir Usuario Passo 2 Importar o arquivo de conexão 
      require_once('../../bancoDados/conexao.php');
      
      // inserir Usuario Passo 3 Chama a função
      $conexao = conexaoMysql();
      
      // inserir Usuario Passo 4 Resgata os dados do frm
      $nomeCadastro = $_POST['txtnomecadastro'];
      $cpf = $_POST['txtcpf'];
      $dt_nasc = $_POST['txtdatenascimento'];
      $email = $_POST['txtemail'];
      $nomeUsuario = $_POST['txtnomeusuario'];
      $senha = $_POST['txtsenha'];
      $senha_cripty = md5($senha);  
      $nivel = $_POST['sltniveis'];
      $confirmarSenha = $_POST['txtsenhaconfirmar'];
      
      // Editar usuário Passo 21 verificar o botão 
      if($_POST['btncadastrar'] == 'criar'){
         // inserir Usuario Passo 5 Script para inserir dados no BD
         $sql = "INSERT INTO tblusuarios (nome, cpf, dt_nasc, email, usuario, senha, codigoNivel) VALUES ('".$nomeCadastro."', '".$cpf."', '".$dt_nasc."', '".$email."', '".$nomeUsuario."', '".$senha_cripty."', ".$nivel.")";    
      }else{
			
         $sql = "UPDATE tblusuarios SET nome='".$nomeCadastro."',cpf='".$cpf."',dt_nasc='".$dt_nasc."', email='".$email."', usuario='".$nomeUsuario."', senha='".$senha_cripty."', codigoNivel=".$nivel." WHERE codigo=".$_SESSION['codigoUsuario'];
      }
      // inserir Usuario Passo 6 Executando no BD 
      $select = mysqli_query($conexao, $sql);
      
      // inserir Usuario Passo 7 Se der certo retorna ao formulario
      if($select){
         header('location:../paginas/gerenciarUsuario.php');
      }else{
         echo($sql);
      }
   }
?>