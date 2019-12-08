<?php
    // 1 Verifica se existe a variavel modo 
    if(isset($_POST['modo']))
    {
        // 2 Verifica se está vindo com o conteúdo esperado
        if(strtoupper ($_POST['modo']) == 'VISUALIZAR')
        {
            // 3 Recebe o id do registro enviado pelo ajax
            $codigo =  $_POST['codigo'];
            
            // 4 Coneaxao
            if(!file_exists(require_once('bd/conexao.php')))
                require_once('bd/conexao.php');
            
            // 5 Chama a função 
                $conexao = conexaoMysql();
            
            // 6 Script para buscar o registro no BD
            $sql = "select * from tblcontatos where codigo =".$codigo;
            
            // 7 Executa o script no bd
            $select = mysqli_query($conexao, $sql);
            
            // 8 Verifica se existem dados e converte em array
            if($rsVisualizar = mysqli_fetch_array($select))
            {
                $nome = $rsVisualizar['nome'];
                $telefone = $rsVisualizar['telefone'];
                $celular = $rsVisualizar['celular'];
                $email = $rsVisualizar['email'];
                $dt_nasc = $rsVisualizar['dt_nasc'];
                $sexo = $rsVisualizar['sexo'];
                $obs = $rsVisualizar['obs'];
            }
        }
    }

?>
<html lang="pt-br">
    <head>
    </head>
    <body>
        <table border="1" id="visualizar_dados">
            <tr>
                <td>
                    Nome:
                </td>
                <td>
                    <?=$nome?>
                </td>
            </tr>
            <tr>
                <td>
                    Telefone:
                </td>
                <td>
                    <?=$telefone?>
                </td>
            </tr>
            <tr>
                <td>
                    Celular:
                </td>
                <td>
                    <?=$celular?>
                </td>
            </tr>
            <tr>
                <td>
                    Email: 
                </td>
                <td>
                    <?=$email?>
                </td>
            </tr>
            <tr>
                <td>
                    Data de nascimento: 
                </td>
                <td>
                    <?=$dt_nasc?>
                </td>
            </tr>
            <tr>
                <td>
                    Sexo: 
                </td>
                <td>
                    <?=$sexo?>
                </td>
            </tr>
            <tr>
                <td>
                    Observação: 
                </td>
                <td>
                    <?=$obs?>
                </td>
            </tr>
        </table>
    </body>
</html>