<?php
    // ativar/desativar topo passo 02 verifica se existe a variavel status
    if(isset($_GET['status'])){
        
        // ativar/desativar topo passo 03 resgatando a variavel codigo
        $codigo = $_GET['codigo'];

        // ativar/desativar topo passo 04 Importa o arq de conexão
        require_once('../../bancoDados/conexao.php');

        // ativar/desativar topo passo 05 Chama a função
        $conexao = conexaoMysql();

        // ativar/desativar topo passo 06 Script para mandar p o bd desativa todos os icones
        $sql = "UPDATE tbltoposobre SET status = 0 WHERE codigo > 0";

        // ativar/desativar topo passo 07 executa no bd
        $select = mysqli_query($conexao, $sql);

        // ativar/desativar topo passo 08 script para ativar o icone escolhido
        $sql = "UPDATE tbltoposobre SET status = 1 WHERE codigo =".$codigo;

        // ativar/desativar topo passo 09 executa no bd
        $select1 = mysqli_query($conexao, $sql);

        // ativar/desativar topo passo 10 verifica se executou 
        if($select1){
            header("location:../paginas/topoSobre.php");
        }else{
            echo($sql);
        }

    }
?>