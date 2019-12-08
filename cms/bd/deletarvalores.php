<?php
   // Deletar valores Passo 02 Verifica a existencia da variavel modo
   if(isset($_GET['modo'])){
      // Deletar valores Passo 03 verifica se modo é igual a excluir
      if($_GET['modo'] == 'excluir'){
         // Deletar valores Passo 04 importa o arq de conexao
         require_once('../../bancoDados/conexao.php');
         
         // Deletar valores Passo 05 chama a função de conexão
         $conexao = conexaoMysql();
         
         // Deletar valores Passo 06 Resgata a variavel codigo do get
         $codigo = $_GET['codigo'];
         $nomeFoto = $_GET['nomeFoto'];
         
         // Deletar valores Passo 07 script para executar no bd
         $sql = "DELETE FROM tblmissavisaovalores WHERE codigo=".$codigo;
         
         // Deletar valores Passo 08 executa no bd
         $select = mysqli_query($conexao, $sql);
         
         // Deletar valores Passo 09 verifica se deu certo
         if($select){
            unlink('../../img/'.$nomeFoto);
            header('location:../paginas/valores.php');
         }else{
            echo($sql);
         }
         
      }   
   }
?>