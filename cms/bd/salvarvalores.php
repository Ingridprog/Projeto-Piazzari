<?php
    // Editar valores Passo 18 Iniciar variavel de sessão
    if(!isset($_SESSION)){
        session_start();
    }

    // inserir valores Passo 1 verificar se o botão foi clicado
    if(isset($_POST['btnvalores'])){

        // inserir valores Passo 2 Importar o arquivo de conexão 
        require_once('../../bancoDados/conexao.php');

        // inserir valores Passo 3 Chama a função
        $conexao = conexaoMysql();

        // inserir valores Passo 4 Resgata os dados do frm
        $texto = $_POST['txttexto'];

        if(isset($_SESSION['preview'])){
            $foto = $_SESSION['preview'];
        }else{
            $foto = null;
        }
        $id = $_POST['sltvalores'];

        if($id == 1){
            $titulo = "Missão";
        }elseif($id == 2){
            $titulo = "Visão";
        }else{
            $titulo = "Valores";
        }
        if($_POST['btnvalores']== 'editar' && isset($_SESSION['preview'])){
            $sql = "UPDATE tblmissavisaovalores SET id=".$id.", titulo='".$titulo."', texto='".$texto."', foto='".$foto."' WHERE codigo=".$_SESSION['codigo'];    
        }
        elseif($_POST['btnvalores'] == 'salvar'){
            // inserir valores Passo 5 Script para inserir dados no BD
            $sql = "INSERT INTO tblmissavisaovalores (id, titulo, texto, foto) VALUES (".$id.", '".$titulo."','".$texto."', '".$foto."')";
        }else{
            $sql = "UPDATE tblmissavisaovalores SET id=".$id.", titulo='".$titulo."', texto='".$texto."' WHERE codigo=".$_SESSION['codigo'];
        }
        
        // inserir valores Passo 6 Executando no BD 
        $select = mysqli_query($conexao, $sql);

        // inserir valores Passo 7 Se der certo retorna ao formulario
        if($select){
            if(isset($_SESSION['nomeFoto']) && isset($_SESSION['preview'])){
                unlink('../../img/'.$_SESSION['nomeFoto']);
                unset($_SESSION['nomeFoto']);
            }
            
            if(isset($_SESSION['preview'])){
                unset($_SESSION['preview']);
            }
            
            header('location:../paginas/valores.php');
        }else{
            echo($sql);
        }
    }
?>