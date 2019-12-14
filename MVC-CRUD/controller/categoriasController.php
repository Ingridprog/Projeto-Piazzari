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

        public function listaCategorias($cat){
            $categoriasDAO = new CategoriasDAO();

            $listDados = $categoriasDAO->selectAllCategorias($cat);

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
            $categoriasDAO = new CategoriasDAO();

            if($categoriasDAO->deleteCategoria($id)){
                header('location: categoriasindex.php');    
            }else{
                echo('<script>alert("Erro ao executar no DB!")</script>');
                header('location: categoriasindex.php');
            }
        }

        // STATUS Passo 03
        public function statusCategoria($id, $status){
            // Instancia da classe Categorias 
           $categoria = new Categorias();

           if($status == 1){
               $status = 0;
           }else{
               $status = 1;
           }

            // Chama o método set para receber o id e o status    
           $categoria->setCodigo($id);
           $categoria->setStatus($status);

            // Instancia da classe CategoriasDAO
            $categoriasDAO = new CategoriasDAO();

            // Chama o método para atualizar o status no bd 
            // STATUS Passo 05 se deu certo redireciona para a mesma página
            if($categoriasDAO->updateStatusCategoria($categoria)){
                header("location: categoriasindex.php");
            }else{
                echo("<script>alert('Erro ao mudar STATUS!')</script>");
                header("location: categoriasindex.php");
            }

        }
    }

?>