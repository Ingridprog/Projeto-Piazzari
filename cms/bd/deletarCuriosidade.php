<?php
   // Deletar curiosidade Passo 02 Verifica a existencia da variavel modo
   if(isset($_GET['modo'])){

      // Deletar curiosidade Passo 03 verifica se modo é igual a excluir
      if($_GET['modo'] == 'excluir'){

         // Deletar curiosidade Passo 04 importa o arq de conexao
         require_once('../../bancoDados/conexao.php');
         
         // Deletar curiosidade Passo 05 chama a função de conexão
         $conexao = conexaoMysql();
         
         // Deletar curiosidade Passo 06 Resgata a variavel codigo do get
         $codigo = $_GET['codigo'];
         $nomeFoto = $_GET['nomeFoto'];
         
         // Deletar curiosidade Passo 07 script para executar no bd
         $sql = "DELETE FROM tblcuriosidades WHERE codigo=".$codigo;
         
         // Deletar curiosidade Passo 08 executa no bd
         $select = mysqli_query($conexao, $sql);
         
         // Deletar curiosidade Passo 09 verifica se deu certo
         if($select){
            unlink('../../img/'.$nomeFoto);
            header('location:../paginas/gerenciarCuriosidades.php');
         }else{
            echo($sql);
         }
      }   
   }
?>