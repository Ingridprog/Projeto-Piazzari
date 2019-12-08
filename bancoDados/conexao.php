<?php

   //Função para conectar com o BD
   function conexaoMysql(){
      
      $host = (string)"localhost"; // Local do BD
      $user = (string) "root"; // usuario de autenticação
      $password = (string) "bcd127"; // senha de autenticação 
      $database = (string) "dbprojetopizzariafrajolas"; // nome do database

      $conexao = mysqli_connect($host, $user, $password, $database);   

      return $conexao;
   }

?>