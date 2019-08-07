<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="imagens/favicon.ico">

        <title>TPhE- Pagina PROFESSOR</title>

        <!-- Principal CSS do Bootstrap -->
        <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Estilos customizados para esse template -->
        <link href="../css/estilo-professor.css" rel="stylesheet">
    </head>

    <body>

        <!--MENU DE NAVEGAÇÃO-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" id="logo-tphe" href="#">TPhE</a>
            <!--BOTÃO PARA APARECER QUANDO O SITE CHEGAR A 991px -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.html">Home <span class="sr-only">(página atual)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Professor 
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Meu perfil</a>
                            <a class="dropdown-item" href="#">Meus QUIZ</a>
                            <a class="dropdown-item" href="#">Meus Alunos</a>
                            <a class="dropdown-item" href="#">Configurações</a>
                            <a class="dropdown-item" href="#">Ajuda</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Sair </a>
                        </div>
                    </li>
                </ul>
                <div class="col-lg-5 criar-quiz" >
                    Selecione o tipo de jogo
                </div>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
                </form>
            </div>
        </nav>

                <div class="container">

                    <div class="row">

                    <div class="col-lg-3">

                        <h1 class="my-4">Seu TPhE</h1>
                        <div class="container">
                        <div class="header">Status</div>
                        <a href="#" class="list-group-item">Category 2</a>
                        <a href="#" class="list-group-item">Category 3</a>
                        </div>

                    </div>
                    <!-- /.col-lg-3 -->

                    <div class="col-lg-9">
                        <div class="row">
                            <form method="post" action="sala-criada.php">
                

                                <p>Selecione o seu tipo de jogo.</p>
                                <div class="row">

                                <div class="form-check col-sm-4">
                                        <input class="form-check-input" type="radio" name="quiz" id="quiz" value="quiz" checked style="display: none">
                                        <label class="form-check-label" for="quiz">
                                                <button type="radio" class="btn btn-warning botoes-tipo-jogo">QUIZ</button>
                                        </label>
                                </div>
                                <div class="form-check col-sm-4">
                                        <input class="form-check-input" type="radio" name="cb" id="cb" value="cb"style="display: none">
                                        <label class="form-check-label" for="cb">
                                                <button type="radio" class="btn btn-warning botoes-tipo-jogo">Quebra-Cabeça</button>
                                        </label>
                                </div>
                                <div class="form-check col-sm-4">
                                        <input class="form-check-input" type="radio" name="pc" id="pc" value="pc"style="display: none">
                                        <label class="form-check-label" for="quiz">
                                                <button type="radio" class="btn btn-warning botoes-tipo-jogo">Palavras-Cruzadas</button>
                                        </label>
                                </div>
                            </div>
                            <br><br><br>
                                <a href="sala-criada.php"> <button type="submit" class="btn btn-success">Vamos lá</button></a>
                            </form>



                                            </div>
                                        </div>

                                        

                                    </div>
                                    

                                    </div>
                                   

                                    


        <!-- FOOTER -->
        <footer class="mastfoot mt-auto fixed-bottom">
            <div class="inner">
                <p class="text-center">Desenvolvido pelo <a href="http://www.iffarroupilha.edu.br/santo-angelo" target="_blank">Instituto Federal Farroupilha Campus Santo Ângelo</a>.</p>
            </div>
        </footer>
    </div>
</main>







<!-- Principal JavaScript do Bootstrap
================================================== -->
<!-- Foi colocado no final para a página carregar mais rápido -->
<script>window.jQuery || document.write('<script src="../vendor/jquery/jquery-slim.min.js"><\/script>')</script>
<script src="../../vendor/jquery/jquery.js"></script>
<script src="../../vendor/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>