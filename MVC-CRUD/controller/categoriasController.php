<?php

    class CategoriasController{
        
        private $categorias;

        public function __construct(){
            require_once('model/categoriasClass.php');
            require_once('model/DAO/CategoriasDAO.php');

            if($_SERVER['REQUEST_METHOD'] == "POST"){

                $this->categorias = new Categorias();

                $this->categorias->setNome($_POST['txtnome']);
            }
        }

        // Insere nova categoria
        public function novaCategoria(){
            $categoriasDAO = new CategoriasDAO();

            $this->categorias->setStatus(1);

            if($categoriasDAO->insertCategoria($this->categorias)){
                header('location: categoriasindex.php');
            }else{
                echo('<script>alert("Erro ao Inserir no DB")</script>');
                header('location: categoriasindex.php');
            }
        }

        public function listaCategorias(){
            $categoriasDAO = new CategoriasDAO();

            $listDados = $categoriasDAO->selectAllCategorias();

            if($listDados){
                return $listDados;
            }else{
                die(); 
            }
        }

        public function buscaCategoria($id){
            $categoriasDAO = new CategoriasDAO();

            $categoriasDados =  $categoriasDAO->selectByIdCategoria($id);

            require_once('categoriasindex.php');

            // var_dump($categoriasDados);
        }

        public function atualizaCategoria($id){

            $this->categorias->setCodigo($id);

            $categoriasDAO = new CategoriasDAO();

            if($categoriasDAO->updateCategoria($this->categorias)){
                header('location: categoriasindex.php');        
            }else{
                echo('<script>alert("Erro ao executar no DB!")</script>');
                header('location: categoriasindex.php');
            }
        }

        public function deletaCategoria($id){
            $categoriasDAO = new CategoriasDAO;

            if($categoriasDAO->deleteCategoria($id)){
                header('location: categoriasindex.php');    
            }else{
                echo('<script>alert("Erro ao executar no DB!")</script>');
                header('location: categoriasindex.php');
            }
        }
    }

?>