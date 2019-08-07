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

echo '<embed src="sons/Spyro the Dragon Soundtrack - Aristans Homeworld.mp3" autostart="true" loop="true"  width="0" height="0">';
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
            #tempo{
                font: bold 48px Arial;
                background-color: #56a7ff;
                padding: 25px;
                color: #f90;
                border: 2px solid #56a7ff;
                text-align: center;
                border-radius: 50px;
                height: 100px;

            }
            .hover:hover{
                background-color: rgba(0,0,0,.1);
            }
            #r4{
                background-color:#e47b85;
            }
            #r4:hover{
                background-color:#cc6d76;
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
            <!--Cronometro-->
            <div class="row h-50">
                <div id="tempo"></div>
            </div>
            <form method="get" action="resultado.php">
                <input  name="id_quiz" value="<?php echo $id_quiz; ?>" readonly hidden>
                <input  name="id_sala" value="<?php echo $id_sala; ?>" readonly hidden>
                <div class="row mt-2">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 portfolio-item mt-2">
                        <button type="submit" class="bg-success col hover  rounded" name="resposta" value="resposta_um">
                            <div class="row card-body">
                                <div class="col-2 esquerdo">
                                    <img class="" src="imagens/triangulo.png" alt="Triangulo">
                                </div>
                                <div class="col-8 h3 text-left" style="color:#fff;">
                                    <?php echo $quiz->getResposta_um(); ?>
                                </div>
                                <div class="col-2">
                                </div>
                            </div>
                        </button>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 portfolio-item mt-2">
                        <button type="submit" class="hover col-12 rounded" id="r4" name="resposta" value="resposta_dois">
                            <div class="row card-body">
                                <div class="col-2 esquerdo">
                                    <img class="" src="imagens/quadrado.png" alt="Quadrado">
                                </div>
                                <div class="col-8 h3 text-left" style="color:#fff;">
                                    <?php echo $quiz->getResposta_dois(); ?>
                                </div>
                                <div class="col-2">
                                </div>
                            </div>
                        </button>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 portfolio-item mt-2">
                        <button type="submit" class="bg-danger col-12 hover rounded" name="resposta" value="resposta_tres">
                            <div class="row card-body">
                                <div class="col-2 esquerdo">
                                    <img class="" src="imagens/circulo.png" alt="Circulo">
                                </div>
                                <div class="col-8 h3 text-left" style="color:#fff;">
                                    <?php echo $quiz->getResposta_tres(); ?>
                                </div>
                                <div class="col-2">
                                </div>
                            </div>
                        </button>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 portfolio-item mt-2">
                        <button type="submit" class="bg-primary col-12 hover rounded" name="resposta" value="resposta_quatro">
                            <div class="row card-body">
                                <div class="col-2 esquerdo">
                                    <img class="" src="imagens/x.png" alt="X">
                                </div>
                                <div class="col-8 h3  text-left" style="color:#fff;">
                                    <?php echo $quiz->getResposta_quatro(); ?>
                                </div>
                                <div class="col-2">
                                </div>
                            </div>
                        </button>
                    </div>
                </div>
            </form>
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
    
    <script>
            var count = new Number();
            var count = "<?php echo $quiz->getTempo() + 1; ?>";
            var sala = "<?php echo $id_sala; ?>";
            var quiz = "<?php echo $id_quiz; ?>";

            function start() {
                if ((count - 1) >= 0) {
                    count = count - 1;
                    if (count == 0) {
                        //count = "FIM!";
                        window.location.href = "resultado.php?nulo=nulo&&sala="+sala+"&&quiz="+quiz;
                    } else if (count < 10) {
                        count = "0" + count;
                    }
                    tempo.innerText = count;
                    setTimeout('start();', 1000);
                }
            }
        </script>
</body>
</html>


