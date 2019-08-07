<?php
session_start();

require_once '../../config/conexao.php';

$nome = $_SESSION['UsuarioNome'];
$query = "SELECT FOTO_USUARIO FROM usuario WHERE NOME='$nome'";
$resultado = mysqli_query($conn, $query);

$linha = mysqli_fetch_array($resultado);
$foto = $linha["FOTO_USUARIO"];
?>
<!DOCTYPE html>
<html>
    <head>
        <!--Esta função abaixo escrita em javaScript, auxilia na confirmação de exclusão de registro
        evitando que o usuário exclua diretamente -->
        <script language="Javascript">
            function confirmacao(id) {
                var resposta = confirm("Deseja remover o registro " + id + "?");

                if (resposta == true) {
                    window.location.href = "deleta.php?id=" + id;
                }
            }
        </script>        
        <meta charset="UTF-8">

        <title></title>
        <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/style.css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="imagens/favicon.ico">
    </head>



    <body>

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
                        <a class="dropdown-item" href="../class/usuario/edita.php">Configurações</a>
                        <a class="dropdown-item" href="#">Ajuda</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../session/destroyed .php">Sair</a>
                    </div>
                </li>
            </ul><!--/NOME DE USUARIO E IMAGEM-->

            <?php
            $query = "SELECT * FROM chat";
            $resultado = mysqli_query($conn, $query);
            //contar o tatal de itens
            $total_msg_contato = mysqli_num_rows($resultado);
            ?>

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
            <a class="" style="text-decoration: none;" href="../chat/index.php">
                <img src="../../imagens/mensage.png" width="20" height="20" class="d-inline-block align-top" alt="">
                <span class="badge badge-light"><?php echo $total_msg_contato; ?></span>
            </a>&nbsp&nbsp&nbsp&nbsp
            <!--MENSAGEM-->
            <!--/Notificações e mensagens-->

            <!--FORMULARIO DE PESQUISAR-->
            <form class="form-inline my-2 my-lg-0" method="post" action="lista.php">
                <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" name="nome" aria-label="Pesquisar">
                <button class="btn btn-outline-success my-2 my-sm-0" name="SendPesq" type="submit">Pesquisar</button>
            </form><!--/FORMULARIO DE PESQUISAR-->

        </div>
    </nav>


    <div class="container">
        <?php
        $SendPesq = filter_input(INPUT_POST, 'SendPesq', FILTER_SANITIZE_STRING);
        if ($SendPesq) {
            $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
            $query = "SELECT * FROM usuario WHERE nome LIKE '%nome%'";
            $resultado = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($resultado)) {
                echo "Nome: " . $row['NOME'] . '<br>';
            }
        }
        ?>
    </div>

    <script src="../../vendor/jquery/jquery.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>      


</body>
</html>


