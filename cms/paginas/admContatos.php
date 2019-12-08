<?php
    $msgTipo = "";
    // vPasso 3 script vizualizar dados 
    $sql = "select * from tblcontatospizzaria";
    
    
    if(!isset($_SESSION)){
        session_start();
    }
    
    // vPasso 1 Chama o arquivo que conecta com o banco
    require_once('../../bancoDados/conexao.php');

    // vPasso 2 Chama a função que conecta com o banco
    $conexao = conexaoMysql();

?>

<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>
            Administração Fale Conosco
        </title>
        <link href="https://fonts.googleapis.com/css?family=Amatic+SC&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Playfair+Display&display=swap" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="../css/padronizacao.css">
        <link type="text/css" rel="stylesheet" href="../css/admFaleConosco.css">
        <script src="../js/jquery.js"></script>
        
        <!-- mPasso 1 - Entre parenteses o que ele vai manipular (pagina)

        ready (evento) ( quando for lida )

        Executa  a função  
        -->
        <script>
            $(document).ready(function(){   
                // 2  
                $('.visualizar').click(function(){  
                    // 3
                    $('#container').fadeIn(1000);
                });
                
                $('#fechar').click(function(){
                   $('#container').fadeOut(1000); 
                });
            });
            // mPasso 4 - Recupera o id no s através de parâmetro
            function visualizarDados(idItem){
                
                $.ajax({                    
                    type: "POST",
                    url: "modalFaleConosco.php",
                    data: {modo:'visualizar', codigo:idItem},
                    success: function(dados){
                       $('#modalDados').html(dados);
                    }
                });      
            }
        </script>
    </head>
    <body>
        <!-- mPasso 0 Modal -->
        <div id="container">
            <div id="modal">
                <div id="fechar"> X </div>
                <div id="modalDados"></div>
            </div>
        </div>
        <?php
            require_once('../paginas/header.php');
         ?>
        <!-- Área de escolha do Tipo de Mensagem -->
        <div id="escolha_tipo_msg">
            <div class="conteudo center"> 
                <div id="formulario" class="center">
                    <form name="frmFormulario" method="get">
                        <p class="texto_fonte"> Filtro: </p>
                        <select name="slt_contatos">
                            <option value="" selected> ... </option>
                            <option value="sugestao"> Sugestão </option>
                            <option value="critica"> Crítica </option>
                        </select>
                        <input type="submit" name="btnTipoMsg" value="OK" id="botao">
                    </form>
                </div>
            </div>
        </div>
        <!-- Área tabela resultado -->
        <div class="tabela_resultado">
            <div class="conteudo center">
               <h1 class="letra_fonte center"> Consulta Fale Conosco</h1> 
                <!-- Nome dos Campos -->
                <div class="container_nome_campos center">
                    <div class="campos_nome texto_fonte">Nome</div>
                    <div class="campos_nome texto_fonte">Profissão</div>
                    <div class="campos_nome texto_fonte">Celular</div>
                    <div class="campos_nome texto_fonte">Tipo</div>
                    <div class="campos_nome texto_fonte">Opções</div>
                </div>
                
                <!-- Dados -->
                <?php
                    $sql = "SELECT * FROM tblcontatospizzaria";   
                    
                    //fPasso 1 Verifica se o botao foi clicado
                    if(isset($_GET['btnTipoMsg'])){
                        //fPasso 2 Resgate do select    
                        $msgTipo = $_GET['slt_contatos']; 
                        // fPasso 3 Filtro 
                        if($msgTipo == "sugestao"){
                            $sql = "select * from tblcontatospizzaria where tipomsg='sugestao'";
                        }elseif($msgTipo == "critica"){
                            $sql = "select * from tblcontatospizzaria where tipomsg='critica'";
                        }
                        
                    }
                    // vPasso 4 conectar com o banco e mandar o script
                    $select = mysqli_query($conexao, $sql);
                
                    // vPasso 5 Repetir enquanto o banco tiver conteudo
                    while($rsContatos = mysqli_fetch_array($select)){ //abre aqui
                        
                    // vPasso 6 Atribuir os valores em cada campo de acordo com o indice    
                ?>
                <div class="container_dados_filtrados center">
                    <div class="itens_dados texto_fonte">
                        <?=$rsContatos['nome']?>
                    </div>
                    <div class="itens_dados texto_fonte">
                        <?=$rsContatos['profissao']?>
                    </div>
                    <div class="itens_dados texto_fonte">
                        <?=$rsContatos['celular']?>
                    </div>
                    <div class="itens_dados texto_fonte">
                        <?=$rsContatos['tipomsg']?>
                    </div>
                    <div class="itens_dados texto_fonte">
                        <div class="container_icones center">
                            <!-- mPasso 3 - Chama a função quando o ícone 
                            for clicado passando o parametro id
                            visualizarDados(<?rsContatos['id']?>)
-->
                            <div id="visualizar"
                            >
                                <a href="#" class="img_icon visualizar"
                                   onclick="visualizarDados(<?=$rsContatos['id']?>)">
                                    <img src="../img/search.png" class="img_icon" alt="visualizar" title="visualizar">
                                </a>    
                            </div>
                            <div id="deletar">  
                                <!-- dPasso 1 verifica se a variavel modo = excluir e pega o id do item que sera excluido-->
                                <a onclick="return confirm('Deseja excluir?');" href="../bd/deletar.php?modo=excluir&codigo=<?=$rsContatos['id']?>" class="img_icon">
                                    <img src="../img/excluir.png" class="img_icon" alt="excluir" title="excluir">
                                </a>
                            </div>  
                        </div>
                    </div>
                </div>
                <?php
                    } // fecha aqui 
                ?>
            </div>
        </div>
        <!-- Rodapé -->
        <?php
            if(!file_exists(require_once('footer.php')))
            {
                require_once('footer.php');
            }
        ?>
    </body>
</html>