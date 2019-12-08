<?php 
   
// Verifica a existencia da variavel modo
if(isset($_GET['modo']))
{
    //Verifica se a variavel modo tem a ação de excluir
    if($_GET['modo'] == 'excluir')
    {
        //importa o arquivo de conexao
        require_once('conexao.php');
        // Abre a conexao 
        $conexao = conexaoMysql();
        
        // 06/11 excluir Foto p2 Recuperar a variavel
        $codigo = $_GET['codigo'];
        $nomeFoto = $_GET['nomeFoto'];
        $sql = "delete from tblcontatos where codigo =".$codigo;
        
        // 06/11 excluir Foto p3 antes de redirecionar primeiro apaga o arq
        // unlink() apaga o arq
        if(mysqli_query($conexao, $sql))
        {
            unlink('arquivos/'.$nomeFoto);
            header('location:../banco.php');
        }
        else
        {
            echo("Erro ao deletar!");
        }
        //echo($sql);
    }
}
?>