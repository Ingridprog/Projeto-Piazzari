<?php
     class ProdutosController{
        private $produtos;
        private $produtoDAO;

        public function __construct(){
            require_once('model/produtosClass.php');
            require_once('model/DAO/produtosDAO.php');

            if($_SERVER['REQUEST_METHOD'] == "POST"){
                session_start();

                $this->produtos = new Produtos();
                if(isset($_POST['txtnome'])){
                    $this->produtos->setNome($_POST['txtnome']);
                    $this->produtos->setPreco($_POST['frmpreco']);
                    $this->produtos->setDescricao($_POST['txtdescricao']);
                    $this->produtos->setDesconto($_POST['frmdesconto']);
                }
                
            }
            $this->produtoDAO = new ProdutosDAO();    
        }
         
        public function novoProduto(){
            $vazio = "";

            $this->produtos->setFoto($_SESSION['previewFoto']);

            $this->produtos->setStatus(1);

            if(isset($_POST['txtdestaqueintro'])){
                $this->produtos->setIntroDestaque($_POST['txtdestaqueintro']);
            }else{
                $this->produtos->setIntroDestaque($vazio);
            }

            if(isset($_POST['txtdestaque'])){
                $this->produtos->setDescricaoDestaque($_POST['txtdestaque']);
            }else{
                $this->produtos->setDescricaoDestaque($vazio);
            }

            if($this->produtoDAO->insertProduto($this->produtos)){
                header('location: produtosindex.php');
            }else{
                echo('<script>alert("Erro ao Inserir no DB");</script>');
                //header('location: produtosindex.php');
            }
        } 
        
         
         
        public function previewFoto(){
            if($_FILES['flefoto']['size'] > 0 && $_FILES['flefoto']['type'] != ""){

                $arquivo_size = $_FILES['flefoto']['size'];

                $tamanho_arquivo = round($arquivo_size/1024);

                $arquivos_permitidos = array("image/jpeg", "image/png", "image/jpg");

                $ext_arquivo = $_FILES['flefoto']['type'];

                if(in_array($ext_arquivo, $arquivos_permitidos)){

                    if ($tamanho_arquivo < 2000){

                        $nome_arquivo = pathinfo($_FILES['flefoto']['name'], PATHINFO_FILENAME);

                        $ext = pathinfo($_FILES['flefoto']['name'], PATHINFO_EXTENSION);

                        $nome_arquivo_cripty = md5(uniqid(time()).$nome_arquivo);

                        $foto = $nome_arquivo_cripty.".".$ext;

                        $arquivo_temp = $_FILES['flefoto']['tmp_name'];

                        $diretorio = "view/img/";

                        if(move_uploaded_file($arquivo_temp, $diretorio.$foto)){
                           
                            $_SESSION['previewFoto'] = $foto;

                            echo("<img src='view/img/".$foto."' class='img_default'>");

                        }else{
                            echo("errr");
                        }

                    }else{
                        echo("<script>
                            alert('Tamanho ultrapassa o Limite');
                       </script>");    
                    }   
                }else{
                    echo("<script>
                        alert('O tipo de extensao não pode ser upada pelo servidor (arquivos permitidos .jpg .png .jpeg)');
                   </script>");    
                }       
            }else{
               echo("<script>
                        alert('O tamanho ou o tipo não corresponde ao que o servidor aceita');
                   </script>");    
            }
        }


        public function listaProdutos(){
            $produtosDAO = new ProdutosDAO();

            $listDados = $produtosDAO->selectAllProdutos();

            if($listDados){
                return $listDados;
            }else{
                die(); 
            }
        }

        public function buscaProduto($id){
            $produtoDAO = new ProdutosDAO();
            
            $produtos = $produtoDAO->selectByIdProdutos($id);

            require_once('produtosindex.php');
        }

        public function atualizaProdutos($id){
            $produtosDAO = new ProdutosDAO();

            if(!isset($_SESSION['previewFoto'])){
                $this->produtos->setFoto($_SESSION['nomeFoto']);
            }
            else{
                $this->produtos->setFoto($_SESSION['previewFoto']);
                $fotoAntiga = $_SESSION['nomeFoto'];
            }
                

            $this->produtos->setCodigo($id);

            if(isset($_POST['txtdestaqueintro'])){
                $this->produtos->setIntroDestaque($_POST['txtdestaqueintro']);
            }else{
                $this->produtos->setIntroDestaque($vazio);
            }

            if(isset($_POST['txtdestaque'])){
                $this->produtos->setDescricaoDestaque($_POST['txtdestaque']);
            }else{
                $this->produtos->setDescricaoDestaque($vazio);
            }


            if($produtosDAO->updateProduto($this->produtos)){
                if(isset($fotoAntiga))
                    unlink('view/img/'.$fotoAntiga);

                unset($_SESSION['nomeFoto']);

                header("location: produtosindex.php");
            }else{
                echo("alert('Errooou')");
                header("location: produtosindex.php");
            }

        }
        
    }
?>