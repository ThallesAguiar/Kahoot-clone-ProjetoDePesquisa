<?php
session_start();
require_once './salaDAO.php';
require_once './salaVO.php';
require_once '../../config/conexao.php';

$salaVO=new salaVO();
$salaDAO=new salaDAO();

$nome = $_SESSION['UsuarioNome'];

$id_sala=$_GET['id'];
$sala=$salaDAO->read($conn,$id_sala);

?>
<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="imagens/favicon.ico">

        <title>TPhE- Criar sala</title>

        <!-- Principal CSS do Bootstrap -->
        <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body>
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-warning">

            <!--NOME DE USUARIO E IMAGEM COM DROPDOWN-->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="dropdown-toggle h6" style="text-decoration: none;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php
                        echo $_SESSION['UsuarioNome'];
                        ?>

                    </a>
                    &nbsp&nbsp&nbsp&nbsp
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="../../class/usuario/edita.php">Configurações</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../../session/destroyed.php">Sair</a>
                    </div>
                </li>
                <div class="btn bg-primary text-warning">CRIAR SALA</div>
            </ul><!--/NOME DE USUARIO E IMAGEM-->
        </nav>


        <div class="container">
            <form method="POST" action="atualiza.php" enctype="multipart/form-data">
                <div class="form-row">
                    <input type="text" class="form-control" name="id" id="id" value="<?php echo $id_sala;?>" >
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Nome da Sala (obrigatório)</label>
                        <input type="text" class="form-control" name="nome" id="nome" value="<?php echo $sala->getNome();?>">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Senha</label>
                        <input type="password" class="form-control" rows="1" name="senha" id="senha" value="<?php echo $sala->getSenha();?>">
                    </div>


                    <div class="form-group col-md-6">
                        <label for="exampleFormControlTextarea1">Descrição (obrigatório)</label>
                        <input class="form-control" name="descricao" rows="3" value="<?php echo $sala->getDescricao();?>" >
                    </div>
                    <div class="form-group col-md-6">
                        Visível para
                        <select class="form-control" name="visivel" id="visivel" value="<?php echo $sala->getVisivel();?>">
                            <option value="<?php echo $sala->getVisivel();?>"></option>
                            <option>Só eu</option>
                            <option>Todos</option>
                        </select>
                    </div>

<!--                    <div class="form-group col-md-4">
                        <div class="card col-sm-12" style="width: 21rem;">
                            <img class="card-img-top" src="../../imagens/campeao.jpg" alt="Imagem da sala"  width="100" height="200">
                        </div>
                        <div class="custom-file">
                            <input type="file" class="form-control custom-file-input" name="imagem" onchange="previewImagem()">
                            <label class="custom-file-label" for="imagem">Escolher arquivo</label>
                        </div>
                    </div>-->
                </div>
                <button type="submit" class="btn btn-success">OK! atualizar</button>
                <a href="../quiz/index.php" class="btn btn-info">Voltar</a>
            </form>
        </div>
    </main>

<!-- Principal JavaScript do Bootstrap
    ================================================== -->
    <!-- Foi colocado no final para a página carregar mais rápido -->
    <script>window.jQuery || document.write('<script src="../../vendor/jquery/jquery-slim.min.js"><\/script>')</script>
    <script src="../../vendor/jquery/jquery.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--SCRIPT PARA MOSTRAR IMAGEM -->
    <script>
        function previewImagem() {
            var imagem = document.querySelector('input[name=imagem]').files[0];
            var preview = document.querySelector('img');

            var reader = new FileReader();

            reader.onloadend = function () {
                preview.src = reader.result;
            }

            if (imagem) {
                reader.readAsDataURL(imagem);
            } else {
                preview.src = "";
            }
        }
    </script>
    <!--/.SCRIPT PARA MOSTRAR IMAGEM -->
</body>
</html>