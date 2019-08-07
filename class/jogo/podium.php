<?php
session_start();


require_once '../../config/conexao.php';
require_once '../sala/salaDAO.php';
require_once '../sala/salaVO.php';
require_once '../quiz/quizDAO.php';
require_once '../quiz/quizVO.php';

$id_quiz = $_GET['id_quiz'];
$id_sala = $_GET['idSala'];

$salaVO = new salaVO();
$salaDAO = new salaDAO();
$quizVO = new quizVO();
$quizDAO = new quizDAO();

$sala = $salaDAO->read($conn, $id_sala);

$quiz = $quizDAO->read($conn, $id_quiz);



echo '<embed src="sons/We_Are_The Champions.mp3" autostart="true" loop="false"  width="0" height="0">';
//header("Refresh: 10;url=resposta.php?idSala=$id_sala");
?>
<!DOCTYPE html>
<html lang="pt-br">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Podium TPhE</title>

        <!-- Bootstrap core CSS -->
        <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="css/3-col-portfolio.css" rel="stylesheet">

    </head>

    <body style="background: #5133a5;">

        <!-- Page Content -->
        <div class="container">

            <!-- Page Heading -->
            <h1 class="my-4 text-center text-light" style="border-bottom: 1px">PODIUM<br>
                <small><img src="imagens/podium.png"></small>
            </h1>
            <div class="row">
                <img src="imagens/novo_jogo.png" width="50" height="40"><a href="../sala/listar.php" class="btn btn-light text-right">Novo Jogo</a>
            </div>

            <div class="row">
                <div class="col-lg-4 col-sm-6 portfolio-item mt-5">
                    <p class="card-text text-center text-white rounded-top h2 p-2" style="background: #461f8d;">Thalles</p>
                    <div class="card" style="background: #8550bc;height: 200px;">
                        <center><img class="" src="imagens/prata.png" width="80" alt=""></center>
                        <div class="card-body">
                            <div class="col h4">XXXXX PONTOS</div>
                            <p class="card-text"></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 portfolio-item mt-5">
                    <p class="card-text text-center text-white rounded-top h2 p-2" style="background: #461f8d;">Thalles</p>
                    <div class="card" style="background: #8550bc;height: 250px;">
                        <center><img class="" src="imagens/ouro.png" width="80" alt=""></center>
                        <div class="card-body">
                            <div class="col h4">XXXXX PONTOS</div>
                            <p class="card-text"></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 portfolio-item mt-5">
                    <p class="card-text text-center text-white rounded-top h2 p-2" style="background: #461f8d;">Thalles</p>
                    <div class="card" style="background: #8550bc;height: 150px;">
                        <center><img class="" src="imagens/bronze.png" width="80" alt=""></center>
                        <div class="card-body">
                            <div class="col h4">XXXXX PONTOS</div>
                            <p class="card-text"></p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container -->

            <!-- Bootstrap core JavaScript -->
            <script src="../../vendor/jquery/jquery.min.js"></script>
            <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    </body>

</html>
