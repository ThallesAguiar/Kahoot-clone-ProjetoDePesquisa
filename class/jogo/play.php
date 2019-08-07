<?php
session_start();


require_once '../../config/conexao.php';
require_once '../sala/salaDAO.php';
require_once '../sala/salaVO.php';
require_once '../quiz/quizDAO.php';
require_once '../quiz/quizVO.php';

$id_sala = $_GET['idSala'];
$id_quiz = $_GET['id_quiz'];

$salaVO = new salaVO();
$salaDAO = new salaDAO();
$quizVO = new quizVO();
$quizDAO = new quizDAO();

$sala = $salaDAO->read($conn, $id_sala);

$quiz = $quizDAO->read($conn, $id_quiz);


header("Refresh: 4;url=resposta.php?idSala=$id_sala&&id_quiz=$id_quiz");
?>
<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../../../favicon.ico">

        <title>Pergunta do Quiz - TPhE</title>

        <!-- Principal CSS do Bootstrap -->
        <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Estilos customizados para esse template -->
        <link href="css/cover.css" rel="stylesheet">
    </head>

    <body class="text-center bg-white">

        <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
            <header class="masthead mb-auto bg-info rounded">
                <div class="inner">
                    <h3 class="text-center p-1">Questão 1 de 3</h3>
                    <nav class="nav nav-masthead justify-content-center">
                        <a class="nav-link active" href="#"></a>
                        <a class="nav-link" href="#"></a>
                        <a class="nav-link" href="#"></a>
                    </nav>
                </div>
            </header>

            <main role="main" class="inner cover">
                <h1 class="cover-heading text-dark"><?php echo $quiz->getPergunta(); ?></h1>
                <div class="progress  mt-5 m-auto">
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
                </div>
                <p class="lead">
                </p>
            </main>

            <footer class="mastfoot mt-auto">
                <div class="inner">
                </div>
            </footer>
        </div>

        <!-- Principal JavaScript do Bootstrap
        ================================================== -->
        <!-- Foi colocado no final para a página carregar mais rápido -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
        <script src="../../vendor/bootstrap/js/popper.min.js"></script>
        <script src="../../vendor/bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>
