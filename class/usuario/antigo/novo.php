<?php
session_start();
?>
<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../imagens/favicon.ico">

        <title>Jogue TPhE - CADASTRO</title>

        <!-- Principal CSS do Bootstrap -->
        <link href="../../vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Estilos customizados para esse template -->
        <link href="css/estilo-login.css" rel="stylesheet">
    </head>

    <body class="text-center">


        <div class="container center-container">

            <header class="masthead mb-auto">   
                <div class="inner">
                    <!--LOGO-->
                    <div class=" h1 cover-heading mb-5">Quero usar o <h3 class="masthead-brand" id="logo-tphe">TPhE</h3></div>
                </div>
            </header>

            <main class="inner cover">
                <!--BOTÕES-->
                <div class="row">
                    <div class="col-sm-0 col-md">

                    </div>
                    <div class="col-sm">
                        <a href="#" data-toggle="modal" data-target="#modalProfessor" >
                            <button type="button" role="button" class="btn btn-primary"id="botao-professor" name="2">
                                Como um PROFESSOR
                            </button>
                        </a>

                    </div>
                    <div class="col-sm">
                        <a href="#" data-toggle="modal" data-target="#modalAluno" >
                            <button type="button" role="button"  class="btn btn-danger" id="botao-aluno" name="3">
                                Como um ALUNO
                            </button>
                        </a> 

                    </div>
                    <div class="col-sm-0 col-md">

                    </div>
                </div>
                <!--/BOTÕES-->
            </main>
        </div>





        <footer class="mastfoot mt-auto fixed-bottom">
            <div class="inner">
                <a href="../../index.php" class="btn btn-info">Voltar</a>
                <p>Desenvolvido pelo <a href="http://www.iffarroupilha.edu.br/santo-angelo" target="_blank">Instituto Federal Farroupilha Campus Santo Ângelo</a>.</p>
            </div>
        </footer>
    

    <?php
    require_once './modal/modal_aluno.php';
    require_once './modal/modal_professor.php';
    //require_once './modal.php';
    require_once '../../script/mostar_imagem.php';
    require_once '../../script/mostrarSenha.php';
    ?>




    <!-- Principal JavaScript do Bootstrap
    ================================================== -->
    <!-- Foi colocado no final para a página carregar mais rápido -->
    <script>window.jQuery || document.write('<script src="vendor/jquery/jquery-slim.min.js"><\/script>')</script>
    <script src="../../vendor/jquery/jquery.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.min.js"></script>


</body>
</html>