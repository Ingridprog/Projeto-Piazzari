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
            }
    }
?>