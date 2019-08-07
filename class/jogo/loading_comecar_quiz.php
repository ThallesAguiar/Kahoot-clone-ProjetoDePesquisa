<?php
session_start();


require_once '../../config/conexao.php';
require_once '../sala/salaDAO.php';
require_once '../sala/salaVO.php';

$id_sala = $_GET['idSala'];

$salaVO = new salaVO();
$salaDAO = new salaDAO();

$sala = $salaDAO->read($conn, $id_sala);
$sala->getNome();
$sala->getSenha();
$id_quiz = $_SESSION['id_quiz'];
$id_criador = $sala->getId_usuario();


header("Refresh: 7;url=play.php?idSala=$id_sala&&id_quiz=$id_quiz");

?>
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Carregando Quiz</title>

    <!-- Principal CSS do Bootstrap -->
    <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Estilos customizados para esse template -->
    <link href="css/cover.css" rel="stylesheet">
  </head>

  <body class="text-center">
     

    <div class="container-fluid mx-auto ">
      <header class="masthead mb-auto bg-white" style="padding: 30px 0 ;">
        <div class="inner">
          <h3 class="text-center text-dark h1"><?php echo $sala->getNome(); ?></h3>
          
        </div>
      </header>

      <main role="main" class="inner cover">
        <!-- MOSTRAR IMAGEM QUE VEM DO BD OU NÃO -->
                    <?php
                    if ($sala->getImagem() == NULL) {
                        echo "<p class='lead'>";
                        echo '<img class="img-fluid rounded" src="../../imagens/campeao.jpg" class="img-fluid rounded" style="width:100%; height:60vh" alt="Imagem da Sala">';
                        echo '<div class="progress mb-1">
                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
                        </div>';
                        echo '<div class="inner bg-white p-1">
                            <h3 class="text-center text-dark"><span class="h1">Você esta pronto?</span> <br> Lá vai questão...</h3>
                            </div></p>';
                        
                    } elseif ($sala->getImagem() != NULL) {
                        $imagem = $sala->getImagem();
                        echo "<p class='lead'>";
                        echo'<img src="../../imagens_salas/' . $id_sala . '/' . $imagem . '" class="img-fluid rounded" style="width:100%; height:60vh" alt="Imagem da Sala">';
                        echo '<div class="progress mb-1">
                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
                        </div>';
                        echo '<div class="inner bg-white p-1">
                            <h3 class="text-center text-dark"><span class="h1">Você esta pronto?</span> <br> Lá vai questão...</h3>
                            </div></p>';
                    } ?>
                    <!--./ MOSTRAR IMAGEM QUE VEM DO BD OU NÃO -->
        
      </main>

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
