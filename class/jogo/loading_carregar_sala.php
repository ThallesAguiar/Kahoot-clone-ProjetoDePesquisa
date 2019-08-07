<?php
session_start();

echo $modo = $_GET['modo'];
echo $id_sala = $_GET['idSala'];

if ($modo == 'classico') {
    header("Refresh: 8;url=classico.php?idSala=$id_sala");
} else {
    header("Refresh: 8;url=grupo.php?idSala=$id_sala");
}
?>
<!DOCTYPE html>
<html lang="pt-br">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Carregando TPhe</title>

        <!-- Bootstrap core CSS -->
        <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="css/loading.css" rel="stylesheet">
        <style>
            body {
                background: url('imagens/background.png') no-repeat center center fixed;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                background-size: cover;
                -o-background-size: cover;
            } 
        </style>
    </head>

    <body>


        <!-- Page Content -->
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <h1 class="mt-5 text-warning">TPhE</h1>
                        <p class="h2 text-white">Prepare-se...</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h1 class="mt-5"></h1>
                        <p class="lead"></p>
                    </div>
                </div>
                <main role="main" class="inner cover">
                    <h1 class="cover-heading text-center text-white">Loading...</h1>
                    <div id="fountainG">
                        <div id="fountainG_1" class="fountainG"></div>
                        <div id="fountainG_2" class="fountainG"></div>
                        <div id="fountainG_3" class="fountainG"></div>
                        <div id="fountainG_4" class="fountainG"></div>
                        <div id="fountainG_5" class="fountainG"></div>
                        <div id="fountainG_6" class="fountainG"></div>
                        <div id="fountainG_7" class="fountainG"></div>
                        <div id="fountainG_8" class="fountainG"></div>
                    </div>
                </main>
            </div>
        </section>

        <!-- Bootstrap core JavaScript -->
        <script src="../../vendor/jquery/jquery.min.js"></script>
        <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    </body>

</html>
