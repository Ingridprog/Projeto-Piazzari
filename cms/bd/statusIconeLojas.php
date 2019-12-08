<?php
    // ativar/desativar ícone passo 02 verifica se existe a variavel status
    if(isset($_GET['status'])){
        
        // ativar/desativar ícone passo 03 resgatando a variavel codigo
        $codigo = $_GET['codigo'];

        // ativar/desativar ícone passo 04 Importa o arq de conexão
        require_once('../../bancoDados/conexao.php');

        // ativar/desativar ícone passo 05 Chama a função
        $conexao = conexaoMysql();

        // ativar/desativar ícone passo 06 Script para mandar p o bd desativa todos os icones
        $sql = "UPDATE tblimglojas SET status = 0 WHERE codigo > 0";

        // ativar/desativar ícone passo 07 executa no bd
        $select = mysqli_query($conexao, $sql);

        // ativar/desativar ícone passo 08 script para ativar o icone escolhido
        $sql = "UPDATE tblimglojas SET status = 1 WHERE codigo =".$codigo;

        // ativar/desativar ícone passo 09 executa no bd
        $select1 = mysqli_query($conexao, $sql);

        // ativar/desativar ícone passo 10 verifica se executou 
        if($select1){
            header("location:../paginas/gerenciarLojas.php");
        }else{
            echo($sql);
        }

    }
?>