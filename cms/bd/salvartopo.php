<?php
    // Editar curiosidade Passo 17 Iniciar variavel de sessão
    if(!isset($_SESSION)){
        session_start();
    }

    // inserir topo Passo 1 verificar se o botão foi clicado
    if(isset($_POST['btntopo'])){

        // inserir topo Passo 2 Importar o arquivo de conexão 
        require_once('../../bancoDados/conexao.php');

        // inserir topo Passo 3 Chama a função
        $conexao = conexaoMysql();

        // inserir topo Passo 4 Resgata os dados do frm
        if(isset($_SESSION['preview'])){
            $foto = $_SESSION['preview'];
        }else{
            $foto = null;
        }

        if($_POST['btntopo'] == 'editar' && $foto == null){
            header('location:../paginas/topoSobre.php');    
        }    
        elseif($_POST['btntopo'] == "salvar"){
            // inserir topo Passo 5 Script para inserir dados no BD
            $sql = "INSERT INTO tbltoposobre (foto) VALUES ('".$foto."')";
        }else{
            $sql = "UPDATE tbltoposobre SET foto='".$foto."' WHERE codigo=".$_SESSION['codigo'];
        }
            
        // inserir Curiosidade Passo 6 Executando no BD 
        $select = mysqli_query($conexao, $sql);

        // inserir Curiosidade Passo 7 Se der certo retorna ao formulario
        if($select){
            if(isset($_SESSION['nomeFoto'])){
                unlink('../../img/'.$_SESSION['nomeFoto']);
                unset($_SESSION['nomeFoto']);
            }
            
            if(isset($_SESSION['preview'])){
                unset($_SESSION['preview']);
            }
            
            header('location:../paginas/topoSobre.php');
        }else{
            echo($sql);
        }
    }
?>