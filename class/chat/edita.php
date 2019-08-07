<?php
session_start();

require_once '../../config/conexao.php';
require_once './UsuarioVO.php';
require_once './UsuarioDAO.php';
require_once '../../script/mostar_imagem.php';

$usuarioVO = new UsuarioVO();
$usuarioDAO = new UsuarioDAO();


$id = $_SESSION['UsuarioID'];
$usuarioVO = $usuarioDAO->read($conn, $id);

$nome=$_SESSION['UsuarioNome'];
$query="SELECT FOTO_USUARIO FROM usuario WHERE NOME='$nome'";
$resultado= mysqli_query($conn, $query);

$linha= mysqli_fetch_array($resultado);
$foto=$linha["FOTO_USUARIO"];
?>
<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="imagens/favicon.ico">

        <title>TPhE- Configurações</title>

        <!-- Principal CSS do Bootstrap -->
        <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Estilos customizados para esse template -->
        <link href="" rel="stylesheet">
    </head>

    <body>

        <!--MENU DE NAVEGAÇÃO-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-warning">
            <a class="navbar-brand text-center" href="#">Editar dados</a>
            <!--NOME DE USUARIO E IMAGEM COM DROPDOWN-->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="dropdown badge badge-warning" style="text-decoration: none;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="h5">
                            <?php
                            echo $_SESSION['UsuarioNome'];
                            ?>
                        </div>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="edita.php">Configurações</a>
                        <a class="dropdown-item" href="#">Ajuda</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../../session/destroyed .php">Sair</a>
                    </div>
                </li>
            </ul><!--/NOME DE USUARIO E IMAGEM COM DROPDOWN-->
        </nav>
        <!--/MENU DE NAVEGAÇÃO-->

        <main class="container">
            <form method="POST" action="update.php" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-4">
                    <img src= '<?php echo "../../images_users/".$foto; ?>'class="rounded-circle" alt="" width="100" height="100">
                    <div class="form-group">
                        <label for="busca-foto">Colocar/alterar foto.</label>
                        <p><a href="http://pt.gravatar.com/" target="_blank">Ou crie um avatar.</a></p>
                        <input type="file" class="form-control-file" name="foto" id="foto" onchange="previewImagem()">
                    </div>
                </div>
            </div>
            
                <div class="form-group col-lg-3">
                    <label for="inputAddress">Username</label>
                    <input class="form-control" type="text" name="<?php $id ?>" value="<?php echo $usuarioVO->getNome(); ?>" readonly>
                </div>

                <div class="form-group col-lg-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" value="<?php echo $usuarioVO->getEmail(); ?>">
                </div>

                <div class="form-group col-lg-3">
                    <div class="form-group">
                        <label for="nome-professor">Nova senha</label>
                        <input type="password" class="form-control" name="senha" id="senha">
                    </div>
                </div>

                <a class="btn btn-danger" href="../../pagina-aluno/index.php">Cancelar</a>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        <?php 
        if(isset($_SESSION['erroUpdate'])){
            echo '<br><div class="alert alert-danger text-center h5" role="alert">'. $_SESSION['erroUpdate'].'</div>';
            unset($_SESSION['erroUpdate']);
            exit();
        }
        
        
        ?>
        <!-- FOOTER -->
        <footer class="mastfoot mt-auto">
            <div class="inner">
                <p class="text-center">Desenvolvido pelo <a href="http://www.iffarroupilha.edu.br/santo-angelo" target="_blank">Instituto Federal Farroupilha Campus Santo Ângelo</a>.</p>
            </div>
        </footer>
    </div>
</main>







<!-- Principal JavaScript do Bootstrap
================================================== -->
<!-- Foi colocado no final para a página carregar mais rápido -->
<script>window.jQuery || document.write('<script src="vendor/jquery/jquery-slim.min.js"><\/script>')</script>
<script src="../../vendor/jquery/jquery.js"></script>
<script src="../../vendor/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>