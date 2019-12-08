<!DOCTYPE html>
<?php
    
    // 02/10 Ativa o recurso de variaveis de sessão do servidor
    // 02/10 valida se a variavel de sessao ja foi iniciada
    if(!isset($_SESSION))
    {
        session_start();    
    }

    // variaveis
    $checkedM = "";
    $checkedF = "";
    $botao = (string) "inserir";
    // 23/10 Editar Estado 2
    $codigoestado = (int) 0;
    $siglaestado = (string) "";
    // 06/11 imagem Editar p2 
    $nomeFoto = (string) "";

    require_once('bd/conexao.php');

    $conexao = conexaoMysql();

     if(isset($_GET['modo']))
    {
        if($_GET['modo'] == 'editar')
        {

        // resgata o id do registro a ser editado        
        $codigo = $_GET['codigo'];
            
         // 02/10  variavel de sessao para enviar o codigo do registro para outra página    
        $_SESSION['codigo'] = $codigo;
            
        // 23/10 Editar Estado 1    
        $sql = "select tblcontatos.*, tblestados.sigla
                from tblcontatos Inner Join tblestados
                on tblestados.codigo=tblcontatos.codigoestado where tblcontatos.codigo =".$codigo;
            
            
        $select = mysqli_query($conexao, $sql);  
            
        if($rsConsulta = mysqli_fetch_array($select))
        {
            $nome = $rsConsulta['nome'];
            $telefone = $rsConsulta['telefone'];
            $celular = $rsConsulta['celular'];
            $email= $rsConsulta['email'];
            // 23/10 Editar Estado Resgata 3    
            $codigoestado = $rsConsulta['codigoestado'];
            $siglaestado = $rsConsulta['sigla'];
            $datenascimento= explode("-",$rsConsulta['dt_nasc']);
            $datenascimento= $datenascimento[2]."/".$datenascimento[1]."/".$datenascimento[0];
            $sexo= $rsConsulta['sexo'];
            $obs= $rsConsulta['obs'];
            // 06/11 imagem Editar p1 Resgatar
            $nomeFoto = $rsConsulta['foto'];
            // 06/11 imagem Editar p6
            $_SESSION['nomeFoto'] = $nomeFoto;
            
            if($sexo == "M"){
                $checkedM = "checked";
            }else{
                $checkedF = "checked";    
                
            }
            
            $botao = "Editar";
        }    
            
        }   
    }
?>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>
            Conexao com banco de dados
        </title>
        <link type="text/css" href="css/style.css" rel="stylesheet">
        <!--  02/10 1 Sempre primero -->
        <script src="js/jquery.js"></script>
        <script src="js/modulo.js"></script>
        <!-- 02/10 2 entre parenteses o q ele vai manipular (pagina) ready (quando for lida) é o evento executa uma função (chamada no proprio jquery)-->
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
                    url: "modalContatos.php",
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
        <!-- 02/10 0 modal descarregar outra pagina  
            Construir a modal q irá receber de outro arquivo, através do javaScript 
        -->
        <div id="container">
            <div id="modal">
                <div id="fechar">Fechar</div>
                <div id="modalDados"></div>
            </div>
        </div>
        <main id="caixa_frm" class="center">
            <h1> Cadastro de contatos </h1>
            <!--            
                HTML5

                required - Faz com a caixa seja obrigatória na digiação

                type -> text, email, tel, number min e max, range, url, password, date, month, week, color

                11/09 pattern - permite criar uma mascara para a entrada de dados no formulário. 
                *Expressão regular 
                Ex. [A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]

                011 414133686

                onkeyup -> Primeiro chega na caixa, depois verifica 

                onkeypress="funcao" -> Primeiro verifica, depois chega na caixa

                return -> depende do retorno do função

                onkeypress="return validarEntrada(event, 'string');" 

            -->
            
            <!-- 30/10 imagem p2 colocar no form a propriedade enctype p/ conseguir retirar a imagem  e método post 
            serve para informar o tipo de dado -->
            <form name="frmformulario" method="post" action="bd/salvar.php" enctype="multipart/form-data">
                <!-- 06/11 imagem Editar p3 colocar na img a variavel  -->
                <div id="carrega_img" class="center">
                    <img src="bd/arquivos/<?=$nomeFoto;?>" class="img_editar">
                </div>
                <div class="campos center">
                   <div class="txt_input"> Nome: </div> <div class="caixa_input"><input type="text" name="txtnome" placeholder="Digite seu nome" value="<?=@$nome;?>" onkeypress="return validarEntrada(event, 'numeric');" required maxlength="20" size="20" class="caixa_campos"></div>
                </div>
                <div class="campos center">
                   <div class="txt_input"> Telefone: </div> <div class="caixa_input"><input id="tel" type="text" name="txttelefone" placeholder="Ex. 999 9999-9999"value="<?=@$telefone;?>" onkeypress="return mascaraFone(this, event);" required maxlength="20" size="20" class="caixa_campos"></div>
                </div>
                <div class="campos center">
                   <div class="txt_input">Celular: </div><div class="caixa_input"><input id="cell" type="text" name="txtcelular" placeholder="Digite seu celular"value="<?=@$celular;?>" required maxlength="20" size="20" class="caixa_campos" onkeypress="return mascaraFone(this, event);"></div>
                </div> 
                <div class="campos center" >
                   <div class="txt_input"> Email: </div> <div class="caixa_input"><input type="email" name="txtemail" placeholder="Digite seu email" value="<?=@$email;?>" required class="caixa_campos"> </div>
                </div>
                <!--  30/10 imagem Para restringir 
                    usar accept p1-->
                <div class="campos center" >
                   <div class="txt_input"> Foto: </div> <div class="caixa_input"><input type="file" name="flefoto" value="" class="caixa_campos" > </div>
                </div>
                <!-- 23/ 10 Passo 1 criar tabela estados e relacionar com tblcontatos
                    23/ 10 Passo 2 Criar o Campo  -->
                <div class="campos center" >
                   <div class="txt_input"> Estados: </div> 
                        <div class="caixa_input">
                            <!-- 23/10 Editar estado 4 Condicional recuperar sigla, porem fica o estado 2 vezes-->
                            <select name="sltestados" required  >
                            <?php
                                if($_GET['modo'] == 'editar'){   
                            ?>
                                <option value="<?=$codigoestado?>"><?=$siglaestado?></option> 
                            <?php
                                }else{    
                            ?>    
                            <option value="">
                                Selecione um Estado
                            </option>
                            <?php
                                }
                            ?>    
                            <?php
                                // 23/10 Editar Estado 5 carrega tudo menos o q ja esta carregado
                                $sql = "select * from tblestados
                                where codigo <>
                                ".$codigoestado;
                            
                                $select = mysqli_query($conexao, $sql);
                                
                                while($rsEstados = mysqli_fetch_array($select))
                                {
                                ?>
                                    <option value="<?=$rsEstados['codigo']?>">
                                        <?=$rsEstados['sigla']?>
                                    </option>
                                <?php
                                }
                            ?>    
                            </select>
                        </div>
                </div> 
                <div class="campos center" >
                   <div class="txt_input"> Data de Nascimento: </div> <div class="caixa_input"><input type="text" name="datenascimento" placeholder="dd/dd/dddd" value="<?=@$datenascimento;?>" onkeypress="return validarEntrada(event, 'numeric');"  required class="caixa_campos"> </div>
                </div> 
                <div class="campos center"> 
                     <div class="txt_input"> Sexo: </div><div class="caixa_input">
                <input type="radio" name="rdosexo" value="M"  required <?= $checkedM?>> Masculino
                   <input type="radio" name="rdosexo" value="F" required <?= $checkedF?>> Feminino</div>
                </div>
                 <h3> OBS:</h3> <textarea name="txtobs" placeholder="Digite sua observação..."cols="30" rows="4" id="obs" required ><?=@$obs;?></textarea> 
                <br>
                <br>
                
                <div class="caixa_botao center">
                    <input type="submit" name="btnsalvar" value="<?=$botao?>" class="botao">
                    <input type="reset" name="btnlimpar" value="Limpar" class="botao">
                </div>
            </form>
        </main>
        <div id="consulta" class="center">
            <h1> Consulta de Contatos</h1>
            <div class="caixa">
                <div class="itens">Nome</div>
                <div class="itens">Telefone</div>
                <div class="itens">Celular</div>
                <div class="itens">Email</div>
                <div class="itens">Estado</div>
                <div class="itens">Foto</div>
                <div class="itens">Opções</div>
                
            </div>
            <?php
                // 23/10 Relacionar para pegar a sigla
            
                // select nome_tabela.campo, nome_tabela.campo  from nome_tabela, nome_tabela where relacionamento nome_tabela.campo = nome_tabela.campo
                //  2º Forma Relacionar no from
                // select nome_tabela.campo, nome_tabela.campo from  nome_tabela Inner Join nome_tabela on nome_tabela.campo = nome_tabela.campo;
                // as apelido 
                
                $sql = "select tblcontatos.*, tblestados.sigla
                from tblcontatos Inner Join tblestados
                on tblestados.codigo=tblcontatos.codigoestado";
                $select = mysqli_query($conexao, $sql);
                    

                               
                /*
                    Exemplos de funções que convertem a resposta do banco em um formato de dados para manipulação
                    
                    mysqli_fetch_array()
                    mysqli_fetch_assoc()
                    mysqli_fetch_object()
                    
                */
               
                /* Enquanto houver dados na vaiavel 
                    rs de Record set 
                */
                 
                
                while ($rsContatos = mysqli_fetch_array($select)){
                        
            ?>
            <div class="caixa_null">
                <div class="itens_null">
                    <?= $rsContatos ['nome']; ?>
                </div>
                <div class="itens_null">
                    <?= $rsContatos ['telefone']?>
                </div>
                <div class="itens_null">
                    <?= $rsContatos ['celular']?>
                </div>
                <div class="itens_null">
                    <?= $rsContatos ['email']?>
                </div>
                
                <div class="itens_null">
                    <?= $rsContatos ['sigla']?>
                </div>
                <!-- 06/11 imagem p19 exibir imagem -->
                <div class="itens_null">
                    <img src="bd/arquivos/<?=$rsContatos['foto']?>" class="img_dados">
                </div>
                <div class="itens_null">
                    <a href="banco.php?modo=editar&codigo=<?=$rsContatos['codigo']?>" class="img">
                        <div class="icones">
                            <img src="img/iconfinder_pencil_285638.png" alt="icon" class="img">
                        </div>
                    </a>
                    <div class="icones">
                        <!-- 06/11 excluir Foto p1   
                        passar p/ url na variavel nomeFoto -->
                        <a onclick="return confirm('Deseja realmente excluir? ');" href="bd/deletar.php?modo=excluir&codigo=<?=$rsContatos['codigo'] ?>&nomeFoto=<?=$rsContatos['foto']?>" class="img">
                            <img src="img/iconfinder_error_1646012.png" alt="icon" class="img">
                        </a>
                    </div>
                    <!-- 02/10 Dar uma id -->
                    <!--  5 Chamar a funçao   -->
                    <a href="#" class="visualizar" onclick="visualizarDados(<?=$rsContatos['codigo']?>);">         <div class="icones">
                            <img src="img/iconfinder_system-search_118797.png" alt="icon" class="img">
                        </div>
                    </a>
                </div>
            </div>
            <?php
                }
            ?>
        </div>
    </body>
</html>