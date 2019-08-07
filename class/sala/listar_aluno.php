<?php
session_start();

$id_usuario = $_SESSION['UsuarioID'];
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap core CSS -->
        <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <title>Salas - TPhE</title>
    </head>
    <body>

        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-warning top-fixed">

            <!--NOME DE USUARIO E IMAGEM COM DROPDOWN-->
            <ul class="navbar-nav mr-auto fixed">
                <li class="nav-item dropdown">
                    <a class="dropdown-toggle h6" style="text-decoration: none;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php
                        echo $_SESSION['UsuarioNome'];
                        ?>

                    </a>
                    &nbsp&nbsp&nbsp&nbsp
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="../../class/usuario/edita.php">Configurações</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../../session/destroyed.php">Sair</a>
                    </div>
                </li>

            </ul><!--/NOME DE USUARIO E IMAGEM-->
            <a href="index.php" class="btn bg-success text-light">CRIAR</a>
            <a href="../../pagina-aluno/index.php" class="btn bg-primary text-light">VOLTAR</a>
        </nav>

        <?php
        require_once '../../config/conexao.php';
        require_once './salaDAO.php';
        require_once './salaVO.php';

        $salaVO = new salaVO();
        $salaDAO = new salaDAO();




        $todas_salas = $salaDAO->mostrar_Salas($conn, $id_usuario);
        foreach ($todas_salas as $sala) {
            $sala->getId_sala();
            $sala->getNome();
            $sala->getSenha();
            $sala->getDescricao();
            $sala->getVisivel();
            $sala->getImagem();
            $sala->getData();
            $sala->getId_usuario();

            $id_sala = $sala->getId_sala();
            $contador = $salaDAO->qtd_Salas($conn, $id_usuario);


            $query = "SELECT usuario.NOME FROM usuario WHERE ID_USUARIO={$sala->getId_usuario()}";
            $resultado = mysqli_query($conn, $query);
            $linha = mysqli_fetch_array($resultado);
            $nome_criador = $linha["NOME"];


            echo '<div class="card mb-3">';
            echo "<div class='card-body'>
                            
                            <div class='col-md-2 float-right'>";
            echo "</div>";
            //<!-- MOSTRAR IMAGEM QUE VEM DO BD OU NÃO -->
            if ($sala->getImagem() == NULL) {
                echo '<img class="img-fluid rounded float-right" src="../../imagens/campeao.jpg"  width="200" height="500" alt="">';
            } elseif ($sala->getImagem() != NULL) {
                $imagem = $sala->getImagem();
                $id_sala = $sala->getId_sala();
                echo'<img src="../../imagens_salas/' . $id_sala . '/' . $imagem . '" class="img-fluid rounded float-right" width="200" alt="Imagem da Sala">';
            }
            //<!--./ MOSTRAR IMAGEM QUE VEM DO BD OU NÃO -->';
            echo "<a href='../quiz/index.php' style='underline:none;'>";
            echo "<div class='card-text h3 col-md-12'><span class='h1 text-light bg-danger p-2 rounded'>$contador</span>  {$sala->getDescricao()}</div>
                            <p class='card-text'><small class='text-dark'>Criado por <span class='h5'> $nome_criador</span>  às {$sala->getData()} </small></p></a> 
                            <a href='../jogo/index.php?idSala={$sala->getId_sala()}'  target='_blank' class='btn btn-success'>JOGAR</a>                        
                            </div>
                            </div>";
            echo " <hr>";
            //<!--/.SOBRE QUIZ-->
        }
        ?>



        <!-- Bootstrap core JavaScript -->
        <script src="../../vendor/jquery/jquery.min.js"></script>
        <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
