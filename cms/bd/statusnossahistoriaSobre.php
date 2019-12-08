<?php
    // ativar/desativar nossahistoria passo 02 verifica se existe a variavel status
    if(isset($_GET['status'])){
        
        // ativar/desativar nossahistoria passo 03 resgatando a variavel codigo
        $codigo = $_GET['codigo'];

        // ativar/desativar nossahistoria passo 04 Importa o arq de conexão
        require_once('../../bancoDados/conexao.php');

        // ativar/desativar nossahistoria passo 05 Chama a função
        $conexao = conexaoMysql();

        // ativar/desativar nossahistoria passo 06 Script para mandar p o bd desativa todos os icones
        $sql = "UPDATE tblsobrenossahistoria SET status = 0 WHERE codigo > 0";

        // ativar/desativar nossahistoria passo 07 executa no bd
        $select = mysqli_query($conexao, $sql);

        // ativar/desativar nossahistoria passo 08 script para ativar o icone escolhido
        $sql = "UPDATE tblsobrenossahistoria SET status = 1 WHERE codigo =".$codigo;

        // ativar/desativar nossahistoria passo 09 executa no bd
        $select1 = mysqli_query($conexao, $sql);

        // ativar/desativar nossahistoria passo 10 verifica se executou 
        if($select1){
            header("location:../paginas/nossahistoriaSobre.php");
        }else{
            echo($sql);
        }

    }
?>