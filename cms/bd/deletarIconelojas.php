<?php
    if(isset($_GET['modo'])){
        if($_GET['modo'] == 'excluir'){
            require_once('../../bancoDados/conexao.php');

            $conexao = conexaoMysql();

            $codigo = $_GET['codigo'];
            $foto = $_GET['nomeFoto'];

            $sql = "DELETE FROM tblimglojas WHERE codigo=".$codigo;

            $select = mysqli_query($conexao, $sql);

            if($select){
                unlink('../../img/'.$foto);
                header('location:../paginas/gerenciarLojas.php');
            }else{
                echo($sql);
            }
        }
    }
?>