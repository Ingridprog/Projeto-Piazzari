<?php
    if(isset($_SESSION)){
        session_start();
    }
    
    // mandando para url - Usar o GET 
    
    // dPasso 2 - Verificar a existência da variavel modo
    if(isset($_GET['modo'])){
        
        // dPasso3 - verifica se a variavel modo tem o valor de excluir
        if($_GET['modo'] == 'excluir'){
            
            // dPasso 4 - Importa o arquivo de conexao
            require_once('../../bancoDados/conexao.php');
            
            // dPasso 5 - Chama a função de Conexao
            $conexao = conexaoMysql();
            
            // dPasso 6 - Resgata o valor da id
            $codigo = $_GET['codigo'];
            
            // dPasso 7 - Script para deletar
            $sql = "delete from tblcontatospizzaria where id=".$codigo;
            
            // dPasso 8 - Verificando se a conexao e o delete deu certo
            if(mysqli_query($conexao, $sql))
            {
                // Se der certo volta para a pagina
                header('location:../paginas/admContatos.php?slt_contatos='.$msgTipo.'&btnTipoMsg=OK');
            }else
            {
                echo ("Erro ao deletar registro!");
            }
        }
    }
?>