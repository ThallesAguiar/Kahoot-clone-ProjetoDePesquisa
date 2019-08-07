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
            <link href="../css/bootstrap.min.css" rel="stylesheet">
            <link href="../css/style.css" rel="stylesheet">
    </head>
    
    
    
    <body>
        <?php
        require_once './produtoVO.php';
        require_once './produtoDAO.php';
        require_once '../util/conexao.php';
        require_once '../categorias/categoriaVO.php';
        require_once '../categorias/CategoriaDAO.php';
        //parametro usado na paginação/Número de registros exibidos por página
        $nro_registros_por_pagina = 5;

       //pega o número da página por GET
        if(!isset($_GET['pagina'])){
        $pagina = 1;
        }
        
        
        //pega o critério da busca, por GET
        $criterio = $_GET['criterio'];
        $criterio = strtoupper($criterio);
        
       
        //observar que a página 1 do usuário, é a partir do 0 retornar 5 registros para o mysql
        //observar também que a pagina 2 do usuario é 5 do mysql e retornar os próximos 5
        $pagina = $_GET['pagina'];
        if($pagina!=1) 
        $pagina = $_GET['pagina'] * $nro_registros_por_pagina - $nro_registros_por_pagina ;
        
        //a $pagina recebe 0, caso seja 1, pois precisa exibir desde o registro 0
        if($pagina==1)
        $pagina=0;   
        
        //abaixo formulário utilizado somente na pesquisa por palavra chave
        echo '<form action "lista.php?pagina=1" method="GET">';
        echo 'Pesquisa<input type="text" name="criterio" size = "25" >';
        echo '<input type="submit" value = "Pesquisar">';
        echo '</form>';
            
        //início da listagem
        echo '<br>Listagem <br>';
        echo '<a href="novo.php">Novo Registro</a><br>';
        //listagem da tabela , na forma de objetos
        
echo '<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<table class="table"> ';       
        
        
        
        
       
        echo '<tr>';
        echo '<td>id</td>';
        echo '<td>descricao</td>';
        echo '<td>valor</td>';
        echo '<td>categoria</td>';

        echo '<tr>';

        //cria objetos em memória
        $categoria = new CategoriaVO();
        $categoriaDao = new CategoriaDAO();
        $pDao = new produtoDAO();

        //busca o total de registros, necessários para criar o menu de páginação 1 2 3 4
        $total_registros = $pDao->getRecordCountLike($link,$criterio);

        //a linha abaixo, também ajudará a montar o menu de paginação
        $total_paginas = $total_registros / $nro_registros_por_pagina;

        $TodosOsprodutos = $pDao->getAllWithPagesLike($link, $pagina, $nro_registros_por_pagina,$criterio);

        foreach ($TodosOsprodutos as $objVo) {
            echo '<tr class="table-danger">';
            echo '<td>' . $objVo->getId_produto() . '</td>';
            echo '<td>' . $objVo->getDescr_produto() . '</td>';
            echo '<td>' . $objVo->getValor() . '</td>';
            $categoria = $categoriaDao->select($link, $objVo->getId_categoria());
            echo '<td>' . $categoria->getDesc_categoria() . '</td>';
            echo '<td><a href = "edita.php?id=' . $objVo->getId_produto() . '">Editar</a></td>';
            echo '<td><a href="javascript:func()"onclick="confirmacao(' . $objVo->getId_produto() . ')">Excluir</a></td>';
            echo '</tr>';
        }
        echo '</table>
        
 			</table>
		</div>
	</div>
</div>  ';     
        
        
        
        
       //criar links de paginação
        echo 'Paginacao';
        $indice = 1;
        for ($i = $nro_registros_por_pagina; $i < $total_registros; $i=$i+$nro_registros_por_pagina) {
            
            echo '<a href="lista.php?pagina='.$indice.'&criterio='.$criterio.'">'.$indice.'</a>';
            $indice=$indice+1;
        }
        ?>
        
        
      <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/scripts.js"></script>      


    </body>
</html>


