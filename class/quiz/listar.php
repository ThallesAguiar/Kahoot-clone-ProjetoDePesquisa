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
        <title>Perguntas - TPhE</title>
    </head>
    <body>
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-warning fixed">

            <!--NOME DE USUARIO E IMAGEM COM DROPDOWN-->
            <ul class="navbar-nav mr-auto fixed">
                <li class="nav-item dropdown">
                    <a class="dropdown-toggle h6" style="text-decoration: none;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php
                        //echo $_SESSION['UsuarioNome'];
                        ?>

                    </a>
                    &nbsp&nbsp&nbsp&nbsp
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="../../class/usuario/edita.php">Configurações</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../../session/destroyed.php">Sair</a>
                    </div>
                </li>
                <a href="#" class="btn bg-success text-light">CONCLUIR</a>
                <a href="novo.php" class="btn bg-primary text-light">VOLTAR</a>
            </ul><!--/NOME DE USUARIO E IMAGEM-->
        </nav>

        <?php
        require_once '../../config/conexao.php';
        require_once '../pergunta/PerguntaDAO.php';
        require_once '../pergunta/PerguntaVO.php';

        $perguntaVO=new perguntaVO();
        $perguntaDAO=new perguntaDAO();

        $todas_perguntas = $perguntaDAO->getAll($conn);

        foreach ($todas_perguntas as $pergunta) {
            $pergunta->getId_pergunta();
            $pergunta->getDescricao();







            //<!--SOBRE QUIZ-->
            $id_pergunta = $pergunta->getId_pergunta();
            //$perguntas = utf8_decode($pergunta->getDescricao());
            


            echo '<div class="card mb-3">';
            //<!--<img class="card-img-top" src=".../100px180/" alt="Imagem de capa do card">-->
            echo "<div class='card-body'>
                            <h5 class='card-title'></h5>
                            <div class='col-md-2 float-right'>";
            echo '<a href="javascript:func()" onclick="confirmacao(' . $id_pergunta . ')"><img src="imagens/remover_quiz.png" width="30" title="Excluir questão"></a><br><br>';
            echo "<a href='edita.php?id=$id_pergunta'><img src='imagens/editar_quiz.png' width='30' title='Editar questão'></a>
                            </div>
                            <p class='card-text h3 col-md-6'>  {$pergunta->getDescricao()}</p>
                            <p class='card-text'><small class='text-muted'>Tempo limite de   Segundos'</small></p>
                        </div>
                    </div>
                    
                    <hr>";
            //<!--/.SOBRE QUIZ-->
        }
        ?>



        <!-- Bootstrap core JavaScript -->
        <script src="../../vendor/jquery/jquery.min.js"></script>
        <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
