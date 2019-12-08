<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>
            Produto do Mês
        </title>
       <link rel="stylesheet" type="text/css" href="../css/padronizacao.css">
        <link href="https://fonts.googleapis.com/css?family=Roboto+Mono&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="../css/produtoDoMes.css">
    </head>
    <body>
        <?php
        if(!file_exists(require_once('header.php')))
        require_once('header.php');  
        ?>
       <!-- Título -->
         <div id="produto_destaque_titulo">
            <h1 class="center"> CONFIRA O DESTAQUE DO MÊS  </h1>
            
        </div>
        <div class="produto_destaque">
            <div class="conteudo center">
               <!-- Título, sobre e preço-->
               <div class="detalhes_produto_destaque">
                  <h2 class="center">
                     PIZZA VEGANA
                  </h2>
                  <div class="sobre_produto_destaque">
                     <p>
                        Se você se interessa pela alimentação vegana, mas acha muito difícil encontrar pizzas assim, prepare-se para se surpreender. 
                     </p>
                     <p id="ingredientes_produto_destaque">
                        Nossa pizza Vegana é feita com manjericão desidratado, molho de tomate natural, queijo vegano, rúcula temperada, azeitonas, tomates secos e orégano. Uma Delícia de Sabores.
                     </p>
                     <!-- Preço -->
                     <div class="preco_container">
                        <h3> Por Apenas: </h3>
                        <div class="preco ">
                           <span> R$ 35.99</span>
                        </div>
                     </div>
                     
                  </div>
               </div>
               <div class="img_produto_destaque">
                 <img src="../img/pizza_destaque.png" class="img" alt="pizza" title="pizza">
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