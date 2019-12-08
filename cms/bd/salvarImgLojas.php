<?php
    session_start();
    // Upload de img Passo 18 verifica se existe o botão
    if(isset($_POST['btnsalvarimglojas'])){
        echo('1');
                  
        require_once('../../bancoDados/conexao.php');

        // Upload de img Passo 19 Chama a função
        $conexao = conexaoMysql();
        
        // Foto que será inserida no bd criada pelo upload
        $fotopreview = $_SESSION['previewicone']; 

        if($_POST['btnsalvarimglojas'] == 'editar' && $fotopreview == null){
            header('location:../paginas/gerenciarLojas.php');    
        }
        elseif($_POST['btnsalvarimglojas'] == 'salvar'){
           // Upload de img Passo 21 script para inserir no bd
           $sql = "INSERT INTO tblimglojas (foto) VALUES ('".$fotopreview."')";      
        }else{
           $sql = "UPDATE tblimglojas SET foto='".$fotopreview."' WHERE codigo=".$_SESSION['codicone'];
        }
        
        // Upload de img Passo 22 executa no bd
        $select = mysqli_query($conexao, $sql);

        // Upload de img Passo 23 verifica se o insert deu certo
        if($select){
            if(isset($_SESSION['nomeFoto'])){
                unlink('../../img/'.$_SESSION['nomeFoto']);
                unset($_SESSION['nomeFoto']);
            }

            if(isset($_SESSION['previewicone'])){
                unset($_SESSION['previewicone']);    
            }
            header('location:../paginas/gerenciarLojas.php');
        }else{
            echo($sql);
        }
    
    }
?>