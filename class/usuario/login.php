<!DOCTYPE html>
<html >
    <head>
        <meta charset="UTF-8">
        <title>TPhE</title>
        <link rel="stylesheet" href="../../vendor/bootstrap/css/bootstrap.min.css">
        <script src="https://s.codepen.io/assets/libs/modernizr.js" type="text/javascript"></script>
        <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
        <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css'>
        <link rel='stylesheet prefetch' href='http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.0/css/bootstrapValidator.min.css'>
        <link rel="stylesheet" href="css/style.css">
    </head>

    <body>
        <div class="container">

            <form class=" form-horizontal rounded" action="insert.php" method="post"  id="contact_form" enctype="multipart/form-data">
                <fieldset>

                    <!-- Form Name -->
                    <center><h2 class="text-warning"><b>Registre-se</b></h2></center><br>


                    <!--FOTO-->
                    <div class="text-center mb-4">
                        <img class="md-4 rounded-circle" src="../../images_users/user.png" alt="" width="72" height="72">
                        <!--<h1 class="h3 mb-3 font-weight-normal">Detalhes da sua conta</h1>-->
                    </div>
                    <!-- Text input-->

                    <div class="form-group">
                        <label class="col-md-4 control-label">Usuário</label>  
                        <div class="col-md-4 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input  name="usuario" placeholder="Usuário" class="form-control"  type="text">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Email</label>  
                        <div class="col-md-4 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                <input name="email" placeholder="email@email.com" class="form-control"  type="text">
                            </div>
                        </div>
                    </div>


                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" >Senha</label> 
                        <div class="col-md-4 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon btn btn-transparent" onclick="mostrarSenha()"><i class="glyphicon glyphicon-lock"></i></span>
                                <input name="senha" id="senha" placeholder="Senha (use letras e números, min 8)" class="form-control"  type="password">
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="foto" >Colocar foto</label> 
                        <div class="col-md-4 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input type="file" class="form-control-file" name="foto" id="foto" required autofocus onchange="previewImagem()">
                            </div>
                        </div>
                    </div>
                    

                    <div class="form-group">
                        <label class="col-md-4 control-label" ></label> 
                        <div class="col-md-4 inputGroupContainer">
                            <!--<div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                    <input name="confirm_password" placeholder="Confirme sua Senha" class="form-control"  type="password">
                            </div>-->
                            <div class="radio btn btn-danger">
                                <label>
                                    <input type="radio" name="tipo_usuario" id="optionsRadios1" value="2" checked>Sou um Professor
                                </label>
                            </div>
                            <div class="radio btn btn-primary">
                                <label>
                                    <input type="radio" name="tipo_usuario" id="optionsRadios2" value="3">Sou um Aluno
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Success message -->
                    <div class="alert alert-success" role="alert" id="success_message">Success <i class="glyphicon glyphicon-thumbs-up"></i> Success!.</div>

                    <!-- Button -->
                    <div class="form-group">
                        <label class="col-md-4 control-label"></label>
                        <div class="col-md-4"><br>
                            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button type="submit" class="btn btn-warning" >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspGRAVAR&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</button>
                            <button class="btn btn-secundary"><a href="../../index.php">Cancelar</a> </button>
                        </div>
                    </div>

                </fieldset>
            </form>	
        </div><!-- /.container -->

        <?php
        require_once '../../script/mostar_imagem.php';
        require_once '../../script/mostrarSenha.php';
        ?>
        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js'></script>
        <script src='http://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js'></script>
        <script src="js/index.js"></script>

    </body>
</html>
