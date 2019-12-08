<?php
   // Ativar/Desativar Passo 3 Verificar se a variavel status existe
   if(isset($_GET['status'])){
      // Ativar/Desativar Passo 4 Se o valor do status for 1 passa a ser 0 e vice-versa
      if($_GET['status'] == 1){
         $status = 0;
      }else{
         $status = 1;
         
      }
      
      // Ativar/Desativar Passo 5 Resgate da variavel codigo passado pelo link
      $codigo = $_GET['codigo'];
      
      // Ativar/Desativar Passo 6 importa o arq de conexao
      require_once('../../bancoDados/conexao.php');
      
      // Ativar/Desativar Passo 7 chama a função de conexão
      $conexao = conexaoMysql();
      
      // Ativar/Desativar Passo 8 Script para atualizar status no bd
      $sql = "UPDATE tblniveis SET status=".$status." WHERE codigo = ".$codigo;
      
       // Ativar/Desativar Passo 8 Manda o script para o bd
      $select = mysqli_query($conexao, $sql);
      
      if($select){
         header('location:../paginas/gerenciarNiveis.php');
      }else{
         echo($sql);
      }
   }
?>