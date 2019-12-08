<!DOCTYPE HTML>

<html lang="pt-br">
   <head>
      <meta charset="utf-8">
      <title> Promoçoes </title>
      <link rel="stylesheet" type="text/css" href="../css/padronizacao.css">
      <link rel="stylesheet" type="text/css" href="../css/promocoes.css">
     <link href="https://fonts.googleapis.com/css?family=Roboto+Mono&display=swap" rel="stylesheet">
     <script src="../js/jquery.js"></script>   
     <script src="../js/ancora.js"></script>   
     
   </head>
   <body>
       <!--  Cabeçalho  -->
       <?php
         if(!file_exists(require_once('header.php')))
         require_once('header.php');  
        ?>
       <!--  Conteúdo  -->
       <div id="promocoes">
           <!-- topo da page -->
           <div id="faixa_titulo"> 
                <div id="color_brown" class="center"> PROMOÇÕES </div>
           </div>
           <!--  Menu das promoções  -->
           <div id="menu_promocoes">
               <div class="conteudo center">
                    <ul class="center">
                      <li class="promocoes_menu_itens float"> <a href="#pizzas"> Tradicionais </a></li>
                      <li class="promocoes_menu_itens float"> <a href="#doces"> Doces </a></li>
                      <li class="promocoes_menu_itens float"> <a href="#outras"> Outras </a></li>
                   </ul> 
               </div>                
           </div>
           <!--  Tradicionais  -->
           <div class="faixa_produtos color_black pizza" id="pizzas">
                <div class="conteudo center">
                    <h2 class="center"> Tradicionais </h2>
                    <div class="produto float">
                       <!-- Imagem do produto -->
                        <div class="img_produto center">
                           <img src="../img/pizza_tradicional.png" alt="pizza" title="pizza" class="img">
                        </div>
                        <div class="descricao">
                           <h3> Portuguesa </h3>
                           <p> Presunto, Cebola e Ovos Coberta com Mussarela </p>
                        </div>
                        <div class="preco center">
                           <h4> R$ 45, 00</h4>
                           <h3> R$ 35, 00 </h3>
                        </div>
                    </div>
                    <div class="produto float">
                       <!-- Imagem do produto -->
                        <div class="img_produto center">
                           <img src="../img/pizza_tradicional.png" alt="pizza" title="pizza" class="img">
                        </div>
                        <div class="descricao">
                           <h3> Portuguesa </h3>
                           <p> Presunto, Cebola e Ovos Coberta com Mussarela </p>
                        </div>
                        <div class="preco center">
                           <h4> R$ 45, 00</h4>
                           <h3> R$ 35, 00 </h3>
                        </div>
                    </div>
                    <div class="produto float">
                       <!-- Imagem do produto -->
                        <div class="img_produto center">
                           <img src="../img/pizza_tradicional.png" alt="pizza" title="pizza" class="img">
                        </div>
                        <div class="descricao">
                           <h3> Portuguesa </h3>
                           <p> Presunto, Cebola e Ovos Coberta com Mussarela </p>
                        </div>
                       <div class="preco center">
                           <h4> R$ 45, 00</h4>
                           <h3> R$ 35, 00 </h3>
                       </div>
                    </div>
                </div>
           </div>
          <!--  Doces  -->
           <div class="faixa_produtos color_black" id="doces">
                <div class="conteudo center">
                    <h2 class="center"> Doces </h2>
                    <div class="produto float">
                       <!-- Imagem do produto -->
                        <div class="img_produto center">
                           <img src="../img/pizza_doce.png" alt="pizza" title="pizza" class="img">
                        </div>
                        <div class="descricao">
                           <h3> M&amp;M </h3>
                           <p> Chocolate e M&amp;M </p>
                        </div>
                        <div class="preco center">
                           <h4> R$ 45, 00</h4>
                           <h3> R$ 35, 00 </h3>
                        </div>
                    </div>
                    <div class="produto float">
                       <!-- Imagem do produto -->
                        <div class="img_produto center">
                           <img src="../img/pizza_doce.png" alt="pizza" title="pizza" class="img">
                        </div>
                        <div class="descricao">
                           <h3> M&amp;M </h3>
                           <p> Chocolate e M&amp;M </p>
                        </div>
                        <div class="preco center">
                           <h4> R$ 45, 00</h4>
                           <h3> R$ 35, 00 </h3>
                        </div>
                    </div>
                    <div class="produto float">
                       <!-- Imagem do produto -->
                        <div class="img_produto center">
                           <img src="../img/pizza_doce.png" alt="pizza" title="pizza" class="img">
                        </div>
                        <div class="descricao">
                           <h3> M&amp;M </h3>
                           <p> Chocolate e M&amp;M </p>
                        </div>
                       <div class="preco center">
                           <h4> R$ 45, 00</h4>
                           <h3> R$ 35, 00 </h3>
                       </div>
                    </div>
                </div>
           </div>
          <!--  Outras  -->
           <div class="faixa_produtos color_black" id="outras">
                <div class="conteudo center">
                    <h2 class="center"> Outras </h2>
                    <div class="produto float">
                       <!-- Imagem do produto -->
                        <div class="img_produto center">
                           <img src="../img/pizza_outras.png" alt="pizza" title="pizza" class="img">
                        </div>
                        <div class="descricao">
                           <h3> Rúcula </h3>
                           <p> Mussarela coberta com Rúcula e Tomate seco </p>
                        </div>
                        <div class="preco center">
                           <h4> R$ 45, 00</h4>
                           <h3> R$ 35, 00 </h3>
                        </div>
                    </div>
                    <div class="produto float">
                       <!-- Imagem do produto -->
                        <div class="img_produto center">
                           <img src="../img/pizza_outras.png" alt="pizza" title="pizza" class="img">
                        </div>
                        <div class="descricao">
                           <h3> Rúcula </h3>
                           <p> Mussarela coberta com Rúcula e Tomate seco </p>
                        </div>
                        <div class="preco center">
                           <h4> R$ 45, 00</h4>
                           <h3> R$ 35, 00 </h3>
                        </div>
                    </div>
                    <div class="produto float">
                       <!-- Imagem do produto -->
                        <div class="img_produto center">
                           <img src="../img/pizza_outras.png" alt="pizza" title="pizza" class="img">
                        </div>
                        <div class="descricao">
                           <h3> Rúcula </h3>
                           <p> Mussarela coberta com Rúcula e Tomate seco </p>
                        </div>
                       <div class="preco center">
                           <h4> R$ 45, 00</h4>
                           <h3> R$ 35, 00 </h3>
                       </div>
                    </div>
                </div>
           </div>
     </div>
    <!--  Rodapé  -->
    <?php
         if(!file_exists(require_once('footer.php')))
            require_once('footer.php');  
     ?>
   </body>
</html>

