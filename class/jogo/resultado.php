<?php
if (isset($_GET['nulo'])) {
    $nulo = $_GET['nulo'];
    $id_quiz = $_GET['quiz'];
    $id_sala = $_GET['sala'];
} else {
    $resposta = $_GET['resposta'];
    $id_quiz = $_GET['id_quiz'];
    $id_sala = $_GET['id_sala'];
}

session_start();


require_once '../../config/conexao.php';
require_once '../sala/salaDAO.php';
require_once '../sala/salaVO.php';
require_once '../quiz/quizDAO.php';
require_once '../quiz/quizVO.php';



$salaVO = new salaVO();
$salaDAO = new salaDAO();
$quizVO = new quizVO();
$quizDAO = new quizDAO();

$sala = $salaDAO->read($conn, $id_sala);

$quiz = $quizDAO->read($conn, $id_quiz);
$resposta_correta = $quiz->getResposta_correta();


switch (isset($_GET)) {
    case (isset($nulo)):
        $mensagem='<div class="alert alert-warning h2" role="alert">Seu tempo Esgotou!!!</div>';
        break;
    case ($resposta==$resposta_correta):
        $mensagem = '<div class="alert alert-success h2" role="alert">Parabéns! Você acertou!!!</div>';
        break;
    case ($resposta!=$resposta_correta):
        $mensagem = '<div class="alert alert-danger h2" role="alert">BAAAAH! Você errou, boa sorte na proxima!!!</div>';
        break;
    
        
    
}

echo '<embed src="sons/Gongo chinês.wav" autostart="true" loop="false"  width="0" height="0">';
//header("Refresh: 10;url=resposta.php?idSala=$id_sala");
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

        <style>

            #r4{
                background-color:#e47b85;
            }
            .esquerdo{
                background-color: rgba(0,0,0,.5);
            }
        </style>
    </head>

    <body class="text-center bg-white" onload="start();">


        <div class="container-fluid">

            <header class="masthead mb-auto bg-info rounded">
                <div class="inner">
                    <h3 class="text-center p-3"><?php echo $quiz->getPergunta(); ?></h3>
                </div>
            </header>

            <?php echo $mensagem; ?>


            <div class="row justify-content-center">
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 ">
                    <div class="card col-8 bg-success hover rounded">
                        <img class="" src="imagens/correta.png" alt="Correta"><h3>2</h3>
                    </div>
                    <div class="card col-8 bg-success hover rounded">
                        <div class="card-body text-dark">
                            <h3 class="card-title">
                                <img class="" src="imagens/triangulo.png" alt="">
                            </h3>
                            <p class="card-text"></p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 ">
                    <div class="card col-8 hover rounded" id="r4">
                        <img class="" src="imagens/correta.png" alt="Correta"><h3>2</h3>
                    </div>
                    <div class="card col-8 hover rounded" id="r4">
                        <div class="card-body text-dark">
                            <h3 class="card-title">
                                <img class="" src="imagens/quadrado.png" alt="">
                            </h3>
                            <p class="card-text"></p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 ">
                    <div class="card col-8 bg-danger hover rounded">
                        <img class="" src="imagens/correta.png" alt="Correta"><h3>2</h3>
                    </div>
                    <div class="card col-8 bg-danger hover rounded">
                        <div class="card-body text-dark">
                            <h3 class="card-title">
                                <img class="" src="imagens/circulo.png" alt="">
                            </h3>
                            <p class="card-text"></p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 ">
                    <div class="card col-8 bg-primary hover rounded">
                        <img class="" src="imagens/correta.png" alt="Correta"><h3>2</h3>
                    </div>
                    <div class="card col-8 bg-primary hover rounded">
                        <div class="card-body text-dark">
                            <h3 class="card-title">
                                <img class="" src="imagens/x.png" alt="">
                            </h3>
                            <p class="card-text"></p>
                        </div>
                    </div>
                </div>

                <a href="podium.php?idSala=<?php echo $id_sala;?>&&id_quiz=<?php echo $id_quiz;?>" class="btn btn-warning">Continuar</a>
            </div>


            
                <div class="row mt-5">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 portfolio-item mt-2">
                        <div class="bg-success col hover  rounded">
                            <div class="row card-body">
                                <div class="col-2 esquerdo">
                                    <img class="" src="imagens/triangulo.png" alt="Triangulo">
                                </div>
                                <div class="col-8 h3 text-left" style="color:#fff;">
                                    <?php echo $quiz->getResposta_um(); ?>
                                </div>
                                <div class="col-2">
                                    <img class="" src="imagens/correta.png" alt="Correta">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 portfolio-item mt-2">
                        <div class="hover col-12 rounded" id="r4">
                            <div class="row card-body">
                                <div class="col-2 esquerdo">
                                    <img class="" src="imagens/quadrado.png" alt="Quadrado">
                                </div>
                                <div class="col-8 h3 text-left" style="color:#fff;">
                                    <?php echo $quiz->getResposta_dois(); ?>
                                </div>
                                <div class="col-2">
                                    <img class="" src="imagens/correta.png" alt="Correta">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 portfolio-item mt-2">
                        <div class="bg-danger col-12 hover rounded">
                            <div class="row card-body">
                                <div class="col-2 esquerdo">
                                    <img class="" src="imagens/circulo.png" alt="Circulo">
                                </div>
                                <div class="col-8 h3 text-left" style="color:#fff;">
                                    <?php echo $quiz->getResposta_tres(); ?>
                                </div>
                                <div class="col-2">
                                    <img class="" src="imagens/correta.png" alt="Correta">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 portfolio-item mt-2">
                        <div class="bg-primary col-12 hover rounded">
                            <div class="row card-body">
                                <div class="col-2 esquerdo">
                                    <img class="" src="imagens/x.png" alt="X">
                                </div>
                                <div class="col-8 h3  text-left" style="color:#fff;">
                                    <?php echo $quiz->getResposta_quatro(); ?>
                                </div>
                                <div class="col-2">
                                    <img class="" src="imagens/correta.png" alt="Correta">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <!-- /.row -->


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


