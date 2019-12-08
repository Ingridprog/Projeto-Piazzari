<?php
    // ativar/desativar valores passo 02 verifica se existe a variavel status
    if(isset($_GET['status'])){
        
        // ativar/desativar valores passo 03 resgatando a variavel codigo
        $codigo = $_GET['codigo'];
        $id = $_GET['id'];

        // ativar/desativar valores passo 04 Importa o arq de conexão
        require_once('../../bancoDados/conexao.php');

        // ativar/desativar valores passo 05 Chama a função
        $conexao = conexaoMysql();

        // ativar/desativar valores passo 06 Script para mandar p o bd desativa todos os icones
        $sql = "UPDATE tblmissavisaovalores SET status = 0 WHERE id=".$id;

        // ativar/desativar valores passo 07 executa no bd
        $select = mysqli_query($conexao, $sql);

        // ativar/desativar valores passo 08 script para ativar o icone escolhido
        $sql = "UPDATE tblmissavisaovalores SET status = 1 WHERE codigo =".$codigo;

        // ativar/desativar valores passo 09 executa no bd
        $select1 = mysqli_query($conexao, $sql);

        // ativar/desativar valores passo 10 verifica se executou 
        if($select1){
            header("location:../paginas/valores.php");
        }else{
            echo($sql);
        }

    }
?>