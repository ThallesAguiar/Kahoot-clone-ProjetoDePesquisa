<?php session_start(); ?>
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
        <title>Todos os Usuarios - TPhE</title>
    </head>
    <body>
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-dark fixed">

            <!--NOME DE USUARIO E IMAGEM COM DROPDOWN-->
            <ul class="navbar-nav mr-auto fixed">
                <li class="nav-item dropdown">
                    <a class="dropdown-toggle h6 text-light" style="text-decoration: none;">
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
                <a href="../../pagina-adm/index.php" class="btn bg-primary text-light">VOLTAR</a>
            </ul><!--/NOME DE USUARIO E IMAGEM-->
        </nav>

        <?php
        require_once '../../config/conexao.php';
        require_once './UsuarioDAO.php';
        require_once './UsuarioVO.php';

        $usuarioVO=new usuarioVO();
        $usuarioDAO=new usuarioDAO();

        $todas_usuarios = $usuarioDAO->getAll($conn);

        foreach ($todas_usuarios as $usuario) {
            $usuario->getId_usuario();
            $usuario->getNome();
            $usuario->getEmail();
            $usuario->getSenha();
            $usuario->getId_tipo_usuario();







            //<!--SOBRE QUIZ-->
            $id_usuario = $usuario->getId_usuario();
            //$usuarios = utf8_decode($usuario->getDescricao());
            
            $senha=md5($usuario->getSenha());

            echo '<div class="card mb-3">';
            //<!--<img class="card-img-top" src=".../100px180/" alt="Imagem de capa do card">-->
            echo "<div class='card-body'>
                            <h5 class='card-title'></h5>
                            <div class='col-md-2 float-right'>";
            echo '<a href="javascript:func()" onclick="confirmacao(' . $id_usuario . ')"><img src="imagens/remover_quiz.png" width="30" title="Excluir usuario"></a><br><br>';
            echo "<a href='edita.php?id=$id_usuario'><img src='imagens/editar_quiz.png' width='30' title='Editar usuario'></a>
                            </div>
                            <p class='card-text h3 col-md-6'>ID:{$usuario->getId_usuario()}<br> NOME: {$usuario->getNome()}</p>
                            <p class='card-text'><small class='text-muted'>EMAIL: {$usuario->getEmail()}</small></p>
                            <p class='card-text'><small class='text-muted'>SENHA CRIPTOGRAFADA: $senha</small></p>
                            <p class='card-text'><small class='text-muted'>TIPO USUARIO: {$usuario->getId_tipo_usuario()}</small></p>
                        </div>
                    </div>
                    
                    <hr>";
            //<!--/.SOBRE QUIZ-->
        }
        ?>



        <!-- Bootstrap core JavaScript -->
        <script src="../../vendor/jquery/jquery.min.js"></script>
        <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script language="Javascript">
                                    function confirmacao(id) {
                                        var resposta = confirm("Deseja excluir o usuario " + id + "?");

                                        if (resposta == true) {
                                            window.location.href = "deleta.php?id="+id;
                                        }
                                    }

                                   
        </script>
    </body>
</html>
