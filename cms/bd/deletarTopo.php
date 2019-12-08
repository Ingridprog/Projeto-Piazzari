<?php
    if(isset($_GET['modo'])){
        if($_GET['modo'] == 'excluir'){

            $codigo = $_GET['codigo'];

            $nomeFoto = $_GET['nomeFoto'];

            require_once('../../bancoDados/conexao.php');

            $conexao = conexaoMysql();

            $sql = "DELETE FROM tbltoposobre WHERE codigo=".$codigo;

            $select = mysqli_query($conexao, $sql);

            if($select){
                unlink('../../img/'.$nomeFoto);

                header('location:../paginas/topoSobre.php');
            }else{
                echo($sql);
            }
        }
    }
?>