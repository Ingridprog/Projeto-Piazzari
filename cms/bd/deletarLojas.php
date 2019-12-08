<?php
   // Deletar endereço Passo 02 Verifica a existencia da variavel modo
   if(isset($_GET['modo'])){
      
      // Deletar endereço Passo 03 verifica se modo é igual a excluir
      if($_GET['modo'] == 'deletar'){
         echo("llll");
         
         // Deletar endereço Passo 04 importa o arq de conexao
         require_once('../../bancoDados/conexao.php');
         
         // Deletar endereço Passo 05 chama a função de conexão
         $conexao = conexaoMysql();
         
         // Deletar endereço Passo 06 Resgata a variavel codigo do get
         $codigo = $_GET['codigo'];
         
         // Deletar endereço Passo 07 script para executar no bd
         $sql = "DELETE FROM tbllojas WHERE codigo=".$codigo;
         
         // Deletar endereço Passo 08 executa no bd
         $select = mysqli_query($conexao, $sql);
         
         // Deletar endereço Passo 09 verifica se deu certo
         if($select){
            header('location:../paginas/gerenciarLojas.php');
         }else{
            echo($sql);
         }
      }
   }
?>