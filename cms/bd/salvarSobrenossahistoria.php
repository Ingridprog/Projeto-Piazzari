<?php
    // Editar nossahistoria Passo 17 Iniciar variavel de sessão
    if(!isset($_SESSION)){
        session_start();
    }
    // inserir nossahistoria Passo 1 verificar se o botão foi clicado
    if(isset($_POST['btnnossahistoria'])){
        // inserir nossahistoria Passo 2 Importar o arquivo de conexão 
        require_once('../../bancoDados/conexao.php');

        // inserir nossahistoria Passo 3 Chama a função
        $conexao = conexaoMysql();
        
        // inserir nossahistoria Passo 4 Resgata os dados do frm
        $texto = $_POST['txtnossahistoria'];

        // upload de img passo 04 resgatar
        if(isset($_SESSION['preview'])){
            $foto = $_SESSION['preview'];
            echo($foto);
        }else{
            $foto = null;
        }

        if($_POST['btnnossahistoria'] == 'editar' && isset($_SESSION['preview'])){
            $sql = "UPDATE tblsobrenossahistoria SET foto='".$foto."', texto='".$texto."' WHERE codigo=".$_SESSION['codigohistoria'];    
        }
        elseif($_POST['btnnossahistoria'] == 'salvar'){
            // inserir nossahistoria Passo 5 SCRIPT
            $sql = "INSERT INTO tblsobrenossahistoria (foto, texto) VALUES ('".$foto."','".$texto."')";
            echo($sql);
        }else{
            $sql = "UPDATE tblsobrenossahistoria SET texto='".$texto."' WHERE codigo=".$_SESSION['codigohistoria'];
        }
        

        // inserir nossahistoria Passo 6 Executando no BD 
        $select = mysqli_query($conexao, $sql);
        
        // inserir nossahistoria Passo 7 Se der certo retorna ao formulario
        if($select){
            if(isset($_SESSION['nomeFoto']) && isset($_SESSION['preview'])){
                unlink('../../img/'.$_SESSION['nomeFoto']);
                unset($_SESSION['nomeFoto']);
            }
            
            if(isset($_SESSION['preview'])){
                unset($_SESSION['preview']);
            }
            header('location:../paginas/nossahistoriaSobre.php');

        }else{
            echo($sql);
        }
    }
    else{echo('teste');}
?>