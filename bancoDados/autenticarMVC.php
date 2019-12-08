<?php
    session_start();

    $_SESSION['erro'] = '';
    $_SESSION['usuario'] = '';


    if(isset($_POST['btnlogin'])){
        $login = $_POST['txtlogin'];
        $password = $_POST['txtsenha'];
        $password_cripty = md5($password);
        
        require_once('../bancoDados/conexao.php');
        
        $conexao = conexaoMysql();
        
        $sql = "SELECT * FROM tblusuarios WHERE usuario ='".$login."'"."AND senha = '".$password_cripty."'";
        
        $res = mysqli_query($conexao, $sql);
        
        if($res){
            $rsAutentica = mysqli_fetch_array($res);
            if($rsAutentica <> ""){
                $_SESSION['usuario'] = $rsAutentica['nome'];
                if($rsAutentica['status']){
                    $sql = "SELECT * FROM tblniveis WHERE codigo=".$rsAutentica['codigoNivel'];
                    
                    $res = mysqli_query($conexao, $sql);

                    $rsnivel = mysqli_fetch_array($res);
                    
                    if($rsnivel['status']){
                        
                        if($rsnivel['administracaoConteudo']){
                            $_SESSION['nomeLogin'] = $rsAutentica['nome'];
                            header('location: ../MVC-CRUD/index.php');
                        }else{
                            $_SESSION['erro'] = '<script>alert("Você não tem permissão para acessar o Sistema")</script>';  
                            header('location:../paginas/login.php');    
                        }
                    }else{
                        $_SESSION['erro'] = '<script>alert("Nível desativado/ Você não tem permissão para acessar o Sistema")</script>';
                        header('location:../paginas/login.php');  
                    }
                }else{
                    $_SESSION['erro'] = '<script>alert("Usuário Desativado!")</script>'; 
                    header('location:../paginas/login.php');
                }
            }else{
                $_SESSION['erro'] = '<script>alert("Login Incorreto/ Você não tem permissão para acessar o Sistema")</script>';
                header('location:../paginas/login.php');
            }  
        }else{
            $_SESSION['erro'] = '<script>alert("Erro no bd")</script>';
            //header('location:../paginas/login.php');
            echo($sql);
        }
    }
?>