<?php
    if(isset($_POST['modo'])){
        if($_POST['modo'] == 'visualizar'){
            $codigo = $_POST['codigo'];
            
             require_once('../../bancoDados/conexao.php');
            
            $conexao = conexaoMysql();
            
            $sql = "select *from tblusuarios where codigo=".$codigo;
            
            $select = mysqli_query($conexao, $sql);
            
            if($rsVisualizar = mysqli_fetch_array($select))
            {
                $nome = $rsVisualizar['nome'];
                $cpf = $rsVisualizar['cpf'];
                $dt_nasc = $rsVisualizar['dt_nasc'];
                $email = $rsVisualizar['email'];
                $usuario = $rsVisualizar['usuario'];
                $codigoNivel = $rsVisualizar['codigoNivel'];
                $status = $rsVisualizar['status'];
            }else{
                echo("err");
            }
        }
    }
?>
 <!DOCTYPE html>
 
 <html lang="pt-br">
     <head>
         <title>
             Formularios
         </title>
     </head>
     <body>
        
        <div id="container_user" class="center">
            <div id="branco" class="center">
                <img src="../img/cadastroUsuario.png" alt="user" class="img_">
            </div>
            <div class="linha texto_fonte center" >
                <div class="coluna">Nome: </div>
                <div class="coluna1"><?=$nome?></div>
            </div>
            <div class="linha texto_fonte center" >
                <div class="coluna">CPF: </div>
                <div class="coluna1"><?=$cpf?></div>
            </div>  
            <div class="linha texto_fonte center" >
                <div class="coluna">Dt_nasc: </div>
                <div class="coluna1"><?=$dt_nasc?></div>
            </div>  
            <div class="linha texto_fonte center" >
                <div class="coluna">Email: </div>
                <div class="coluna1"><?=$email?></div>
            </div>  
            <div class="linha texto_fonte center" >
                <div class="coluna">Usuário: </div>
                <div class="coluna1"><?=$usuario?></div>
            </div>
            <?php
                $sql = "SELECT * FROM tblniveis WHERE codigo=".$codigoNivel;

                $select1 = mysqli_query($conexao, $sql);

                $rsNivel = mysqli_fetch_array($select1);
            ?>  
            <div class="linha texto_fonte center" >
                <div class="coluna">Nível: </div>
                <div class="coluna1"><?=$rsNivel['descricao']?></div>
            </div>  
        </div>  
     </body>
 </html> 