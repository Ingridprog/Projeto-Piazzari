<?php
    $btnTopo = "salvar";

    if(!isset($_SESSION)){
        session_start();
    }

    if(isset($_GET['modo'])){
        if($_GET['modo'] == 'editar'){
            
            require_once('../../bancoDados/conexao.php');

            $conexao = conexaoMysql();

            $codigo = $_GET['codigo'];
            $_SESSION['codigo'] = $codigo;
            
            $sql = "SELECT * FROM tbltoposobre WHERE codigo=".$codigo;
            
            $select = mysqli_query($conexao, $sql);
            
            if($select){
                $rsTopoedit = mysqli_fetch_array($select);
                $nomeFoto = $rsTopoedit['foto'];
                $_SESSION['nomeFoto'] = $nomeFoto;
                $btnTopo = "editar";
            }

        }
    }
?>

<!DOCTYPE HTML>

<html lang="pt-br">
   <head>
      <meta charset="utf-8">
      <title> CMS | Gerenciar Sobre </title>
      <link rel="stylesheet" href="../css/topoSobre.css" type="text/css">
      <link href="https://fonts.googleapis.com/css?family=Amatic+SC&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Playfair+Display&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="../css/padronizacao.css" type="text/css">
      <script src="../js/jquery.js"></script>
      <script src="../js/jquery.form.js"></script>
      <script>
            // upload de img passo 01
            $('#fileFoto').live('change', function(){
                $('#frmimg').ajaxForm({
                    target: '#carrega_img' // call back do upload.php
                }).submit();    

            });
      </script>
   </head>
   <body>
        <!-- Cabeçalho -->
        <?php
            if(!file_exists(require_once('header.php')))
            {
               require_once('header.php');
            }
        ?>
        <div id="container_img_frm">
            <div class="conteudo center">
                <h1 class="texto_fonte">
                    Administração Topo da página
                </h1>
                <div class="frms center">
                    <form action="../bd/uploadtoposobre.php" id="frmimg" name="frmfoto" method="post"  enctype="multipart/form-data">
                        <input type="file" name="flefoto" value="" class="texto_fonte" id="fileFoto" >
                    </form>
                    <form action="../bd/salvartopo.php" method="post">
                        <div id="carrega_img" class="center">
                            <img src="../../img/<?=$nomeFoto?>" class="img_editar">
                        </div>
                        <div id="btntopo" class="center">
                            <input type="submit" value="<?=$btnTopo?>" name="btntopo" id="botao" class="texto_fonte">
                        </div>
                    </form>
                </div>
                <div class="container_ver_topo center">
                    <div class="campos_topo_container">
                        <div class="campos_topo_cd texto_fonte">
                            Codigo 
                        </div>
                        <div class="campos_topo texto_fonte">
                            Imagem
                        </div>
                        <div class="campos_topo_cd texto_fonte">
                            Ações 
                        </div>
                    </div>
                    <?php
                        // ver toposobre Passo 1 Importar o arquivo de conexão 
                        require_once('../../bancoDados/conexao.php');
        
                        // ver toposobre Passo 2 Chama a função
                        $conexao = conexaoMysql();

                        // ver toposobre Passo 3 script     
                        $sql = "SELECT * FROM tbltoposobre";

                        //ver toposobre Passo 4 Conecta com o banco e manda o script
                        $select = mysqli_query($conexao, $sql);
                        
                        // ver toposobre Passo 5 laço que repete enquanto o banco tiver conteúdo
                        while($rsTopo = mysqli_fetch_array($select)){
                    ?>
                    <div class="dados_topo_container texto_fonte">
                        <div class="dados_topo">
                             <?=$rsTopo['codigo']?> 
                        </div>
                        <div class="dados_topo_img texto_fonte">
                             <img src="../../img/<?=$rsTopo['foto']?>" class="img_top center">   
                        </div>
                        <div class="dados_topo texto_fonte">
                            
                                <!-- Editar toposobre passo 01 -->
                                <a href="topoSobre.php?codigo=<?=$rsTopo['codigo']?>&modo=editar">
                                    <img src="../img/editar.png" alt="icon" class="icon_topo" title="editar"> 
                                </a>
                                <!-- Excluir toposobre passo 01 -->
                                <a 
                                   <?php
                                       if($rsTopo['status'] == 1){
                                   ?>
                                       onclick="alert('Não é possivel excluir!')"  
                                   <?php
                                       }else{
                                    ?>
                                       href="../bd/deletarTopo.php?modo=excluir&codigo=<?=$rsTopo['codigo']?>&nomeFoto=<?=$rsTopo['foto']?>" onclick="return confirm('Deseja excluir?');" 
                                   <?php
                                       }
                                   ?>
                                   >
                                    <img src="../img/excluir.png" alt="icon" class="icon_topo" title="excluir"> 
                                </a>
                                <!-- ativar/ desativar ícone passo 01 passando o codigo e status via get -->
								<?php
									if($rsTopo['status'] == 1){
								?>
								<a onclick="alert('Você não desativar este campo! Clique no que deseja ativar')" >
									<img src="../img/ativa.png" class="icon_topo" alt="ativa" title="ativa">
								</a>
								<?php
									}else{
								?>
								<a href="../bd/statusTopo.php?codigo=<?=$rsTopo['codigo']?>&status=<?=$rsTopo['status']?>">
									<img src="../img/desativar.png" class="icon_topo" alt="ativa" title="ativa">
								</a>
								<?php
									}
								?>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
        <!-- Rodapé -->
        <?php
            if(!file_exists(require_once('footer.php')))
            {
                require_once('footer.php');
            }
        ?>  
   </body>
</html>