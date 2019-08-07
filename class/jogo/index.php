<?php
session_start();


require_once '../../config/conexao.php';
require_once '../sala/salaDAO.php';
require_once '../sala/salaVO.php';

//ID DA SALA RECEBIDP POR GET, ATRAVES DA URL  "JOGO.PHP?IDSALA=ID"
$id_sala = $_GET['idSala'];

$salaVO = new salaVO();
$salaDAO = new salaDAO();

$sala = $salaDAO->read($conn, $id_sala);
$sala->getNome();
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

    <body style="background-color:#eee; ">
        <header class="bg-primary text-white" style="padding: 154px 0 80px;">
            <div class="container text-center">
                <h1>TPhE</h1>
                <p class="lead bg-white text-dark rounded font-weight-bold"><?php echo $sala->getNome(); ?></p>
            </div>
        </header>

        <div class="container">

            <div class="row">
                <div class="col-lg-6 portfolio-item">
                    <div class="card h-100">
                        <img class="card-img-top" src="imagens/classic_play_badge.svg" width="15" height="150" alt="Modo Clássico">
                        <div class="card-body">
                            <h4 class="card-title">
                                <div class="justify-content-center text-center">Player vs Player <br> 1:1 </div>
                            </h4>
                            <div class="card-text"><center><a href="loading.php?modo=classico&&idSala=<?php echo $id_sala?>&&sala_espera=sala_espera" class="btn btn-success"> CLÁSSICO</a></center></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 portfolio-item">
                    <div class="card h-100">
                        <img class="card-img-top" src="imagens/team_mode_play_badge.svg"  width="15" height="150" alt="Modo Time">
                        <div class="card-body">
                            <h4 class="card-title">
                                <div class="justify-content-center text-center">Time vs Time<br> N:N </div>
                            </h4>
                            <div class="card-text"><center><a href="loading.php?modo=grupo&&idSala=<?php echo $id_sala?>&&sala_espera=sala_espera" class="btn btn-primary"> MODO TIME</a></center></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>





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
