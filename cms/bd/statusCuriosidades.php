<?php
   $codigo = (INT) 0;

   // Ativar/Desativar curiosidade Passo 2 Verificar se a variavel status existe
   if(isset($_GET['status'])){
      // Ativar/Desativar Passo 3 curiosidade Se o valor do status for 1 passa a ser 0 e vice-versa
      if($_GET['status'] == 1){
         $status = 0;
      }else{
         $status = 1;
      }
      
      // Ativar/Desativar curiosidade Passo 4 Resgate da variavel codigo passado pelo link
      $codigo = $_GET['codigo'];
      
      // Ativar/Desativar curiosidade Passo 5 importa o arq de conexao
      require_once('../../bancoDados/conexao.php');
      
      // Ativar/Desativar curiosidade Passo 6 chama a função de conexão
      $conexao = conexaoMysql();
      
      // Ativar/Desativar curiosidade Passo 7 Script para atualizar status no bd
      $sql = "UPDATE tblcuriosidades SET status =".$status." WHERE codigo = ".$codigo;
      
      // Ativar/Desativar curiosidade Passo 8 Manda o script para o bd
      $select = mysqli_query($conexao, $sql);
      
      if($select){
         header('location:../paginas/gerenciarCuriosidades.php');
      }else{
         echo($sql);
      }
   }
?>