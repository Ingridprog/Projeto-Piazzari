<?php
     class ProdutosController{
        
        public function __construct(){
            require_once('model/produtosClass.php');
            require_once('model/DAO/produtosDAO.php');

            if($_SERVER['REQUEST_METHOD'] == "POST"){
                session_start();

                $this->produtos = new produtos();

                if(isset($_POST['txtnome'])){
                    $this->produtos->setNome($_POST['txtnome']);
                    $this->produtos->setPreco($_POST['frmpreco']);
                    $this->produtos->setDescricao($_POST['txtdescricao']);
                    $this->produtos->setDestaque($_POST['chkdestaque']);
                    $this->produtos->setIntroDestaque($_POST['txtdestaqueintro']);
                    $this->produtos->setDescricaoDestaque($_POST['txtdestaque']);
                    $this->produtos->setDesconto($_POST['frmdesconto']);
                }
                
                
            }    
        }
         
        public function novoProduto(){
            $produtosDAO = new ProdutosDAO();

            $this->produtos->setStatus(1);

            if($produtosDAO->insertProduto($this->produtos)){
                header('location: produtossindex.php');
            }else{
                echo('<script>alert("Erro ao Inserir no DB")</script>');
                header('location: produtossindex.php');
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

                        $diretorio = "../img/";

                        if(move_uploaded_file($arquivo_temp, $diretorio.$foto)){
                            session_start();
                            $_SESSION['previewFoto'] = $foto;

                            echo("<img src='../img/".$foto."'class='img_editar'>");

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
        
    }
?>