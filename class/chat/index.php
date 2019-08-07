<?php
session_start();

require_once '../../config/conexao.php';

$nome = $_SESSION['UsuarioNome'];

$query = "SELECT * FROM usuario WHERE NOME='$nome'";
$resultado = mysqli_query($conn, $query);

$linha = mysqli_fetch_array($resultado);
$foto = $linha["FOTO_USUARIO"];
$id = $linha['ID_USUARIO'];
?>

<?php
$query = "SELECT * FROM chat";
$resultado = mysqli_query($conn, $query);
//contar o tatal de itens
$total_msg_contato = mysqli_num_rows($resultado);
?>

<!DOCTYPE html>
<html lang="pt-br">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>TPhE - Recados</title>

        <!-- Bootstrap core CSS -->
        <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="css/style.css" rel="stylesheet">

        <script>
            function ajax() {
                var req = new XMLHttpRequest();

                req.onreadystatechange = function () {
                    if (req.readyState == 4 && req.status == 200) {
                        document.getElementById('chat').innerHTML = req.responseText;
                    }
                }
                req.open('GET', 'chat.php', true);
                req.send();
            }
            setInterval(function () {
                ajax()
            }, 1000);
        </script>
        <script
            src="https://code.jquery.com/jquery-3.3.1.js"
            integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous"></script>

    </head>

    <body onload="ajax();">
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-warning">

            <!--NOME DE USUARIO E IMAGEM COM DROPDOWN-->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="dropdown-toggle h6" style="text-decoration: none;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src= '<?php echo "../../images_users/" . $nome . '/' . $foto; ?>'class="rounded-circle" width=50 height=50>
                        <?php
                        echo $_SESSION['UsuarioNome'];
                        ?>

                    </a>
                    &nbsp&nbsp&nbsp&nbsp
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="../usuario/edita.php">Configurações</a>
                        <a class="dropdown-item" href="#">Ajuda</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../../session/destroyed .php">Sair</a>
                    </div>
                </li>
            </ul><!--/NOME DE USUARIO E IMAGEM-->

            <!--Notificações e mensagens-->
            <!--GAMES-->
            <a class="" style="text-decoration: none;" href="#">
                <img src="../../imagens/games.png" width="20" height="20" class="d-inline-block align-top" alt="">
                <span class="badge badge-light">7</span>
            </a>&nbsp&nbsp&nbsp
            <!--/GAMES-->

            <!--NOTIFICAÇÃO-->
            <a class="" style="text-decoration: none;" href="#">
                <img src="../../imagens/notificacao.png" width="20" height="20" class="d-inline-block align-top" alt="">
                <span class="badge badge-light">4</span>
            </a>&nbsp&nbsp&nbsp
            <!--/NOTIFICAÇÃO-->

            <!--MENSAGEM-->
            <a class="" style="text-decoration: none;" href="#">
                <img src="../../imagens/mensage.png" width="20" height="20" class="d-inline-block align-top" alt="">
                <span class="badge badge-light"><?php echo $total_msg_contato; ?></span>
            </a>&nbsp&nbsp&nbsp&nbsp
            <!--MENSAGEM-->
            <!--/Notificações e mensagens-->

            <!--FORMULARIO DE PESQUISAR-->
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
            </form><!--/FORMULARIO DE PESQUISAR-->
        </nav>
        <a href="#menu-toggle" class="btn btn-primary" id="menu-toggle">Contatos</a>


        <div class="container">
            <div id="wrapper">

                <!-- Sidebar -->
                <!-- Slide de contatos-->
                <form method="get" action="index.php">
                    <div class="rounded-right" id="sidebar-wrapper">
                        <ul class="sidebar-nav">
                            <li class="sidebar-brand">
                                <a href="#">
                                    Online <img src="../../imagens/online.png" class="rounded-circle" width="15" height="15">
                                </a>
                            </li>
                            <li>
                                <input type="radio" name="contato">Contato 1
                            </li>
                            <li>
                                <a href="#">Shortcuts</a>
                            </li>
                            <li>
                                <a href="#">Overview</a>
                            </li>
                            <li>
                                <a href="#">Events</a>
                            </li>
                            <li>
                                <a href="#">About</a>
                            </li>
                            <li>
                                <a href="#">Services</a>
                            </li>
                            <li>
                                <a href="#">Contact</a>
                            </li>
                        </ul>
                    </div>
                </form>
                <!-- /#sidebar-wrapper -->






                <!--CHAT-->                
                <div class="container">
                    <div id="chat_box">
                        <div id="chat"></div>

                    </div>

                    <form method="POST" action="index.php">
                        <textarea class="textarea" name="msg" placeholder="Enviar recado..."></textarea>
                        <button class="btn btn-primary col-md-12" type="submit" name="submit" value="Enviar"/>Enviar
                        <img src="imagens/icon-enviar.png" width="25" height="25">
                        </button>



                    </form>
                    <?php
                    if (isset($_POST['submit'])) {
                        $id_usuario = $id;
                        $nome = $_SESSION['UsuarioNome'];
                        $msg = $_POST['msg'];

                        $query = "INSERT INTO chat (nome,mensagem,id_usuario) VALUES ('$nome','$msg',$id)";

                        $resultado = mysqli_query($conn, $query);

                        if ($resultado) {
                            echo "<embed loop='false' src='msn_mail_alert.mp3' hidden='true' autoplay='true'/";
                        }
                    }
                    ?>
                </div><!--/. CHAT-->

            </div>

        </div>





        <!-- Bootstrap core JavaScript -->
        <script src="../../vendor/jquery/jquery.min.js"></script>
        <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Menu Toggle Script -->
        <script>
            $("#menu-toggle").click(function (e) {
                e.preventDefault();
                $("#wrapper").toggleClass("toggled");
            });

//        $('.textarea').keyup(function (e) {
//                if (e.which == 13) {
//                    $('form').submit();
//                }
//            });
        </script>

    </body>
</html>
