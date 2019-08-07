<?php
session_start();

require_once '../../config/conexao.php';

$nome = $_SESSION['UsuarioNome'];
?>
<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="imagens/favicon.ico">

        <title>TPhE- Criar QUIZ</title>

        <!-- Principal CSS do Bootstrap -->
        <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body>
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-warning">

            <!--NOME DE USUARIO E IMAGEM COM DROPDOWN-->
            <ul class="navbar-nav mr-auto">
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
                <div class="btn bg-primary text-warning">CRIAR QUIZ</div>
            </ul><!--/NOME DE USUARIO E IMAGEM-->
        </nav>


        <div class="container">
            <?php
                    if (isset($_SESSION['msg_erro_quiz'])){
                        echo '<div class="alert alert-danger" role="alert">'. $_SESSION['msg_erro_quiz'].'</div>';
                        unset($_SESSION['msg_erro_quiz']);
                    }
                ?>
            <form method="POST" action="insert.php" enctype="multipart/form-data">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="pergunta">PERGUNTA (obrigatório)</label>
                        <textarea type="text" class="form-control" name="pergunta" id="pergunta" placeholder="Faça a sua pergunta..."></textarea>
                        <br>
                        <div class="form-group col-md-5">
                            Tempo limite
                            <select class="form-control custom-select" name="tempo" id="tempo" required>
                                <option value="">Escolha o tempo</option>
                                <option value="5">5 sec</option>
                                <option value="10">10 sec</option>
                                <option value="20">20 sec</option>
                                <option value="30">30 sec</option>
                                <option value="60">60 sec</option>
                                <option value="90">90 sec</option>
                                <option value="120">120 sec</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group col-md-4">
                        <div class="card col-sm-12">
                            <img class="card-img-top" src="imagens/conhecimentoPoder.png" alt="Imagem da sala"  width="100" height="200">
                        </div>
<!--                        <div class="custom-file">
                            <input type="file" class="form-control custom-file-input" name="imagem" onchange="previewImagem()">
                            <label class="custom-file-label" for="imagem">Escolher arquivo</label>
                        </div>-->
                    </div>
                </div>
                <a href="listar.php" class="btn btn-outline-dark btn-block">ACHAR PERGUNTAS</a>
        
        <div class="form-row col-12 was-validated ">
            <div class="form-group col-md-4">
                <label for="resposta1">RESPOSTA 1<small> (Obrigatório)</small></label>
                <input type="text" class="form-control" name="resposta_um" id="resposta1" placeholder="">
                <div class="custom-control custom-radio ">
                    <input type="radio" class="custom-control-input" id="customControlValidation1" name="resp_corret" required value="resposta_um">
                    <label class="custom-control-label" for="customControlValidation1"></label>
                </div>
                <br>

                <label for="resposta2">RESPOSTA 2<small> (Obrigatório)</small></label>
                <input type="text" class="form-control" name="resposta_dois" id="resposta2" placeholder="">
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" id="customControlValidation2" name="resp_corret" required value="resposta_dois">
                    <label class="custom-control-label" for="customControlValidation2"></label>
                </div>

            </div>
            <div class="form-group col-md-2">
            </div>
            <div class="form-group col-md-4">
                <label for="resposta3">RESPOSTA 3</label>
                <input type="text" class="form-control" name="resposta_tres" id="resposta3" placeholder="">
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" id="customControlValidation3" name="resp_corret" required  value="resposta_tres">
                    <label class="custom-control-label" for="customControlValidation3"></label>
                </div><br>

                <label for="resposta4">RESPOSTA 4</label>
                <input type="text" class="form-control" name="resposta_quatro" id="resposta4" placeholder="">
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" id="customControlValidation4" name="resp_corret" required value="resposta_quatro">
                    <label class="custom-control-label" for="customControlValidation4"></label>
                </div>
            </div>
        </div>
                <br><input class="btn btn-success" type="submit" value="Concluir!!!">
                
                
    </form>
</div>

<!-- Principal JavaScript do Bootstrap
    ================================================== -->
<!-- Foi colocado no final para a página carregar mais rápido -->
<script>window.jQuery || document.write('<script src="../../vendor/jquery/jquery-slim.min.js"><\/script>')</script>
<script src="../../vendor/jquery/jquery.js"></script>
<script src="../../vendor/bootstrap/js/bootstrap.min.js"></script>
<!--SCRIPT PARA MOSTRAR IMAGEM -->
<script>
    function previewImagem() {
        var imagem = document.querySelector('input[name=imagem]').files[0];
        var preview = document.querySelector('img');

        var reader = new FileReader();

        reader.onloadend = function () {
            preview.src = reader.result;
        }

        if (imagem) {
            reader.readAsDataURL(imagem);
        } else {
            preview.src = "";
        }
    }
</script>
<!--/.SCRIPT PARA MOSTRAR IMAGEM -->
</body>
</html>