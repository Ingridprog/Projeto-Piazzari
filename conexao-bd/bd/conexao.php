<?php
    function conexaoMysql ()
    {
        /*conectionstrings.com*/
        /* Conexao 
            1. mysql_connect() função para conectar com o BD -mais antiga. EX mysql_connect(host, user, password)
            mysql_select_db() - permite escolher qual database vai ser utilizado no projeto


            2. mysqli_connect() - função (biblioteca) para realizar a conexão com BD - mais atual EX mysqli_connect(host, user, password, database)


            3. PDO() - classe para realizar conexão com BD (100% orientada a objetos) EX $conexao= new PDO('mysql: host = xxx; dbname = xxx', user, password)

        */
        $host = (string)"localhost"; // Local do BD
        $user = (string) "root"; // usuario de autenticação
        $password = (string) "bcd127"; // senha de autenticação 
        $database = (string) "dbcontatos20192tb"; // nome do database

        $conexao = mysqli_connect($host, $user, $password, $database);   
        
        return $conexao;
    }


?>