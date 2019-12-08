<?php
   if(!isset($_SESSION)){
      session_start();
   }
   // Upload de img Passo 09 verificar o tamanho e a extensao
   if($_FILES['flefoto']['size'] > 0 && $_FILES['flefoto']['type'] != ""){
      // Upload de img Passo 03 Resgatar o elemento do file
      $arquivo_size = $_FILES['flefoto']['size'];

      // Upload de img Passo 04 Converte o tamanho do arquivo para kbytes e pega só a parte inteira da conversão(round)
      $arquivo_tamanho = round($arquivo_size / 1024);

      // Upload de img Passo 06 extensões permitidas
      $arquivos_permitidos = array("image/jpeg", "image/png", "image/jpg");

      // Upload de img Passo 07 guarda o tipo de extensao do arquivo
      $ext_arquivo = $_FILES['flefoto']['type'];

      // Upload de img Passo 08 Verifica a extensão do arquivo
      if(in_array($ext_arquivo, $arquivos_permitidos)){
         // Upload de img Passo 05 Se a imagem tiver o tamanho certo executa os outros códigos 
         if($arquivo_tamanho < 2000){
            // Upload de img Passo 10 Tratar nomes que podem vir iguais Separar o nome e extensão do arquivo em variaveis, depois criptografar so o nome e concatenar com a extensão    
            
            // Upload de img Passo 11 Retorna apenas o nome
            $nome_arquivo = pathinfo($_FILES['flefoto']['name'], PATHINFO_FILENAME);
            

            // Upload de img Passo 12 Retorna apenas a extensão
            $ext = pathinfo($_FILES['flefoto']['name'], PATHINFO_EXTENSION);
           
            // Upload de img Passo 13 Criptografar o nome
            $nome_arquivo_cripty = md5(uniqid(time()).$nome_arquivo);
            
            // Upload de img Passo 14 Variavel para dar upload
            $foto = $nome_arquivo_cripty.".".$ext;

            
            // Upload de img Passo 15 caminho onde a imagem esta temporariamente
            $arquivo_temp = $_FILES['flefoto']['tmp_name'];
            
            // Upload de img Passo 16 Diretório
            $diretorio = "../../img/";
            
            // Upload de img Passo 17
            if(move_uploaded_file($arquivo_temp, $diretorio.$foto)){
               
               $_SESSION['previewicone'] = $foto;   

               echo("<img src='../../img/".$foto."' class='img_editar'>");


            }
         }else{
            echo("<script>alert('Tamanho ultrapassa o Limite');</script>"); 
         }
      }else{
         echo("<script>alert('O tipo de extensao não pode ser upada pelo servidor (arquivos permitidos .jpg .png .jpeg)');</script>");  
      }

   }else{
      echo("<script>alert('O tamanho ou o tipo não corresponde ao que o servidor aceita');</script>");
   }
   
?>