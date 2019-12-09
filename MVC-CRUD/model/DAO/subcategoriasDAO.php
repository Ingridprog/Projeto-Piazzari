<?php
    class SubcategoriasDAO{

        private $conexao;
        private $conexaoMysql;

        
        public function __construct(){
        
            // import da classe de conexão
            require_once('conexaoMysql.php');
            // para o select 
            require_once('model/subcategoriasClass.php');
            
            // instanciar do objeto de conexão
            $this->conexaoMysql = new ConexaoMysql();
            
            // Abre a conexão com o BD
            $this->conexao = $this->conexaoMysql->conectDatabase();
        }

        public function insertSubcategoria(Subcategorias $subcategorias){
            $sql = "INSERT INTO tbl_subcategorias VALUES (null, ?, ?, ?)";

            $statement = $this->conexao->prepare($sql);

            $statementDados = array(
                $subcategorias->getNome(),
                $subcategorias->getCategoria(),
                $subcategorias->getStatus()
            );
        
            if($statement->execute($statementDados)){
                return true;
            }else{
                return false;
            }
        }

        public function selectAllSubcategorias(){
            $sql = "SELECT tbl_subcategorias.*,tbl_categorias.nome,
            tbl_subcategorias.nome AS nomeSub, tbl_categorias.nome AS nomeCat
            FROM tbl_subcategorias INNER JOIN tbl_categorias ON tbl_subcategorias.categoria=
            tbl_categorias.codigo";
            
            $select = $this->conexao->query($sql);
            $cont = 0;
            while($rs = $select->fetch(PDO::FETCH_ASSOC)){
                $listsubcategorias[] = new Subcategorias();
                $listsubcategorias[$cont]->setCodigo($rs['codigo']);
                $listsubcategorias[$cont]->setNome($rs['nomeSub']);
                $listsubcategorias[$cont]->setNomeCat($rs['nomeCat']);
                $listsubcategorias[$cont]->setCategoria($rs['categoria']);
                $listsubcategorias[$cont]->setStatus($rs['status']);
                $cont++;
            }
            
            if(isset($listsubcategorias)){
                return $listsubcategorias;
            }else{
                return false;
            }
            
        }

        public function deleteSubcategorias($id){
            $sql = "DELETE FROM tbl_subcategorias WHERE codigo = ".$id; 
            
            if($this->conexao->query($sql)){
                return true;
            }else{
                return false;
            }
        }

        public function selectByIdSubcategorias($id){
            $sql = "SELECT tbl_subcategorias.*,tbl_categorias.nome,
            tbl_subcategorias.nome AS nomeSub, tbl_categorias.nome AS nomeCat
            FROM tbl_subcategorias INNER JOIN tbl_categorias ON tbl_subcategorias.categoria=
            tbl_categorias.codigo WHERE tbl_subcategorias.codigo = ".$id;

            $select = $this->conexao->query($sql);
            if($rs = $select->fetch(PDO::FETCH_ASSOC)){
                $listsubcategorias = new Subcategorias();
                $listsubcategorias->setCodigo($rs['codigo']);
                $listsubcategorias->setNome($rs['nomeSub']);
                $listsubcategorias->setCategoria($rs['categoria']);
                $listsubcategorias->setNomeCat($rs['nomeCat']);
                
            }
            return $listsubcategorias;
        }

        public function updateSubcategoria(Subcategorias $subcategorias){
            $sql = "UPDATE tbl_subcategorias SET nome = ?, categoria = ? WHERE codigo= ?";
            
            $statement = $this->conexao->prepare($sql);
            
            $statementDados = array(
                $subcategorias->getNome(),
                $subcategorias->getCategoria(),
                $subcategorias->getCodigo()
            );
            
            if($statement->execute($statementDados)){
                return true;
            }else{
                return false;
            }   
        }

        public function selectByIdCat($idcat){
            $sql = "SELECT * FROM tbl_subcategorias WHERE categoria=".$idcat;

            $select = $this->conexao->query($sql);

            $cont = 0;
            while($rs = $select->fetch(PDO::FETCH_ASSOC)){
                $listsubcategorias[] = new Subcategorias();
                $listsubcategorias[$cont]->setCodigo($rs['codigo']);
                $listsubcategorias[$cont]->setNome($rs['nome']);
                $cont++;
            }
            if(isset($listsubcategorias)){
                return $listsubcategorias;
            }
            else {
                return false;
            }
            
        }

    }
?>

