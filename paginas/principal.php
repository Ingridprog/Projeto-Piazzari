<?php
   // autenticar Passo 15 Iniciar variavel de Sessão
   if(!isset($_SESSION)){
      session_start();
   }
?>
<!DOCTYPE HTML>
<html lang="pt-br">
   <head>
      <meta charset="utf-8">
      <title> Frajola's Pizza </title>
      <link rel="stylesheet" type="text/css" href="../css/padronizacao.css">
      <link rel="stylesheet" type="text/css" href="../css/style.css">
      <link href="https://fonts.googleapis.com/css?family=Roboto+Mono&display=swap" rel="stylesheet">
       
   </head>
   <body>
 <!--  Cabeçalho  -->
       <?php
         if(!file_exists(require_once('header.php')))
         require_once('header.php');  
        ?>
 <!-- SLIDE  -->
        <div id="slider_container">
            <figure class="center">
                <!-- setas -->
               <span class="transicao next " > </span>
               <span class="transicao prev "></span>

               <div id="slider">
                  <a href="#" class="transicao"><img src="../img/1.png" alt="Pizzaria Frajola"/></a>
                  <a href="#" class="transicao"><img src="../img/2.png" alt="Pizzaria Frajola"/></a>
                  <a href="#" class="transicao"><img src="../img/3.png" alt="Pizzaria Frajola"/></a>
                  <a href="#" class="transicao"><img src="../img/4.png" alt="Pizzaria Frajola"/></a>
                  <a href="#" class="transicao"><img src="../img/5.png" alt="Pizzaria Frajola"/></a>
               </div>
                
                <!-- legenda -->
               <figcaption ></figcaption>
            </figure>
        </div>
      <div id="conteudo_principal">
          <div class="center conteudo">      
<!-- Redes Sociais -->
              <div id="redes_sociais">
               <div class="redes_itens">       
                  <a href="https://www.instagram.com/?hl=pt-br" target="_blank"> 
                     <img src="../img/redesSociais/iconfinder_instagram_401462.png" alt="logo" class="img">
                  </a>
               </div>
               <div class="redes_itens">               
                  <a href="https://twitter.com/login?lang=pt" target="_blank"> 
                     <img src="../img/redesSociais/iconfinder_twitter_square_black_107068.png" alt="logo" class="img">
                  </a>
               </div>
               <div class="redes_itens" >               
                  <a href="https://www.facebook.com" target="_blank" >
                     <img src="../img/redesSociais/iconfinder_facebook_square_black_107119.png" alt="logo" class="img">
                  </a>
               </div>
            </div>
<!-- Menu Vertical -->
            <div id=menu_vertical>
               <ul>
                 <li class="menu_itens_vertical"><a href=""> Item 01 </a></li>
                 <li class="menu_itens_vertical"><a href=""> Item 02 </a></li>  
               </ul>
           </div>
<!-- Produtos -->
            <?php
               // autenticar Passo 16 Msgs de erro
               if(isset($_SESSION['errLogin'])){
                  echo($_SESSION['errLogin']);
               }
             ?>
            <div class="todos_produtos">
               <div class="produtos_home_caixa">
                  <div class="produtos_home">
                     <div class="img_produtos_home center">
                        <img src="../img/pizza5.png" alt="pizza" class="img">
                     </div>
                     <div class="detalhes_produtos center">
                        <p> Nome: </p>
                        <p> Descrição: </p>
                        <p> Preço: </p>
                        <div class="maisDetalhes">
                           Detalhes
                        </div>
                     </div>
                  </div>
                  <div class="produtos_home">
                     <div class="img_produtos_home center">
                        <img src="../img/pizza5.png" alt="pizza" class="img">
                     </div>
                     <div class="detalhes_produtos center">
                        <p> Nome: </p>
                        <p> Descrição: </p>
                        <p> Preço: </p>
                        <div class="maisDetalhes">
                           Detalhes
                        </div>
                     </div>
                  </div>
                  <div class="produtos_home">
                     <div class="img_produtos_home center">
                        <img src="../img/pizza5.png" alt="pizza" class="img">
                     </div>
                     <div class="detalhes_produtos center">
                        <p> Nome: </p>
                        <p> Descrição: </p>
                        <p> Preço: </p>
                        <div class="maisDetalhes">
                           Detalhes
                        </div>
                     </div>
                  </div>
               </div>
               <div class="produtos_home_caixa">
                  <div class="produtos_home">
                     <div class="img_produtos_home center">
                        <img src="../img/pizza5.png" alt="pizza" class="img">
                     </div>
                     <div class="detalhes_produtos center">
                        <p> Nome: </p>
                        <p> Descrição: </p>
                        <p> Preço: </p>
                        <div class="maisDetalhes">
                           Detalhes
                        </div>
                     </div>
                  </div>
                  <div class="produtos_home">
                     <div class="img_produtos_home center">
                        <img src="../img/pizza5.png" alt="pizza" class="img">
                     </div>
                     <div class="detalhes_produtos center">
                        <p> Nome: </p>
                        <p> Descrição: </p>
                        <p> Preço: </p>
                        <div class="maisDetalhes">
                           Detalhes
                        </div>
                     </div>
                  </div>
                  <div class="produtos_home">
                     <div class="img_produtos_home center">
                        <img src="../img/pizza5.png" alt="pizza" class="img">
                     </div>
                     <div class="detalhes_produtos center">
                        <p> Nome: </p>
                        <p> Descrição: </p>
                        <p> Preço: </p>
                        <div class="maisDetalhes">
                           Detalhes
                        </div>
                     </div>
                  </div>
               </div>
               <div class="produtos_home_caixa">
                  <div class="produtos_home">
                     <div class="img_produtos_home center">
                        <img src="../img/pizza5.png" alt="pizza" class="img">
                     </div>
                     <div class="detalhes_produtos center">
                        <p> Nome: </p>
                        <p> Descrição: </p>
                        <p> Preço: </p>
                        <div class="maisDetalhes">
                           Detalhes
                        </div>
                     </div>
                  </div>
                  <div class="produtos_home">
                     <div class="img_produtos_home center">
                        <img src="../img/pizza5.png" alt="pizza" class="img">
                     </div>
                     <div class="detalhes_produtos center">
                        <p> Nome: </p>
                        <p> Descrição: </p>
                        <p> Preço: </p>
                        <div class="maisDetalhes">
                           Detalhes
                        </div>
                     </div>
                  </div>
                  <div class="produtos_home">
                     <div class="img_produtos_home center">
                        <img src="../img/pizza5.png" alt="pizza" class="img">
                     </div>
                     <div class="detalhes_produtos center">
                        <p> Nome: </p>
                        <p> Descrição: </p>
                        <p> Preço: </p>
                        <div class="maisDetalhes">
                           Detalhes
                        </div>
                     </div>
                  </div>
               </div>
            </div>
<!-- Rodapé -->
             <?php
               if(!file_exists(require_once('footer.php')))
               require_once('footer.php'); 
               
              // autenticar Passo 17 quando a página for recarregada a variavel de sessão será destruída
               if(isset($_SESSION)){
                  session_destroy();
               }
             ?>
          </div> 
      </div>
      <script src="../js/slider.js"></script>   
   </body>
</html>