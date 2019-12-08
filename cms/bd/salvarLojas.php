<?php
   // Editar endereço Passo 17 Iniciar variavel de sessão 
   if(!isset($_SESSION)){
      session_start();
   }
   
    if(isset($_POST['btnSalvarLojas'])){
        require_once('../../bancoDados/conexao.php');
        
        $conexao = conexaoMysql();
        
        $endereco = $_POST['txtendereco'];
        $cep = $_POST['txtcep'];
        $cidade = $_POST['txtcidade'];
        $siglaestado = $_POST['txtsiglaestado'];
        $telefone = $_POST['txttelefone'];
        
       // Editar endereço Passo 18 verificar o botão 
       if($_POST['btnSalvarLojas'] == 'cadastrar'){
         $sql = "INSERT INTO tbllojas (endereco, cep, cidade, siglaestado, telefone) VALUES ('".$endereco."','".$cep."' ,'".$cidade."', '".$siglaestado."','".$telefone."')";   
       }else{
         $sql = "UPDATE tbllojas SET endereco='".$endereco."', cep='".$cep."', cidade='".$cidade."', siglaestado='".$siglaestado."', telefone='".$telefone."' WHERE codigo=".$_SESSION['codigoLoja'];  
       }
         
         $select = mysqli_query($conexao, $sql);

         if($select){
             header('location:../paginas/gerenciarLojas.php');
         }else{
             echo($sql);
         }    
        
    }
   
   
?>