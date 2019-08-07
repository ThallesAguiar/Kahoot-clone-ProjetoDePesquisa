<?php session_start(); ?>
<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="imagens/favicon.ico">

        <title>Jogue TPhE</title>

        <!-- Principal CSS do Bootstrap -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Estilos customizados para esse template -->
        <link href="css/estilo-index.css" rel="stylesheet">
    </head>

    <body class="text-center" style="background-image: url(imagens/papel-parede.jpg);background-size:cover; background-repeat: no-repeat ">


        <!--Botão de "ENTRAR"-->
        <div class="container d-flex w-100 h-100 p-3 mx-auto flex-column">
            <header class="masthead mb-auto">
                <div class="inner">
                    <h3 class="masthead-brand" id="logo-tphe">TPhE</h3>
                    <nav class="nav nav-masthead justify-content-center">
                        <a href="#" data-toggle="modal" data-target="#modalLogin" ><button type="button" role="button" class="btn btn-warning"> Entrar</button></a>
                    </nav>
                </div>
            </header>
            <!--/ENTRAR-->


            <!--Botão para cadastrar Usuario-->
            <main role="main" class="inner cover">
                <h1 class="cover-heading" style="font-size: 1.5em">Teste seus conhecimentos,aceite este desafio.</h1>
                <p class="lead">Aprenda sobre esportes e seja o numero 1.</p>
                <p class="lead">
                    <a href="class/usuario/login.php" class="btn btn-lg btn-success">Comece agora</a>
                </p>
                <p class="text-center text-danger">
                    <?php
                    if (isset($_SESSION['loginErro'])) {
                        echo $_SESSION['loginErro'];
                        unset($_SESSION['loginErro']);
                    }
                    ?>
                </p>
            </main>
            <!--/cadastrar Usuario-->

            <footer class="mastfoot mt-auto">
                <div class="inner">
                    <p>Desenvolvido pelo <a href="http://www.iffarroupilha.edu.br/santo-angelo" target="_blank">Instituto Federal Farroupilha Campus Santo Ângelo</a>.</p>
                </div>
            </footer>
        </div>

        <!--INICIO MODAL LOGIN-->
        <div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="loginModalLabel"> </h5>
                        <button type="button" class="close btn btn-warning" data-dismiss="modal" aria-label="Fechar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <!--FORMULARIO MODAL-->
                        <form class="form-signin"  style="color: gray" method="POST" action="session/validate.php">
                            <div class="text-center mb-4">
                                <img class="mb-4" src="assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
                                <h1 class="h3 mb-3 font-weight-normal"><p>Faça seu LOGIN<br> e vamos jogar!</p></h1>
                            </div>

                            <div class="form-label-group">
                                <input type="text" id="email" name="email" class="form-control" placeholder="Email" required autofocus>
                            </div>&nbsp

                            <div class="form-label-group">
                                <input type="password" id="senha" name="senha" class="form-control" placeholder="Senha" required>
                            </div>

                            <div class="checkbox mb-3">
                                <label>
                                    <input type="checkbox" value="lembrar de mim"> Lembrar de mim
                                </label>
                            </div>
                            <button class="btn btn-lg btn-warning btn-block" type="submit">Entrar</button>
                        </form>



                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secundary" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
        <!--FIM MODAL LOGIN-->
        <!--FIM MODAL-->

        <!-- Principal JavaScript do Bootstrap
        ================================================== -->
        <!-- Foi colocado no final para a página carregar mais rápido -->
        <script>window.jQuery || document.write('<script src="vendor/jquery/jquery-slim.min.js"><\/script>')</script>
        <script src="vendor/jquery/jquery.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>