<!doctype html>
<html lang="pt-br">
    <head>
        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="../../materialize/css/materialize.min.css">


        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Edita</title>
    </head>
    <body>

        <?php
        require_once '../../config/conexao.php';
        require_once './CategoriaVO.php';
        require_once './CategoriaDAO.php';

        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        $categoriaVo = new CategoriaVO();
        $categoriaDao = new CategoriaDAO();
        $categoriaVo = $categoriaDao->read($conn, $id);

        $desc = $categoriaVo->getDescricao();
        $menu_pai = $categoriaVo->getMenu_pai();
        ?>

        <div class="container">
            <h4>Atualizar</h4>
            <div class="row">
                <form class="col s10" action="atualiza.php">
                    <div class="row">
                        <div class="input-field col s10">
                            <input id="id" type="number" class="validate" readonly="readonly" name="id" value="<?php echo $id; ?>">
                            <label for="id">ID</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s10">
                            <input id="desc" type="text" class="validate" name="desc" value="<?php echo $desc; ?>">
                            <label for="desc">Descrição da Categoria</label>
                        </div>
                    </div>


                    <div class="row">
                        <div class="input-field col s10">
                            <input id="menu_pai" type="text" class="validate" name="menu_pai" value="<?php echo $menu_pai; ?>">
                            <label for="menu_pai">Menu Pai</label>
                        </div>
                    </div>

                    <div class="row">
                        <button class="btn waves-effect waves-light green" type="submit" name="action">Atualizar<i class="material-icons right">send</i>
                        </button>
                        <a class="waves-effect waves-light btn grey" href="index.php">Cancelar<i class="material-icons right">cancel</i></a>
                    </div>
                </form>    
            </div>
        </div>

        <!-- Compiled and minified JavaScript -->
        <script src="../../materialize/js/materialize.min.js"></script>
    </body>
</html>