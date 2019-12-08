<!DOCTYPE HTML>

<html lang="pt-br">
   <head>
      <meta charset="utf-8">
      <title> Contatos </title>
        <link rel="stylesheet" type="text/css" href="../css/padronizacao.css">
        <link rel="stylesheet" type="text/css" href="../css/contatos.css">
       <link href="https://fonts.googleapis.com/css?family=Roboto+Mono&display=swap" rel="stylesheet">
      <script src="../js/modulo.js"></script>
   </head>
   <body>
       <!-- Cabecalho -->
         <?php
        if(!file_exists(require_once('header.php')))
        require_once('header.php');  
        ?> 
      <div class="contatos">
         <div class="conteudo center">
            <h1 class="titulo center"> Fale conosco </h1>
            <div class="frm_contatos center">
               <h1 class="orientacao"> Preencha os campos para nos contatar </h1>
               <form method="post" name="frmcontato" action="../cms/bd/inserir.php">
                  <table id="table_contatos" class="center">
                     <!-- Nome -->
                     <tr>
                        <td class="txt_input">
                           <p> Nome*:</p>
                        </td>
                        <td class="campo_input">
                            <input class="input" onkeypress="return validarEntrada(event, 'numeric');" type="text" maxlength="100" name="txtnome" size="40" required >
                        </td>
                     </tr>
                     <!-- Email -->
                     <tr>
                        <td class="txt_input">
                           <p> Email*:</p>
                        </td>
                        <td class="campo_input">
                             <input class="input" type="email" maxlength="2000" name="txtemail" size="45" required>
                        </td>
                     </tr>
                     <!-- Telefone -->
                     <tr>
                        <td class="txt_input">
                           <p> Telefone:</p>
                        </td>
                        <td class="campo_input">
                            <input class="input" onkeypress="return mascaraFone(this, event);" type="text" maxlength="15" name="txttelefone" size="45" id="tel">
                        </td>
                     </tr>
                     <!-- Celular -->
                     <tr>
                        <td class="txt_input">
                           <p> Celular*:</p>
                        </td>
                        <td class="campo_input">
                            <input class="input" onkeypress="return mascaraFone(this, event);" type="text" maxlength="15" name="txtcelular" size="45" id="cel" required >
                        </td>
                     </tr>
                     <!-- Página Pessoal -->
                     <tr>
                        <td class="txt_input">
                           <p> Home page:</p>
                        </td>
                        <td class="campo_input">
                            <input class="input" type="text" maxlength="2000" name="txthomepage" size="45" placeholder="Link da Página Pessoal">
                        </td>
                     </tr>
                     <!-- Facebook -->
                     <tr>
                        <td class="txt_input">
                           <p> Facebook:</p>
                        </td>
                        <td class="campo_input">
                             <input class="input" type="text" maxlength="2000" name="txtfacebook" size="45" placeholder="Link do facebook">
                        </td>
                     </tr>
                     <!-- Sexo -->
                     <tr>
                        <td class="txt_input">
                           <p> Sexo*:</p>
                        </td>
                        <td class="campo_input">
                           <input class="sexo" type="radio"  name="rdosexo" size="45" value="F" required>
                           Feminino 
                           <input class="sexo" type="radio"  name="rdosexo" size="45" value="M" required> Masculino 
                        </td>
                     </tr>
                     <!-- Profissão -->
                     <tr>
                        <td class="txt_input">
                           <p> Profissão*:</p>
                        </td>
                        <td class="campo_input">
                             <input class="input" type="text" onkeypress="return validarEntrada(event, 'numeric');" maxlength="60" name="txtprofissao" size="45" placeholder="Qual sua profissão? " required>
                        </td>
                     </tr>
                      <!-- Mensagem -->
                     <tr>
                        <td class="txt_input">
                           <p> Mensagem*:</p>
                        </td>
                        <td class="campo_input">
                           <select id="select" class="input" name="slcmsg">
                            <option class="fonte" value="" selected> Selecione o tipo de mensagem </option>
                            <option class="fonte" value="comentario"> comentario
                            <option class="fonte" value="sugestao"> Sugestão </option>
                            <option class="fonte" value="critica"> Crítica </option>
                          </select> 
                        </td>
                     </tr>
                     <!-- Caixa de msg -->
                      <tr>
                        <td class="campo_input" colspan="2">
                            <textarea name="msg" class="msg" maxlength="2000"></textarea>
                        </td>
                     </tr>
                     <tr>
                        <td colspan="2">
                           <input type="submit" value="Salvar" name="btnsalvar" id="botaoSalvar">   
                        </td>
                     </tr>
                  </table>
               </form>
            </div>
         </div> 
      </div>
       <!-- Rodapé -->  
         <?php
           if(!file_exists(require_once('footer.php')))
           require_once('footer.php');  
         ?>
   </body>
</html>