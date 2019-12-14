<?php
    $controller = (string) null;
    $modo = (string) null;

    // Resgata os get do formulário para verificar o modo e o controller
    $controller = $_GET['controller'];
    $modo = $_GET['modo'];

    switch(strtoupper($controller)){
        case 'CATEGORIAS':
            require_once('controller/CategoriasController.php');

            switch(strtoupper($modo)){
                case 'NOVO':
                    $categoriasController = new CategoriasController();
                    $categoriasController->novaCategoria();
                break;

                case 'BUSCAR':
                    $id = $_GET['id'];
                    $categoriasController = new CategoriasController();
                    $categoriasController->buscaCategoria($id);
                break;

                case 'EDITAR':
                    $id = $_GET['id'];
                    $categoriasController = new CategoriasController();
                    $categoriasController->atualizaCategoria($id);
                break;

                case 'EXCLUIR':
                    $id = $_GET['id'];
                    $categoriasController = new CategoriasController();
                    $categoriasController->deletaCategoria($id);
                break;

                // STATUS Passo 2
                case 'STATUSCAT':
                    // Resgata os valores passados via get
                    $id = $_GET['id'];
                    $status = $_GET['status'];

                    // Instancia da classe controller
                    $categoriasController = new CategoriasController();

                    // Chama o método, passando o id e o status
                    $categoriasController->statusCategoria($id, $status);

                break;
            }
        break;

        case 'SUBCATEGORIAS':
            require_once('controller/subCategoriasController.php');
            switch(strtoupper($modo)){
                case 'NOVO':
                    $subcategoriasController = new SubcategoriasController();
                    $subcategoriasController->novaSubcategoria();
                break; 
                
                case 'EXCLUIR':
                    $id = $_GET['id'];
                    $subcategoriasController = new SubcategoriasController();
                    $subcategoriasController->deletaSubcategorias($id);
                break;
                case 'BUSCAR':
                    $id = $_GET['id'];
                    $subcategoriasController = new SubcategoriasController();
                    $subcategoriasController->buscaSubcategoria($id);
                break;
                case 'EDITAR':
                    $id = $_GET['id'];
                    $subcategoriasController = new SubcategoriasController();
                    $subcategoriasController->atualizaSubcategoria($id);
                break;

                case 'PORCATEGORIA':
                    $slt = $_POST['sltcat'];
                    $subcategoriasController = new SubcategoriasController();
                    $subcategoriasController->porCategoria($slt);
                break; 
                
            }
        break;
        case 'PRODUTOS':
            require_once('controller/produtosController.php');

            switch(strtoupper($modo)){
                    
                case 'FOTO':
                    $produtosController = new ProdutosController();
                    $produtosController->previewFoto();
                break;
                    
                case 'NOVO':
                    $produtosController = new ProdutosController();
                    $produtosController->novoProduto();    
                break;
                    
            }
        break;
    }
?>