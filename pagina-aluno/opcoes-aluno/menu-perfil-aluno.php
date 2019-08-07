<?php
session_start();

require_once '../../config/conexao.php';
require_once '../../class/usuario/UsuarioVO.php';
require_once '../../class/usuario/UsuarioDAO.php';

$usuarioVO = new UsuarioVO();
$usuarioDAO = new UsuarioDAO();

$id = $_SESSION['UsuarioID'];
$usuarioVO = $usuarioDAO->read($conn, $id);
?>
<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="imagens/favicon.ico">

        <title>TPhE- Configurações Aluno</title>

        <!-- Principal CSS do Bootstrap -->
        <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Estilos customizados para esse template -->
        <link href="../css/estilo-professor.css" rel="stylesheet">
    </head>

    <body>

        <!--MENU DE NAVEGAÇÃO-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" id="logo-tphe" href="#">TPhE</a>
            <!--BOTÃO PARA APARECER QUANDO O SITE CHEGAR A 991px -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php
                            echo $_SESSION['UsuarioNome'];
                            ?> 
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Configurações</a>
                            <a class="dropdown-item" href="#">Ajuda</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="../../session/destroyed .php">Sair</a>
                        </div>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
                </form>
                <a href="../sala/criar-sala.html"><button class="btn btn-outline-danger my-2 my-sm-0" type="submit" style="margin-left: 5px">Criar QUIZ</button></a>
            </div>
        </nav>





        <main class="container">
            <div class="row">
                <div class="col-lg-4">
                    <img class="rounded-circle" src="../../imagens/user.png" alt="imagem perfil" width="100" height="100">
                    <div class="form-group">
                        <label for="busca-foto">Altere sua foto.</label>
                        <p><a href="http://pt.gravatar.com/" target="_blank">Ou crie um avatar.</a></p>
                        <input type="file" class="form-control-file" id="busca-foto">
                    </div>
                </div>
            </div>
            <form>
                <div class="form-group col-lg-3">
                    <label for="inputAddress">Username</label>
                    <input class="form-control" type="text" value="<?php echo $usuarioVO->getNome(); ?>" readonly>
                </div>

                <div class="form-group col-lg-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" value="<?php echo $usuarioVO->getEmail(); ?>">
                </div>

                <div class="form-group col-lg-3">
                    <div class="form-group">
                        <label for="nome-professor">senha</label>
                        <input type="password" class="form-control" id="senha" value="<?php echo $usuarioVO->getSenha(); ?>">
                    </div>
                </div>

                <button type="submit" class="btn btn-danger">Cancelar</button>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </main>



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