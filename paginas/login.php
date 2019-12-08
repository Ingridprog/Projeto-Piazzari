<?php
    session_start();

?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>
            
        </title>
        <link href="https://fonts.googleapis.com/css?family=Dosis&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Tomorrow&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="../css/padronizacaoMVC.css">
        <link rel="stylesheet" type="text/css" href="../MVC-CRUD/view/css/padroniza.css">
        <?php
            if(isset($_SESSION['erro']))
                echo($_SESSION['erro']);
        ?>
    </head>
    <body>
        <header>
            <div class="conteudo center">
                <h1 id="sistemaMVC"> SISTEMA EM MVC </h1>
            </div>
        </header>
        <div class="container_login">
            <div class="conteudo center">
                <form action="../bancoDados/autenticarMVC.php" method="post" name="frmloginmvc" class="center">
                    <div class="container_frm center">
                        <div class="icone_login">
                            <img alt="img" title="username" src="../img/user.png" class="img">
                        </div>
                        <div class="login_input">
                            <input name="txtlogin" type="text" value="" placeholder="Username" required class="letras login_input_campo">
                        </div>
                    </div>
                    <div class="container_frm center">
                        <div class="icone_login">
                            <img alt="img" title="username" src="../img/password.png" class="img">
                        </div>
                        <div class="login_input">
                            <input name="txtsenha" type="password" value="" placeholder="Password" required class="letras login_input_campo">
                        </div>
                    </div>
                    <div id="btnlogin" class="center">
                        <input type="submit" value="LOGIN" name="btnlogin" id="btn" class="letras">
                    </div>
                </form>
            </div>
        </div>
        <?php
            require_once('../MVC-CRUD/view/footer.php');
        ?>
    </body>
</html>