<?php
    class CategoriasDAO{
        private $conexaoMysql;
        private $conexao;

        public function __construct(){
            require_once('conexaoMysql.php');

            // para o select 
            require_once('model/categoriasClass.php');

            $this->conexaoMysql = new conexaoMysql();

            $this->conexao = $this->conexaoMysql->conectDatabase();
        }

        public function insertCategoria(Categorias $categorias){
            $sql = "INSERT INTO tbl_categorias VALUES (null, ?, ?)";

            $statement = $this->conexao->prepare($sql);

            $statementDados = array(
                $categorias->getNome(),
                $categorias->getStatus()
            );

            if($statement->execute($statementDados)){
                return true;
            }else{
                return false;
            }
        }

        public function deleteCategoria($id){
            $sql = "DELETE FROM tbl_categorias WHERE codigo=".$id;

            if($this->conexao->query($sql)){
                return true;
            }else{
                return false;
            }
        }

        public function selectAllCategorias($cat){
            $sql = "SELECT * FROM tbl_categorias WHERE codigo <>".$cat;

            $select = $this->conexao->query($sql);

            $cont = 0;

            while($rs = $select->fetch(PDO::FETCH_ASSOC)){
                $listCategorias[] = new Categorias();
                $listCategorias[$cont]->setCodigo($rs['codigo']);
                $listCategorias[$cont]->setNome($rs['nome']);
                $listCategorias[$cont]->setStatus($rs['status']);

                $cont++;
            }

            if(isset($listCategorias)){
                return $listCategorias;
            }else{
                return false;
            }   
        }

        public function selectByIdCategoria($id){
            
            $sql = "SELECT * FROM tbl_categorias WHERE codigo = ".$id;
        
            $select = $this->conexao->query($sql);

            if($rs = $select->fetch(PDO::FETCH_ASSOC)){
                $listCategorias = new Categorias();
                $listCategorias->setCodigo($rs['codigo']);
                $listCategorias->setNome($rs['nome']);
                $listCategorias->setStatus($rs['status']);
            }

            return $listCategorias;
        }

        public function updateCategoria(Categorias $categorias){
            $sql = "UPDATE tbl_categorias SET nome = ? WHERE codigo =".$categorias->getCodigo();
            
            $statement = $this->conexao->prepare($sql);

            // Array com dados 
            $statementDados = array(
                $categorias->getNome()
            );

            if($statement->execute($statementDados)){
                return true;
            }else{
                return false;
            }    

        }

        // STATUS Passo 04
        public function updateStatusCategoria(Categorias $categorias){
            // Script para executar no bd
            $sql = "UPDATE tbl_categorias SET status = ? WHERE codigo=".$categorias->getCodigo();

            $statement = $this->conexao->prepare($sql);

            $statementDados = array(
                $categorias->getStatus()
            );

            if($statement->execute($statementDados)){
                return true;
            }else{
                return false;
            }

        }
    }

?>