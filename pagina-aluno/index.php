<?php
session_start();

require_once '../config/conexao.php';

$nome = $_SESSION['UsuarioNome'];
$query = "SELECT FOTO_USUARIO FROM usuario WHERE NOME='$nome'";
$resultado = mysqli_query($conn, $query);

$linha = mysqli_fetch_array($resultado);
$foto = $linha["FOTO_USUARIO"];
?>
<!DOCTYPE html>
<html lang="pt-br">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>TPhE- Pagina inicial</title>

        <!-- Bootstrap core CSS -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="css/shop-item.css" rel="stylesheet">
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
            ?>

            <!--Notificações e mensagens-->
            <!--GAMES-->
            <a class="" style="text-decoration: none;" href="../class/sala/loading.php?u=aluno">
                <img src="../imagens/games.png" width="20" height="20" class="d-inline-block align-top" alt="">
                <span class="badge badge-light">0</span>
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
            
        </div>
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-lg-3">
                <h1 class="my-4 bg-warning text-center rounded">TPhE</h1>
                <div class="list-group">
                    <?php 
            require_once '../config/conexao.php';
            
            $SendPesq=filter_input(INPUT_POST,'SendPesq',FILTER_SANITIZE_STRING);
            if ($SendPesq){
                $nome=filter_input(INPUT_POST,'nome',FILTER_SANITIZE_STRING);
                $query="SELECT * FROM usuario WHERE nome LIKE '%nome%'";
                $resultado= mysqli_query($conn, $query);
                while ($row_usuario= mysqli_fetch_assoc($resultado)){
                    echo "ID: ".$row_usuario['ID_USUARIO'].'<br>';
                    echo "Nome: ".$row_usuario['NOME'].'<br>';
                    echo "Email: ".$row_usuario['EMAIL'].'<br>';
                }
            }
            ?>
                </div>
            </div>
            <!-- /.col-lg-3 -->

            <div class="col-lg-9">

                <div class="card mt-4">
                    <img class="card-img-top img-fluid" src="../imagens/campeao1.jpg" alt="">
                    <div class="card-body">
                        <h3 class="card-title">Torne-se o Campeão do seu jogo.</h3>
                        <p class="card-text">Procure o seu professor e o desafie, mostre que você é o CAMPEÃO!<br> E ao final, avalie o desafio proposto por seu professor, votando com as estrelinhas.</p>
                        <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span>
                        4.0 stars
                    </div>
                </div>
                <!-- /.card -->

<!--                <div class="card card-outline-secondary my-4">
                    <div class="card-header">
                        Product Reviews
                    </div>
                    <div class="card-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
                        <small class="text-muted">Posted by Anonymous on 3/1/17</small>
                        <hr>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
                        <small class="text-muted">Posted by Anonymous on 3/1/17</small>
                        <hr>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
                        <small class="text-muted">Posted by Anonymous on 3/1/17</small>
                        <hr>
                        <a href="#" class="btn btn-success">Leave a Review</a>
                    </div>
                </div>
                 /.card -->

            </div>
            <!-- /.col-lg-9 -->

        </div>

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="mastfoot mt-auto">
        <div class="inner">
            <p class="text-center">Desenvolvido pelo <a href="http://www.iffarroupilha.edu.br/santo-angelo" target="_blank">Instituto Federal Farroupilha Campus Santo Ângelo</a>.</p>
        </div>
        <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
