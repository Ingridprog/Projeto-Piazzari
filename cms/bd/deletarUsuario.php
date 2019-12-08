<?php
   // Deletar usuário Passo 02 Verifica a existencia da variavel modo
   if(isset($_GET['modo'])){
      // Deletar usuário Passo 03 verifica se modo é igual a excluir
      if($_GET['modo'] == 'excluir'){
         // Deletar usuário Passo 04 importa o arq de conexao
         require_once('../../bancoDados/conexao.php');
         
         // Deletar usuário Passo 05 chama a função de conexão
         $conexao = conexaoMysql();
         
         // Deletar usuário Passo 06 Resgata a variavel codigo do get
         $codigo = $_GET['codigo'];
         
         // Deletar usuário Passo 07 script para executar no bd
         $sql = "DELETE FROM tblusuarios WHERE codigo=".$codigo;
         
         // Deletar usuário Passo 08 executa no bd
         $select = mysqli_query($conexao, $sql);
         
         // Deletar usuário Passo 09 verifica se deu certo
         if($select){
            header('location:../paginas/gerenciarUsuario.php');
         }else{
            echo($sql);
         }
         
      }   
   }
?>