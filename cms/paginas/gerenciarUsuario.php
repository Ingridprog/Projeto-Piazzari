<!DOCTYPE html>
<?php
   // Editar usuário Passo 18 Iniciar a variavel de sessão 
   if(!isset($_SESSION)){
      session_start();
   }
   $codigoNivel = 0;
   // Editar usuário Passo 11 Criar a variavel botão que vai ficar no value do botão
   $btnUsuario = 'criar';
    
   // Editar usuário Passo 02 Verifica se a variavel modo existe
   if(isset($_GET['modo'])){
      // Editar usuário 03 Verifica se a variavel modo é igual a editar
      if($_GET['modo'] == 'editar'){
         // Editar usuário Passo 04 Importa o arq de conexão
         require_once('../../bancoDados/conexao.php');
         
         // Editar usuário Passo 05 Chama a função de conexão
         $conexao = conexaoMysql();
         
         // Editar usuário Passo 06 Resgatando a variavel codigo
         $codigoUsuario = $_GET['codigo'];
         
         // Editar usuário Passo 19 a variavel de sessão recebe o código p/ enviar para o arq salvarUsuario onde vai ser salvo os dados editados
         $_SESSION['codigoUsuario'] = $codigoUsuario;
         
         // Editar usuário Passo 07 script para mandar no bd
         $sql = "SELECT * FROM tblusuarios WHERE codigo=".$codigoUsuario;
         
         // Editar usuário Passo 08 executa no bd
         $select = mysqli_query($conexao, $sql);
         
         // Editar usuário Passo 09 Verifica se o script foi executado se foi retornará um array
         if($select){
            $rsUsuarios = mysqli_fetch_array($select);
            
            // Editar usuário Passo 10 Resgata os dados de cada campo 
            $nome = $rsUsuarios['nome'];
            $cpf = $rsUsuarios['cpf'];
            $dt_nasc = $rsUsuarios['dt_nasc'];
            $email = $rsUsuarios['email'];
            $usuario = $rsUsuarios['usuario'];
            $codigoNivel = $rsUsuarios['codigoNivel'];
            // Editar usuário Passo 13 quando o icone editar for clicado a variavel modo recebe o valor editar e entra aqui para alterar o value do botão
            $btnUsuario = 'editar';
         }else{
            echo($sql);
         }
         
      }
   }

?>

<html lang="pt-br">
    <head>
        <title>
            Gerenciar Usuários
        </title>
        <link href="https://fonts.googleapis.com/css?family=Amatic+SC&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Playfair+Display&display=swap" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="../css/padronizacao.css">
        <link type="text/css" rel="stylesheet" href="../css/gerenciarUsuario.css">
       <script src="../../js/jquery.js"></script>
       <script src="../../js/modulo.js"></script>
       <script src="../../js/ancora.js"></script>
       <script>
            $(document).ready(function(){
                // 3 função para abrir a modal
                $('.visualizar').click(function(){
                    $('#container').fadeIn(1000);
                    // slideDown 
                });

                $('#fechar').click(function(){
                    $('#container').fadeOut(1000);    
                });
            });

            // 4  recuperar o id no js através de parametro 
            function visualizarDados(idItem)
            {
                // permite manipulação de frm no html
                $.ajax({
                    type:"POST",
                    url: "modalUsuario.php",
                    // encaminhar os dados
                    data: {modo:'visualizar', codigo: idItem},
                    success: function(dados){
                    $('#modalDados').html(dados);
                    } 
                });      
            }
       </script>
    </head>
    
    <body>
        <div id="container">
            <div id="modal">
                <div id="fechar" class="texto_fonte">X</div>
                <div id="modalDados"></div>
            </div>
        </div>
        <!-- Cabeçalho -->
        <?php
            if(!file_exists(require_once('header.php')))
            {
                require_once('header.php');
            }
        ?>
       <div id="container_formulario_usuario">
            <div class="conteudo_gerenciar_usuario center">
               <!-- Link para gerenciar Usuários -->
               <div id="link_gerenciar_usuario">
                  <a href="#titulo_gerenciar_usuarios">
                     <p class="letra_fonte"> Clique para Gerenciar Usuários </p>
                  </a>
               </div>
               <!-- Formulário -->
               <div id="container_frm" class="center">
                  <h1 class="texto_fonte"> Cadastro de Usuários
                  </h1>
                  <div id="iconeCadastro" class="center">
                     <img src="../img/cadastroUsuario.png" class="img"> 
                  </div>
                  <form name="frmFormulario" method="post" action="../bd/salvarUsuario.php" class="center">
                     <div class="campos_nome">
                        <div class="campos_usuarios texto_fonte">
                           Nome: 
                        </div>
                        <div class="input_nome">
                           <!--  Editar usuário Passo 14 Colocar as variaveis no value  -->
                           <input type="text" name="txtnomecadastro" onkeypress="return validarEntrada(event, 'numeric');" value="<?=@$nome?>" placeholder="Digite seu nome" id="nome" size="99" maxlength="99" required class="inputs texto_fonte">
                        </div>
                     </div>
                     <div class="campos_float">
                        <div class="campos_usuarios texto_fonte">
                           CPF: 
                        </div>
                        <div class="componentes_frm">
                           <input type="text" id="cpf" name="txtcpf" value="<?=@$cpf?>" placeholder="Digite seu cpf" size="14" maxlength="14" required onkeypress="return mascaraCpf(this, event);" class="inputs texto_fonte" >      
                        </div>
                     </div>
                    
                     <div class="campos_float">
                        <div class="campos_usuarios texto_fonte">
                           Data nascimento:
                        </div>
                        <div class="componentes_frm">
                           <input type="text" id="data" name="txtdatenascimento" value="<?=@$dt_nasc?>" placeholder="dd/mm/aaaa" size="10" maxlength="10" required class="inputs texto_fonte" onkeypress="return">
                        </div>
                     </div>
                     <div class="campos_float">
                        <div class="campos_usuarios texto_fonte">
                           Email: 
                        </div>
                        <div class="componentes_frm">
                           <input type="email" name="txtemail" value="<?=@$email?>" placeholder="Digite seu email" size="100" maxlength="100" required class="inputs texto_fonte">
                        </div>
                     </div>
                     <div class="campos_float">
                        <div class="campos_usuarios texto_fonte">
                           Usuário: 
                        </div>
                        <div class="componentes_frm">
                           <input type="text" name="txtnomeusuario" value="<?=@$usuario?>" size="25" maxlength="25" placeholder="Digite seu nome de Usuário" required class="inputs texto_fonte">
                        </div>
                     </div>
                     
                     <div class="campos_float">
                        <div class="campos_usuarios texto_fonte">
                           Senha: 
                        </div>
                        <div class="componentes_frm">
                           <input type="password" name="txtsenha" value="" size="20" maxlength="20" required class="inputs texto_fonte" id="senha_input">
                        </div>
                     </div>
                     
                     <div class="campos_float">
                        <div class="campos_usuarios texto_fonte">
                          Nível: 
                        </div>
                        <div class="componentes_frm">
                           <!-- Editar usuário Passo 15 No select verificar se está no modo editar  -->
                           <select name="sltniveis" class="texto_fonte inputs" required>
                                 <?php
                                    require_once('../../bancoDados/conexao.php');
                               
                                    $conexao = conexaoMysql();
                                  
                                    if($_GET['modo'] == 'editar'){
                                       // Editar usuário Passo 16 Se estiver no modo editar faz um select no banco para buscar os dados do nivel do usuario 
                                       $sql = "SELECT * FROM tblniveis WHERE codigo=".$codigoNivel;
                                       
                                       $select = mysqli_query($conexao, $sql);
                                       
                                       if($select){
                                          $rsNiveis = mysqli_fetch_array($select);
                                       }
                                 ?>
                                    <!--  Editar usuário Passo 17 Se estiver no modo editar vai trazer o nivel na option  -->
                                    <option value="<?=$rsNiveis['codigo']?>"><?=$rsNiveis['descricao']?></option>      
                                 <?php
                                    }else{
                                 ?>
                                       
                                       <option value="" selected> 
                                          Selecione o Nível de Usuário 
                                       </option>
                                 <?php    
                                    }
                                 ?>
                     
                                <?php
                                 
                                 $sql = 'SELECT * FROM tblniveis WHERE codigo <> '.$codigoNivel;
                               
                                 $select = mysqli_query($conexao, $sql);
                               
                                 while($rsNiveis = mysqli_fetch_array($select)){
                                 ?>
                               
                                 <option value="<?=$rsNiveis['codigo']?>"><?=$rsNiveis['descricao']?></option>
                               
                               <?php
                                  }
                               ?>
                            </select>  
                        </div>
                     </div>
                     <div id="botao_cadastrar">
                        <div id="botao_cadastrar_container" class="center">
                           <!-- Editar usuário Passo 12 colocar o value no botão -->
                            <input type="submit" name="btncadastrar" value="<?=$btnUsuario?>" id="btn_cadastrar" class="texto_fonte center">
                        </div>
                     </div>
                  </form>
               </div>
            </div>  
       </div>
        <!-- Container gerenciar usuários    -->
        <div class="container_gerenciar_usuario">
            <div class="conteudo_gerenciar_usuario center">
                <h1 id="titulo_gerenciar_usuarios" class="center texto_fonte">
                    Gerenciar Usuários
                </h1>
                <!-- Tabela -->
                <div id="tabela_gerenciar_usuario" class="center texto_fonte">
                    <div id="container_nome_campos_gerenciar_usuario">
                        <div class="nome_campos_gerenciar_usuario texto_fonte"> Usuário </div>
                        <div class="nome_campos_gerenciar_usuario texto_fonte"> CPF </div>
                        <div class="nome_campos_gerenciar_usuario texto_fonte"> Nível  </div>
                        <div class="nome_campos_gerenciar_usuario texto_fonte"> Status </div>
                        <div class="nome_campos_gerenciar_usuario texto_fonte"> Ações </div>
                        <div class="nome_campos_gerenciar_usuario texto_fonte"> Ativar | Desativar </div>
                    </div>
                   <?php
                     // Exibir usuarios Passo 01 conectar com o bd
                     require_once('../../bancoDados/conexao.php');
                   
                     // Exibir usuarios Passo 02 chamar a função de conexão
                     $conexao = conexaoMysql();
                   
                     // Exibir usuarios Passo 03 Script para executar no BD
                     $sql = 'SELECT tblusuarios.*, tblniveis.descricao FROM tblusuarios INNER JOIN
                     tblniveis ON tblniveis.codigo = tblusuarios.codigoNivel';
                   
                     // Exibir usuarios Passo 04 para executar no bd
                     $select = mysqli_query($conexao, $sql);
                     
                     // Exibir usuarios Passo 05 enquanto houver conteudo retorna como array 
                     while($rsUsuarios = mysqli_fetch_array($select)){
                   ?>
                    <div id="container_dados_gerenciar_usuario">
                        <div class="dados_gerenciar_usuario"><?=$rsUsuarios['usuario']?></div>
                        <div class="dados_gerenciar_usuario"><?=$rsUsuarios['cpf']?></div>
                        <div class="dados_gerenciar_usuario"><?=$rsUsuarios['descricao']?></div>
                        <div class="dados_gerenciar_usuario"><?=$rsUsuarios['status']?></div>
                        <div class="dados_gerenciar_usuario">
                            <div class="icones">
                                <a href="#" class="visualizar" onclick="visualizarDados(<?=$rsUsuarios['codigo']?>)">
                                   <img src="../img/search.png" alt="icon" class="img_user" title="buscar"> 
                                </a>
                            </div>
                            <div class="icones">
                               <!-- Editar usuário Passo 01 mandando o codigo do usuario para o get e mandando o modo  -->
                                <a href="gerenciarUsuario.php?codigo=<?=$rsUsuarios['codigo']?>&modo=editar">
                                    <img src="../img/editar.png" alt="icon" class="img_user" title="editar"> 
                                </a>
                            </div>
                           <!-- Deletar usuário Passo 01 verifica se a variavel modo = excluir e pega o codigo do usuario que sera excluido--->
                           <!--  Impedir que o usuário exclua ele mesmo -->
                           <div class="icones">
                                <a 
                                   <?php
                                       if($rsUsuarios['nome'] == $_SESSION['nomeLogin']){
                                   ?>
                                       onclick="alert('Não é possivel excluir seu usuário!')"  
                                   <?php
                                       }else{
                                    ?>
                                       href="../bd/deletarUsuario.php?modo=excluir&codigo=<?=$rsUsuarios['codigo']?>" onclick="return confirm('Deseja excluir?');" 
                                   <?php
                                       }
                                   ?>
                                   >
                                    <img src="../img/excluir.png" alt="icon" class="img_user" title="excluir"> 
                                </a>
                            </div> 
                        </div>
                        <div class="dados_gerenciar_usuario">
                            <?php
                              // Ativar/Desativar Passo 1 verificar o valor do status p/ exibir os ícones 
                              if($rsUsuarios['status'] == 1){
                           ?>
                           <!-- Serve para mandar o valor do status e código do usuário via get para o arq do statusUsuario.php -->
                           <!--  Impedir que o usuário desative ele mesmo -->
                              <a 
                                 <?php
                                    if($rsUsuarios['nome'] == $_SESSION['nomeLogin']){
                                 ?>
                                    onclick="alert('Não é possivel desativar seu usuário!')"  
                                 <?php
                                    }else{
                                 ?>
                                    href="../bd/statusUsuario.php?status=<?=$rsUsuarios['status']?>&codigo=<?=$rsUsuarios['codigo']?>"
                                 <?php
                                    }
                                 ?>
                                 >
                                    <img src="../img/ativa.png" alt="icon" class="img_user" title="desativar"> 
                              </a>
                           <?php
                              }else{
                           ?> 
                              <a href="../bd/statusUsuario.php?status=<?=$rsUsuarios['status']?>&codigo=<?=$rsUsuarios['codigo']?>">
                                    <img src="../img/desativar.png" alt="icon" class="img_user" title="ativar"> 
                              </a>   
                           <?php
                              }
                           ?>  
                        </div>
                    </div>
                   <?php
                     }
                   ?>
                </div>
            </div>
        </div>
        <!-- Rodapé -->
        <?php
            if(!file_exists(require_once('footer.php')))
            {
                require_once('footer.php');
            }
        ?>
       <script src="../js/modulos.js"></script>
    </body>
</html>