<?php
    // Editar curiosidade Passo 17 Iniciar variavel de sessão
    if(!isset($_SESSION)){
        session_start();
    }

    // inserir Curiosidade Passo 1 verificar se o botão foi clicado
    if(isset($_POST['btnCuriosidades'])){

        // inserir Curiosidade Passo 2 Importar o arquivo de conexão 
        require_once('../../bancoDados/conexao.php');

        // inserir Curiosidade Passo 3 Chama a função
        $conexao = conexaoMysql();

        // inserir Curiosidade Passo 4 Resgata os dados do frm
        $texto = $_POST['txtcuriosidades'];
        // upload de img passo 04 resgatar
        if(isset($_SESSION['previewimg'])){
            $foto = $_SESSION['previewimg'];
        }else{
            $foto = null;
        }
        
        if($_POST['btnCuriosidades'] == 'editar' && isset($_SESSION['previewimg'])){
            $sql = "UPDATE tblcuriosidades SET foto='".$foto."' ,texto='".$texto."' WHERE codigo=".$_SESSION['codigo'];    
        }
        elseif($_POST['btnCuriosidades'] == 'salvar'){
            // inserir Curiosidade Passo 5 Script para inserir dados no BD
            $sql = "INSERT INTO tblcuriosidades (foto, texto) VALUES ('".$foto."','".$texto."')";
        }else{
            $sql = "UPDATE tblcuriosidades SET texto='".$texto."' WHERE codigo=".$_SESSION['codigo'];
        } 
        
        // inserir Curiosidade Passo 6 Executando no BD 
        $select = mysqli_query($conexao, $sql);

        // inserir Curiosidade Passo 7 Se der certo retorna ao formulario
        if($select){
            if(isset($_SESSION['nomeFoto']) && isset($_SESSION['previewimg'])){
                unlink('../../img/'.$_SESSION['nomeFoto']);
                unset($_SESSION['nomeFoto']);
            }
            
            if(isset($_SESSION['previewimg'])){
                unset($_SESSION['previewimg']);
            }
            
            header('location:../paginas/gerenciarCuriosidades.php');
        }else{
            echo($sql);
        }
    }
?>