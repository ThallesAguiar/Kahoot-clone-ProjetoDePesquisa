<?php
session_start();


require_once '../../config/conexao.php';
require_once '../sala/salaDAO.php';
require_once '../sala/salaVO.php';
require_once './QuizDAO.php';
require_once './QuizVO.php';

$id_sala = $_SESSION['id_sala'];

$salaVO = new salaVO();
$salaDAO = new salaDAO();
$quizVO = new quizVO();
$quizDAO = new quizDAO();

$sala = $salaDAO->read($conn, $id_sala);
$sala->getSenha();
$id_quiz = $_SESSION['id_quiz'];
$id_criador = $sala->getId_usuario();



$query = "SELECT usuario.NOME FROM usuario WHERE ID_USUARIO=$id_criador";
$resultado = mysqli_query($conn, $query);
$linha = mysqli_fetch_array($resultado);
$nome_criador = $linha["NOME"];
?>

<!DOCTYPE html>
<html lang="pt-br">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>TPhE - Sala criada</title>

        <!-- Bootstrap core CSS -->
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
            </ul><!--/NOME DE USUARIO E IMAGEM-->
            <a class="btn btn-success mr-3" href="../jogo/index.php?idSala=<?php echo $id_sala?>"><span class="h5">Pronto!!!</span></a>
            <a class="btn btn-info" href="javascript:func()" onclick="confirmacao_Sala('<?php echo $id_sala; ?>')">Abandonar</a>
        </nav>
        <header class="bg-primary text-white" style="padding: 154px 0 100px;">
            <div class="container text-center">
                <h1>TPhE</h1>
                <p class="lead">Let's Play!</p>
            </div>
        </header>

        <!-- Page Content -->
        <div class="container">

            <div class="row">

                <!-- Sidebar Widgets Column -->
                <div class="col-md-4">

                    <!-- Search Widget -->
                    <div class="card my-4">
                        <h5 class="card-header">Configurações da sala</h5>
                        <div class="card-body">
                            <div class="col-md-12">
                                <a class="btn btn-light" href="../sala/edita.php?id=<?php echo $id_sala ?>"><img src="imagens/editar.png" width="25">Editar</a>

                                <a class="btn btn-light" href="javascript:func()" onclick="confirmacao_Sala('<?php echo $sala->getId_sala(); ?>')"><img src="imagens/excluir.png" width="25">Excluir</a>

                            </div>
                        </div>
                    </div>
                    <div class="card my-4">
                        <h5 class="card-header">Visivel para</h5>
                        <div class="card-body">
                        <?php echo $sala->getVisivel() ?>
                        </div>
                    </div>

                    <!-- Categories Widget -->
                    <div class="card my-4">
                        <h5 class="card-header">Categories</h5>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <ul class="list-unstyled mb-0">
                                        <li>
                                            <a href="#">Web Design</a>
                                        </li>
                                        <li>
                                            <a href="#">HTML</a>
                                        </li>
                                        <li>
                                            <a href="#">Freebies</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-lg-6">
                                    <ul class="list-unstyled mb-0">
                                        <li>
                                            <a href="#">JavaScript</a>
                                        </li>
                                        <li>
                                            <a href="#">CSS</a>
                                        </li>
                                        <li>
                                            <a href="#">Tutorials</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Side Widget -->
                    <div class="card my-4">
                        <h5 class="card-header">Descrição</h5>
                        <div class="card-body">
                        <?php echo $sala->getDescricao(); ?>    
                        </div>
                    </div>
                </div>

                <!-- Post Content Column -->
                <div class="col-lg-8">

                    <!-- NOME DA SALA -->
                    <h1 class="mt-4"><?php echo utf8_decode($sala->getNome()); ?></h1>
                    <!-- ./NOME DA SALA -->


                    <!-- AUTOR CRIADOR DA SALA -->
                    <p class="lead">
                        por <span class="text-primary h4"><?php echo $nome_criador; ?></span>
                    </p><!--./ AUTOR CRIADOR DA SALA -->

                    <hr>

                    <!-- MOSTRA A DATA/HOTA QUE FOI CRIADO -->
                    <p>Criado as <?php echo $sala->getData() ?></p>
                    <!--./ MOSTRA A DATA/HOTA QUE FOI CRIADO -->
                    <hr>



                    <!-- MOSTRAR IMAGEM QUE VEM DO BD OU NÃO -->
                    <?php
                    if ($sala->getImagem() == NULL) {
                        echo '<img class="img-fluid rounded" src="../../imagens/campeao.jpg"  width="300" height="500" alt="">';
                    } elseif ($sala->getImagem() != NULL) {
                        $imagem = $sala->getImagem();
                        echo'<img src="../../imagens_salas/' . $id_sala . '/' . $imagem . '" class="img-fluid rounded" width="400" alt="Imagem da Sala">';
                    }
                    ?>
                    <!--./ MOSTRAR IMAGEM QUE VEM DO BD OU NÃO -->


                    <hr>
                    <a href="novo.php" type="button" class="btn btn-primary btn-lg btn-block">Criar QUIZ <img src="imagens/mais.png"></a>

                    <hr>

<?php
$cont = 0;
$contador = $quizDAO->qtd_Quizes($conn, $id_sala);
//CONTADOR PARA A NUMERAÇÃO DE QUIZES
for ($i = 1; $i < $contador; $i++) {
    $cont = $cont + 1;
}

$todos_quiz = $quizDAO->quiz_Sala($conn, $id_sala);

foreach ($todos_quiz as $quiz) {
    $quiz->getId_quiz();
    $quiz->getId_usuario();
    $quiz->getId_sala();
    $quiz->getPergunta();
    $quiz->getTempo();
    $quiz->getResposta_correta();
    $quiz->getResposta_um();
    $quiz->getResposta_dois();
    $quiz->getResposta_tres();
    $quiz->getResposta_quatro();







    //<!--SOBRE QUIZ-->
    $id_quiz = $quiz->getId_quiz();
    $pergunta_quiz = utf8_decode($quiz->getPergunta());
    $tempo_quiz = $quiz->getTempo();


    echo '<div class="card mb-3">';
    //<!--<img class="card-img-top" src=".../100px180/" alt="Imagem de capa do card">-->
    echo "<div class='card-body'>
                            <h5 class='card-title'></h5>
                            <div class='col-md-2 float-right'>";
    echo '<a href="javascript:func()" onclick="confirmacao(' . $id_quiz . ')"><img src="imagens/remover_quiz.png" width="30" title="Excluir questão"></a><br><br>';
    echo "<a href='edita.php?id=$id_quiz'><img src='imagens/editar_quiz.png' width='30' title='Editar questão'></a>
                            </div>
                            <div class='card-text h3 col-md-10'><span class='h1 text-danger'>$i -</span>  $pergunta_quiz</div>
                            <p class='card-text'><small class='text-muted'>Tempo limite de $tempo_quiz  Segundos'</small></p>
                        </div>
                    </div>
                    
                    <hr>";
    //<!--/.SOBRE QUIZ-->
}
?>

                </div>



            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->




        <!-- Bootstrap core JavaScript -->
        <script src="../../vendor/jquery/jquery.min.js"></script>
        <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!--Script para mostrar confirmação para apagar-->
        <script language="Javascript">
                                    function confirmacao(id) {
                                        var resposta = confirm("Deseja remover a questão " + id + "?");

                                        if (resposta == true) {
                                            window.location.href = "deleta.php?id=" + id;
                                        }
                                    }

                                    function confirmacao_Sala(id) {
                                        var resposta = confirm("Deseja abandonar a sua sala " + id + "?");

                                        if (resposta == true) {
                                            window.location.href = "../sala/deleta.php?id=" + id;
                                        }
                                    }
        </script>

    </body>

</html>
