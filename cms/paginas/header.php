<?php
    // autenticar Passo 18 Inicia a variavel de sessão
   if(!isset($_SESSION)){
      session_start();
   }
   
   // autenticar Passo 20 Importa o arq de conexao
   require_once('../../bancoDados/conexao.php');

   // autenticar Passo 21 Chama a função de conexão
   $conexao = conexaoMysql();

   // autenticar Passo 22 script para executar no bd
   $sql = "SELECT * FROM tblniveis WHERE tblniveis.codigo = ".$_SESSION['nivelcod'];

   // autenticar Passo 23 executa no bd
   $select = mysqli_query($conexao, $sql);

   // autenticar Passo 24 Se der certo transforma em array
   if($select){
      $rsLogin = mysqli_fetch_array($select);
   }

?>
<header>
    <div class="conteudo center">
        <h1 class="letra_fonte"> CMS - Sistema de Gerenciamento do Site </h1>
        <img src="../img/logo7.png" alt="sistema" title="img_sistema">
    </div>    
</header>
<!-- Área de ADM -->
        <div id="adm_container">
            <div class="conteudo center">
               <?php
                  // autenticar Passo 25 Exibir no menu apenas se o usuário tiver permissão
                  if($rsLogin['administracaoConteudo'] == 1){
               ?>
                     <a href="admConteudo.php">
                        <div class="tipo_de_adm">
                             <img src="../img/admConteudo.png" alt="AdmConteudo" title="AdmConteudo" class="img_menu">
                             <p>
                                 Adm. Conteúdo
                             </p>     
                         </div>
                     </a>
               <?php
                  }
                  
                  if($rsLogin['administracaoFaleConosco'] == 1){
               ?>
                   <a href="admContatos.php">
                       <div class="tipo_de_adm">
                           <img src="../img/admFaleConosco.png" alt="faleConosco" title="faleConosco">
                           <p>
                               Adm. Fale Conosco
                           </p>
                       </div>
                   </a>
               <?php
                  } 
                  if($rsLogin['administracaoUsuario'] == 1 ){
               ?>
                   <a href="admUsuario.php">
                       <div class="tipo_de_adm">
                           <img src="../img/admUsuario.png" alt="AdmUsuarios" title="AdmUsuarios">
                           <p>
                               Adm. Usuários
                           </p>
                       </div>
                   </a>
               <?php
                  }
               ?>
                <div id="boas_vindas">
                   <!-- autenticar Passo 19 Nome do usuário no bem-vindo                 -->
                  <p> Bem vindo(a), <?php echo($_SESSION['nomeLogin']);?> </p>
                  <div id="logout" class="letra_fonte">
                     <a href="../../paginas/principal.php"><p> Logout </p></a>
                  </div> 
                </div>
            </div>
        </div>