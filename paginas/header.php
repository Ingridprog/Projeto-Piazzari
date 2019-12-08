<header> 
 <div class="conteudo center">
<!-- Logo -->
    <div class="container_logo float">
       <img src="../img/logo/logo4.png" alt="logo" class="img">
    </div>
    <nav class="float">
       <ul id="menu">
          <li class="menu_itens float"> <a href="principal.php"> HOME </a></li>
          <li class="menu_itens float"> <a href="curiosidade.php"> CURIOSIDADES </a></li>
          <li class="menu_itens float"> <a href="sobre.php"> SOBRE </a></li>
          <li class="menu_itens float"> <a href="promocoes.php"> PROMOÇÕES </a></li>
          <li class="menu_itens float"> <a href="nossasLojas.php"> NOSSAS LOJAS </a></li>
          <li class="menu_itens float"> <a href="produtoDoMes.php">  PRODUTO DO MÊS </a></li>
          <li class="menu_itens float"> <a href="contatos.php"> CONTATOS </a></li>
       </ul>  
    </nav>
<!-- Area de Login -->
       <form name="frmFormulario" method="post" action="../bancoDados/autenticar.php" class="login_frm float">
          <div class="login float">
             <p> Usuário: </p> <input name="txtNomeLogin" type="text" value="" size="10" maxlength="10" class="area_login" required> 
          </div>
          <div class="login float">
             <p> Senha: </p><input name="txtSenhaLogin" type="password" value="" size="10" maxlength="10" class="area_login" required>
          </div>
            <input type="submit" name="btnOk" value="OK" id="botao_login">
       </form>     
    </div>  
</header>