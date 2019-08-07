<!doctype html>
<html lang="pt-br">
    <head>
        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="../../materialize/css/materialize.min.css">


        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Inserir</title>
    </head>
    <body>

        <div class="container">
            <h4>Inserir</h4>
            <div class="row">
                <form class="col s10" action="insere.php">

                    <div class="row">
                        <div class="input-field col s10">
                            <input id="desc" type="text" class="validate" name="desc">
                            <label for="desc">Descrição da Categoria</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s10">
                            <input id="menu_pai" type="text" class="validate" name="menu_pai">
                            <label for="menu_pai">Menu pai</label>
                        </div>
                    </div>

                    <div class="row">
                        <button class="btn waves-effect waves-light green" type="submit" name="action">Inserir<i class="material-icons right">send</i>
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