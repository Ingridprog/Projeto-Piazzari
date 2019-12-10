<?php
    class SubcategoriasController{

        private $subcategorias;

        public function __construct(){
            require_once('model/SubcategoriasClass.php');
            require_once('model/DAO/SubcategoriasDAO.php');

            if($_SERVER['REQUEST_METHOD'] == "POST"){
                session_start();

                $this->subcategorias = new Subcategorias();

                if(isset($_POST['txtnome']) AND isset($_POST['sltcat'])){
                    $this->subcategorias->setNome($_POST['txtnome']);
                    $this->subcategorias->setCategoria($_POST['sltcat']);
                }
                
            }
        }

        // Insere nova categoria
        public function novaSubcategoria(){
            $subcategoriasDAO = new SubcategoriasDAO();

            $this->subcategorias->setStatus(1);

            if($subcategoriasDAO->insertSubcategoria($this->subcategorias)){
                header('location: subcategoriasindex.php');
            }else{
                echo('<script>alert("Erro ao Inserir no DB")</script>');
                header('location: subcategoriasindex.php');
            }
        }

        public function listaSubcategorias(){
            $subcategoriasDAO = new SubcategoriasDAO();
            $listDados = $subcategoriasDAO->selectAllSubcategorias();
            if($listDados){
                return $listDados;
            }else{
                die(); 
            }
        }

        public function deletaSubcategorias($id){
            // Instancia da classe contatoDAO
            $subcategoriasDAO = new SubcategoriasDAO();
            
            // método para excluir o registro do bd
            if($subcategoriasDAO->deleteSubcategorias($id)){
                header('location: subcategoriasindex.php');    
            }else{
                echo('Erro ao excluir o registro no bd!');
            }
        }

        public function buscaSubcategoria($id){
            $subcategoriasDAO = new SubcategoriasDAO();
            $subcategoriasDados = $subcategoriasDAO->selectByIdSubcategorias($id);

            require_once('subcategoriasindex.php');
            
        }

        public function atualizaSubcategoria($id){
            $this->subcategorias->setCodigo($id);
            
           
            $subcategoriasDAO = new SubcategoriasDAO();
       
            if($subcategoriasDAO->updateSubcategoria($this->subcategorias)){
                header('location:subcategoriasindex.php');    
            }else{
                echo('Erro ao inserir o registro no bd!');
            }    
        }

        public function porCategoria($slt){
            
            $subcategoriasDAO = new SubcategoriasDAO();

            if($subcategoriasDados = $subcategoriasDAO->selectByIdCat($slt)){
                $cont = 0;
                
                $_SESSION['categoria'] = $subcategoriasDados[$cont]->getCodigo();
                

                while($cont < count($subcategoriasDados)){
                    echo("<input type='radio' name='rdosub' value='".$subcategoriasDados[$cont]->getCodigo()."'>".$subcategoriasDados[$cont]->getNome());
                    $cont++;
                }
            }
            else {
                die();
            }   
        }
        

    }

?>