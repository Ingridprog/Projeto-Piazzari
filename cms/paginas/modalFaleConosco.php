<?php
    if(isset($_POST['modo']))
    {
        if(strtoupper($_POST['modo']) == 'VISUALIZAR')
        {
            $codigo = $_POST['codigo'];
            
           if(!file_exists(require_once('../../bancoDados/conexao.php')))
                require_once('../../bancoDados/conexao.php');
            
            $conexao = conexaoMysql();
            
            $sql = "select *from tblcontatospizzaria where id =".$codigo;
            
            $select = mysqli_query($conexao, $sql);
            
            if($rsVisualizar = mysqli_fetch_array($select))
            {
                $nome = $rsVisualizar['nome'];
                $email = $rsVisualizar['email'];
                $telefone = $rsVisualizar['telefone'];
                $celular = $rsVisualizar['celular'];
                $homepage = $rsVisualizar['homepage'];
                $facebook = $rsVisualizar['facebook'];
                $sexo = $rsVisualizar['sexo'];
                $profissao = $rsVisualizar['profissao'];
                $tipomsg = $rsVisualizar['tipomsg'];
                $mensagem = $rsVisualizar['mensagem'];
            }
        }
    }
?>

<html>
    <head>
        <title> Fale conosco </title>
    </head>
    <body>
        <h1 id="todos_dados">
            Todos os Dados 
        </h1>
        <table id="tabela_visualizar_dados" class="center">
            <tr>
                <td class="nome_campo_visualizar_dados"> Nome </td>
                <td class="dado_campo"> <?=$nome?> </td>
            </tr>
            <tr>
                <td class="nome_campo_visualizar_dados"> Email </td>
                <td class="dado_campo"> <?=$email?> </td>
            </tr>
            <tr>
                <td class="nome_campo_visualizar_dados"> Telefone </td>
                <td class="dado_campo"> <?=$telefone?> </td>
            </tr>
            <tr>
                <td class="nome_campo_visualizar_dados"> Celular </td>
                <td class="dado_campo"> <?=$celular?> </td>
            </tr>
            <tr>
                <td class="nome_campo_visualizar_dados"> Home Page </td>
                <td class="dado_campo"> <?=$homepage?> </td>
            </tr>
            <tr>
                <td class="nome_campo_visualizar_dados"> Facebook </td>
                <td class="dado_campo"> <?=$facebook?> </td>
            </tr>
            <tr>
                <td class="nome_campo_visualizar_dados"> Sexo </td>
                <td class="dado_campo"> <?=$sexo?> </td>
            </tr>
            <tr>
                <td class="nome_campo_visualizar_dados"> Profissão </td>
                <td class="dado_campo"> <?=$profissao?> </td>
            </tr>
            <tr>
                <td class="nome_campo_visualizar_dados"> Tipo de Mensagem </td>
                <td class="dado_campo"> <?=$tipomsg?> </td>
            </tr>
            <tr>
                <td class="nome_campo_visualizar_dados"> Mensagem </td>
                <td class="dado_campo" id="msg_campo"> <?=$mensagem?> </td>
            </tr>
        </table>
    </body>
</html>