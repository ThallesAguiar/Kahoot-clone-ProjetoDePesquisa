<?php 
session_start();

require_once '../config/conexao.php';

$nome = $_SESSION['UsuarioNome'];
$query = "SELECT FOTO_USUARIO FROM usuario WHERE NOME='$nome'";
$resultado = mysqli_query($conn, $query);

$linha = mysqli_fetch_array($resultado);
$foto = $linha["FOTO_USUARIO"];
?>
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
        <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Estilos customizados para esse template -->
        <link href="css/estilo-professor.css" rel="stylesheet">
    </head>

    <body>
<!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-warning">
            
            <!--NOME DE USUARIO E IMAGEM COM DROPDOWN-->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="dropdown-toggle h6" style="text-decoration: none;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src= '<?php echo "../images_users/" . $nome . '/' . $foto; ?>'class="rounded-circle" width=50 height=50>
                        <?php
                        echo $_SESSION['UsuarioNome'];
                        ?>

                    </a>
                    &nbsp&nbsp&nbsp&nbsp
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="../class/usuario/edita.php">Configurações</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../session/destroyed.php">Sair</a>
                    </div>
                </li>
            </ul><!--/NOME DE USUARIO E IMAGEM-->
            
            <?php 
            $query="SELECT * FROM chat";
            $resultado= mysqli_query($conn, $query);
            //contar o tatal de itens
            $total_msg_contato= mysqli_num_rows($resultado);
            
            $query="SELECT * FROM sala WHERE ID_USUARIO={$_SESSION['UsuarioID']}";
            $resultado_sala= mysqli_query($conn, $query);
            //contar o tatal de itens
            $total_sala_criadas= mysqli_num_rows($resultado_sala);
            ?>

            <!--games e mensagens-->
            <!--GAMES-->
            <a class="" style="text-decoration: none;" href="../class/sala/loading.php?u=professor">
                <img src="../imagens/games.png" width="20" height="20" class="d-inline-block align-top" alt="">
                <span class="badge badge-light"><?php echo $total_sala_criadas; ?></span>
            </a>&nbsp&nbsp&nbsp
            <!--/GAMES-->

            

            <!--MENSAGEM-->
            <a class="" style="text-decoration: none;" href="../class/chat/index.php">
                <img src="../imagens/mensage.png" width="20" height="20" class="d-inline-block align-top" alt="">
                <span class="badge badge-light"><?php echo $total_msg_contato; ?></span>
            </a>&nbsp&nbsp&nbsp&nbsp
            <!--MENSAGEM-->
            <!--/Notificações e mensagens-->

            <!--FORMULARIO DE PESQUISAR-->
            <form class="form-inline my-2 my-lg-0" method="POST" action="index.php">
                <input class="form-control mr-sm-2" type="text" placeholder="Pesquisar" name="nome" aria-label="Pesquisar">
                <input class="btn btn-outline-success my-2 my-sm-0" name="SendPesq" value="Pesquisar" type="submit">
            </form><!--/FORMULARIO DE PESQUISAR-->

            <!--CRIAR QUIZ-->
            <a href="../class/sala/index.php"><button class="btn btn-outline-danger my-2 my-sm-0" type="button" style="margin-left: 5px">Criar SALA</button></a>
            
       
    </nav>

        
        <div class="container-fluid">	
            <main role="main">
                <!--CARROSSEL-->
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="first-slide" src="../imagens/MastereignMultiSports.png" alt="First slide">
                            <div class="container">
                                <div class="carousel-caption text-left"  style="text-shadow: 0px 0px 3px black">
                                    <h1>CRIE SEUS PRÓPRIOS QUIZES</h1>
                                    <p>Crie seus QUIZES e desafie seus alunos.<br> Torne eles os MELHORES.</p>
                                    <p><a class="btn btn-lg btn-primary" href="sala/criar-sala.html" role="button">Criar QUIZ</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img class="second-slide" src="../imagens/quadra.jpg" alt="Second slide">
                            <div class="container">
                                <div class="carousel-caption" style="text-shadow: 0px 0px 3px black">
                                    <h1>Seu Quiz, suas regras.</h1>
                                    <p>Coloque regras em seus Quizes. Dificulte no tempo, perguntas e respostas.</p>
                                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Criar suas perguntas</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img class="third-slide" src="../imagens/carrosel3.jpg" alt="Third slide">
                            <div class="container">
                                <div class="carousel-caption text-right"  style="text-shadow: 0px 0px 3px black">
                                    <h1>Acompanhamento e atualizações</h1>
                                    <p>Acompanhe a pontuação de seus alunos e avalie</p>
                                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Acompanhar</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Voltar</span>
                    </a>
                    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Avançar</span>
                    </a>
                </div>
        </div><!--FIM CARROSSEL-->


        <!-- Mensagens de marketing e outras featurezinhas
        ================================================== -->
        <!-- Envolve o resto da página em outro container, para centralizar todo o conteúdo. -->

        <div class="container marketing">

            <!-- Três colunas de texto, abaixo do carousel -->
            <!--INFOMAÇÕES DE ALUNOS-->
            <div class="row">
                <div class="col-lg-4">
                    <img class="rounded-circle" src="../imagens/thalles.jpg" alt="Generic placeholder image" width="140" height="140">
                    <h2>ALUNO 1</h2>
                    <p>Concluiu as atividades e, adquiriu xxxxx pontos.</p>
                    <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <img class="rounded-circle" src="../imagens/aluno.png" alt="Generic placeholder image" width="140" height="140">
                    <h2>ALUNO 2</h2>
                    <p>Concluiu as atividades e, adquiriu xxxxx pontos.</p>
                    <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <img class="rounded-circle" src="../imagens/globe.png" alt="Generic placeholder image" width="140" height="140">
                    <h2>ALUNO 3</h2>
                    <p>Concluiu as atividades e, adquiriu xxxxx pontos.</p>
                    <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
                </div><!-- /.col-lg-4 -->
                <p class="lead">
                    <a href="login/index.html" class="btn btn-lg btn-info">Mais Alunos</a>
                </p>
            </div><!-- /.row -->


            <main role="main" class="container">
                <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-purple rounded shadow-sm">
                    <img class="mr-3" src="../../assets/brand/bootstrap-outline.svg" alt="" width="48" height="48">
                    <div class="lh-100">
                        <h6 class="mb-0 text-white lh-100">Minhas</h6>
                        <small>Salas</small>
                    </div>
                </div>

                <div class="my-3 p-3 bg-white rounded shadow-sm">
                    <h6 class="border-bottom border-gray pb-2 mb-0">Atualizações recentes</h6>
                    <div class="media text-muted pt-3">
                        <img data-src="holder.js/32x32?theme=thumb&bg=007bff&fg=007bff&size=1" alt="" class="mr-2 rounded">
                        <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                            <strong class="d-block text-gray-dark">@usuario</strong>
                            Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.
                        </p>
                    </div>
                    <div class="media text-muted pt-3">
                        <img data-src="holder.js/32x32?theme=thumb&bg=e83e8c&fg=e83e8c&size=1" alt="" class="mr-2 rounded">
                        <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                            <strong class="d-block text-gray-dark">@usuario</strong>
                            Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.
                        </p>
                    </div>
                    <div class="media text-muted pt-3">
                        <img data-src="holder.js/32x32?theme=thumb&bg=6f42c1&fg=6f42c1&size=1" alt="" class="mr-2 rounded">
                        <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                            <strong class="d-block text-gray-dark">@usuario</strong>
                            Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.
                        </p>
                    </div>
                    <small class="d-block text-right mt-3">
                        <a href="#">Todas atualizações</a>
                    </small>
                </div>

<!--                <div class="my-3 p-3 bg-white rounded shadow-sm">
                    <h6 class="border-bottom border-gray pb-2 mb-0">Solicitações</h6>
                    <div class="media text-muted pt-3">
                        <img data-src="holder.js/32x32?theme=thumb&bg=007bff&fg=007bff&size=1" alt="" class="mr-2 rounded">
                        <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                            <div class="d-flex justify-content-between align-items-center w-100">
                                <strong class="text-gray-dark">Nome completo</strong>
                                <a href="#">Adicionar</a>
                            </div>
                            <span class="d-block">@usuário</span>
                        </div>
                    </div>
                    <div class="media text-muted pt-3">
                        <img data-src="holder.js/32x32?theme=thumb&bg=007bff&fg=007bff&size=1" alt="" class="mr-2 rounded">
                        <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                            <div class="d-flex justify-content-between align-items-center w-100">
                                <strong class="text-gray-dark">Nome completo</strong>
                                <a href="#">Adicionar</a>
                            </div>
                            <span class="d-block">@usuário</span>
                        </div>
                    </div>
                    <div class="media text-muted pt-3">
                        <img data-src="holder.js/32x32?theme=thumb&bg=007bff&fg=007bff&size=1" alt="" class="mr-2 rounded">
                        <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                            <div class="d-flex justify-content-between align-items-center w-100">
                                <strong class="text-gray-dark">Nome completo</strong>
                                <a href="#">Adicionar</a>
                            </div>
                            <span class="d-block">@usuário</span>
                        </div>
                    </div>
                    <small class="d-block text-right mt-3">
                        <a href="#">Todas sugestões</a>
                    </small>
                </div>-->
            </main>
            <!--</div><!-- /.container -->


            <!-- FOOTER -->
            <footer class="mastfoot mt-auto">
                <div class="inner">
                    <p class="text-center">Desenvolvido pelo <a href="http://www.iffarroupilha.edu.br/santo-angelo" target="_blank">Instituto Federal Farroupilha Campus Santo Ângelo</a>.</p>
                </div>
            </footer>
        </div>
    </main>







    <!-- Principal JavaScript do Bootstrap
    ================================================== -->
    <!-- Foi colocado no final para a página carregar mais rápido -->
    <script>window.jQuery || document.write('<script src="vendor/jquery/jquery-slim.min.js"><\/script>')</script>
    <script src="../vendor/jquery/jquery.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>