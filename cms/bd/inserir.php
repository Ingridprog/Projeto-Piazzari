<?php
   // verifica se houve a ação do POST
   if(isset($_POST['btnsalvar'])){
       //importa o arq de conexão 
        require_once('../../bancoDados/conexao.php');
        //chama a função 
        $conexao = conexaoMysql();
      
      //Resgate dos dados digitados
      $nome = $_POST['txtnome']; 
      $email = $_POST['txtemail'];
      $telefone = $_POST['txttelefone'];
      $celular = $_POST['txtcelular'];
      $homepage = $_POST['txthomepage'];
      $facebook = $_POST['txtfacebook'];
      $sexo = $_POST['rdosexo']; 
      $profissao = $_POST['txtprofissao']; 
      $tipomsg = $_POST['slcmsg'];
      $mensagem = $_POST['msg'];
       
      
      //script para inserir dados no BD
      $sql = "insert into tblcontatospizzaria (nome, email, telefone, celular, homepage, facebook, sexo, profissao, tipomsg, mensagem)
        
        values ('".$nome."', '".$email."', '".$telefone."', '".$celular."', '".$homepage."', '".$facebook."', '".$sexo."', '".$profissao."', '".$tipomsg."', '".$mensagem."');";
      
      
      //Executa um script no banco de dados (se o script der certo iremos redirecionar para a página de cadastro, senão mostrar a msg de erro)
        if (mysqli_query($conexao, $sql)){
            //redireciona para uma determinada página
             header('location:../../paginas/contatos.php');    
        }else{
            echo("Erro ao executar.");
        }
      
      
   } 
?>