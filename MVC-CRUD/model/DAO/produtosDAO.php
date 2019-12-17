<?php
    class ProdutosDAO{
        private $conexaoMysql;
        private $conexao;

        public function __construct(){
            require_once('conexaoMysql.php');

           
            require_once('model/produtosClass.php');

            $this->conexaoMysql = new conexaoMysql();

            $this->conexao = $this->conexaoMysql->conectDatabase();
        }

        public function insertProduto(Produtos $produtos){
            $sql = "INSERT INTO tbl_produtos VALUES (null, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

            $statement = $this->conexao->prepare($sql);

            $statementDados = array(
                $produtos->getFoto(),
                $produtos->getNome(),
                $produtos->getPreco(),
                $produtos->getDescricao(),
                0,
                $produtos->getIntroDestaque(),
                $produtos->getDescricaoDestaque(),
                $produtos->getDesconto(),
                $produtos->getStatus()
            );

            if($statement->execute($statementDados)){
                return true;
            }else{
                echo('n deucerto pora');
                //return false;
                
            }
        }

        public function selectAllProdutos(){
            $sql = "SELECT * FROM tbl_produtos";
            
            $select = $this->conexao->query($sql);
            $cont = 0;
            while($rs = $select->fetch(PDO::FETCH_ASSOC)){
                $listprodutos[] = new Produtos();
                $listprodutos[$cont]->setCodigo($rs['codigo']);
                $listprodutos[$cont]->setFoto($rs['foto']);
                $listprodutos[$cont]->setNome($rs['nome']);
                $listprodutos[$cont]->setPreco($rs['preco']);
                $listprodutos[$cont]->setDescricao($rs['descricao']);
                $listprodutos[$cont]->setIntroDestaque($rs['introDestaque']);
                $listprodutos[$cont]->setDescricaoDestaque($rs['DescricaoDestaque']);
                $listprodutos[$cont]->setDesconto($rs['desconto']);
                $listprodutos[$cont]->setDestaque($rs['destaque']);
                $listprodutos[$cont]->setStatus($rs['status']);
                $cont++;
            }
            
            if(isset($listprodutos)){
                return $listprodutos;
            }else{
                return false;
            }
            
        }

        public function selectByIdProdutos($id){
            $sql = "SELECT * FROM tbl_produtos WHERE codigo=".$id;
            
            $select = $this->conexao->query($sql);
            if($rs = $select->fetch(PDO::FETCH_ASSOC)){
                $listprodutos = new Produtos();
                $listprodutos->setCodigo($rs['codigo']);
                $listprodutos->setFoto($rs['foto']);
                $listprodutos->setNome($rs['nome']);
                $listprodutos->setPreco($rs['preco']);
                $listprodutos->setDescricao($rs['descricao']);
                $listprodutos->setIntroDestaque($rs['introDestaque']);
                $listprodutos->setDescricaoDestaque($rs['DescricaoDestaque']);
                $listprodutos->setDesconto($rs['desconto']);
                $listprodutos->setDestaque($rs['destaque']);
                $listprodutos->setStatus($rs['status']);
            }
            
            return ($listprodutos);
        }

        public function updateProduto(Produtos $produtos){
            $sql = "UPDATE tbl_produtos SET foto = ?, nome = ?, preco = ?
            , descricao = ?, introDestaque = ?, DescricaoDestaque = ?
            WHERE codigo = ? ";

            $statement = $this->conexao->prepare($sql);

            $statementDados = array(
                $produtos->getFoto(),
                $produtos->getNome(),
                $produtos->getPreco(),
                $produtos->getDescricao(),
                $produtos->getIntroDestaque(),
                $produtos->getDescricaoDestaque(),
                $produtos->getCodigo()
            );

            if($statement->execute($statementDados)){
                return true;
            }else{
                return false;
            }    
        }

    }

?>