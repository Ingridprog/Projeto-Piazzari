<!-- Sera submetida  colocar no form!! -->
<!--insert into nomedobanco (nome, telefone ...)
No banco só int não tem aspas simples
values('ingrid', '123456, ...');
sql=" insert...
values no php -> values ('".$nome."', ..., ".$seforinteiro.",'".$obs."');";
-->
<?php
    // 02/10 valida se a variavel de sessao ja foi iniciada
    //variaavel sessao 
//variavel continua ativa no navegador enquanto a aba estiver aberta 
    if(!isset($_SESSION))
    {
        session_start();    
    }

    /* 02/10
        criar uma variavel de sessão
        $_SESSION['nome']
        
        apagar uma variavel de sessão do servidor
        unset($_SESSION['nome'])
        
        eliminar todas as variaveis de sessão do sistema automaticamente
        session_destroy()
    
    */
    
     $sql = "";
    // verifica se houve a ação do POST
    if(isset($_POST['btnsalvar'])){
        
        //importa o arq de conexão 
        require_once('conexao.php');
        //chama a função 
        $conexao = conexaoMysql();

        // resgatando os dados enviados pelo formulário
        $nome = $_POST['txtnome']; 
        $telefone = $_POST['txttelefone'];
        $celular = $_POST['txtcelular'];
        $email = $_POST['txtemail'];
        // percorre string de dados, localiza caractere coringa e quebra em array.
        $data_nascimento = explode("/", $_POST['datenascimento']);
        //var_dump($data_nascimento);
        $data_nascimento = $data_nascimento[2]."-".$data_nascimento[1]."-".$data_nascimento[0];
        $sexo = $_POST['rdosexo'];
        $obs = $_POST['txtobs'];
        $estado = $_POST['sltestados'];
        
        // 06/11 imagem editar p4 Se não tiver foto fazer o update direto 
        if(strtoupper($_POST['btnsalvar']) == "EDITAR" && $_FILES['flefoto']['name'] == ""){
            $sql = "update tblcontatos set
                                nome='".$nome."', telefone='".$telefone."', celular='".$celular."', email='".$email."', dt_nasc='".$data_nascimento."', sexo='".$sexo."', obs='".$obs."'
                                where codigo =".$_SESSION['codigo'];        
            if(mysqli_query($conexao, $sql)){
                header('location:../banco.php');    
            }else{
                echo($sql);
            }
        }else{
            
            // 30/10 imagem p10 verificar o tamanho e a extensao
            if($_FILES['flefoto']['size'] > 0 && $_FILES['flefoto']['type'] != ""){
                /* 30/10 imagem p3 Resgatar o elemento do file
                retirar o objeto $_files
                guarda o tamanho do arquivo a ser upado para o servidor 
                guarda em um arquivo temp do servidor o upload só acontece depois
                */
                $arquivo_size = $_FILES['flefoto']['size'];
                //var_dump($_FILES['flefoto']);

                // 30/10 imagem p4 Converte o tamanho do arquivo para kbytes e //pega só a parte inteira da conversão(round)
                $tamanho_arquivo = round($arquivo_size/1024);

                //30/10 imagem p6 todos os permitidos
                $arquivos_permitidos = array("image/jpeg", "image/png", "image/jpg");
                // 30/10 imagem p7 guarda o tipo de extensao do arquivo
                $ext_arquivo = $_FILES['flefoto']['type'];

                // 30/10 imagem p8 Se a extensao estiver certa executa os outros
                if(in_array($ext_arquivo, $arquivos_permitidos)){
                    // 30/10 imagem p5 Se a imagem tiver o tamanho certo executa os outros códigos 
                    if ($tamanho_arquivo < 2000){

                        /* 30/10 imagem p12 Tratar nomes que podem vir iguais Separar o nome e extensão do arquivo em variaveis, depois criptografar so o nome e concatenar com a extensão 
                        Permite retornar apenas o nome do arquivo 
                        */
                        $nome_arquivo = pathinfo($_FILES['flefoto']['name'], PATHINFO_FILENAME);

                        /* 30/10 imagem p13 Permite retornar apenas a extensão do arquivo */
                        $ext = pathinfo($_FILES['flefoto']['name'], PATHINFO_EXTENSION);

                        /* 30/10 imagem p14 Algoritmos de criptografia sha1, md5 e hash("tipo do algoritmo", "variavel")
                        + id unico + h:min:s */
                        $nome_arquivo_cripty = md5(uniqid(time()).$nome_arquivo);

                        // 30/10 imagem p15 variavel para dar upload
                        $foto = $nome_arquivo_cripty.".".$ext;

                        // 30/10 imagem p16 caminho onde a imagem esta temporariamente
                        $arquivo_temp = $_FILES['flefoto']['tmp_name'];

                        // 30/10 imagem p17 diretório
                        $diretorio = "arquivos/";

                        // movendo da pasta temporaria para a pasta que esta no servidor

                        if(move_uploaded_file($arquivo_temp, $diretorio.$foto)){
                            // 02/10 Verifica se o valor do btnsalvar é inserir
                        if(strtoupper($_POST['btnsalvar']) == "INSERIR" )
                        {
                        // 06/11 imagem p18 fazer o insert    
                        //mesmo nome dos bang do banco 
                        $sql = "insert into tblcontatos (nome, telefone, celular, email, codigoestado, dt_nasc, sexo, obs, foto)

                        values ('".$nome."', '".$telefone."', '".$celular."', '".$email."', '".$estado."', '".$data_nascimento."', '".$sexo."', '".$obs."', '".$foto."');";    
                        } // Verifica se o valor do btnsalvar é editar
                          // 06/11 imagem editar p5 se for modo editar vai fazer o update da foto   
                        elseif(strtoupper($_POST['btnsalvar']) == "EDITAR")
                        {
                            $sql = "update tblcontatos set
                                    nome='".$nome."', telefone='".$telefone."', celular='".$celular."', email='".$email."', dt_nasc='".$data_nascimento."', sexo='".$sexo."', obs='".$obs."', foto='".$foto."'
                                    where codigo =".$_SESSION['codigo'];        
                        }

                        //Executa um script no banco de dados (se o script der certo iremos redirecionar para a página de cadastro, senão mostrar a msg de erro)
                        if(mysqli_query($conexao, $sql)){
                        //redireciona para uma determinada página
                            // 06/11 imagem Editar p7 tratamento para apagar a foto antiga do servidor caso esteja no modo editar e limpar a variavel de sessao
                            if(isset($_SESSION['nomeFoto'])){
                                unlink('arquivos/'.$_SESSION['nomeFoto']);
                                unset($_SESSION['nomeFoto']);
                            }
                            header('location:../banco.php');    
                        }else{
                            echo($sql);
                        }   



                        }else{
                            echo("errr");
                        }

                    // 30/10 imagem p5 se o tamanho estiver errado
                    }else{
                        echo("<script>
                            alert('Tamanho ultrapassa o Limite');
                       </script>");    
                    }   
                // 30/10 imagem p9 Se a extensao estiver errada    
                }else{
                    echo("<script>
                        alert('O tipo de extensao não pode ser upada pelo servidor (arquivos permitidos .jpg .png .jpeg)');
                   </script>");    
                }       
            // 30/10 imagem p11 Se o nome ou extensao estiver errada   
            }else{
               echo("<script>
                        alert('O tamanho ou o tipo não corresponde ao que o servidor aceita');
                   </script>");    
            }
        }
    }
?>