<!DOCTYPE html>
<html>
    <head lang="pt-br">
        <meta charset="utf-8">
        
        <script language="Javascript">
            function confirmacao(id) {
                var resposta = confirm("Deseja remover o registro " + id + "?");

                if (resposta == true) {
                    window.location.href = "deleta.php?id=" + id;
                }
            }
        </script> 

        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="../../materialize/css/materialize.min.css">


        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>


        <!-- Menu -->
        <nav class="grey darken-4">
            <div class="nav-wrapper container">
                <a href="index.php" class="brand-logo">Categorias</a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="index.php">Listar</a></li>
                    <li><a href="novo.php">Inserir</a></li>
                    <li><a href="../index.php">Produtos</a></li>
                </ul>
            </div>
        </nav>
        <div class="container">
            <table class="striped responsive-table centered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Descrição</th>
                        <th>Menu pai</th>
                        <th colspan="2">Ações</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    require_once './CategoriaVO.php';
                    require_once './CategoriaDAO.php';
                    require_once '../../config/conexao.php';

                    $categoriaDao = new CategoriaDAO;
                    $selectAll = $categoriaDao->selectAll($conn);

                    foreach ($selectAll as $categoria) {
                        $id = $categoria->getId_categoria();
                        $desc = $categoria->getDescricao();
                        $menu_pai = $categoria->getMenu_pai();
                        
                        echo "<tr>";
                        echo "<th scope = 'row'>$id</th>";
                        echo "<td>$desc</td>";
                        echo "<td>$menu_pai</td>";
                        echo "<td><a class='waves-effect waves-light btn green center' href='edita.php?id=$id'><i class='large material-icons'>edit</i></a></td>";
                        echo '<td><a class="waves-effect waves-light btn red center" href="javascript:func()" onclick="confirmacao(' . $id . ')"><i class="large material-icons">delete</i></a></td>';
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>


        <!-- Compiled and minified JavaScript -->
        <script src="../../materialize/js/materialize.min.js"></script>

    </body>
</html>
