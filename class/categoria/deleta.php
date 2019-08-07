<?php

require_once '../../config/conexao.php';
require_once './CategoriaVO.php';
require_once './CategoriaDAO.php';


$categoriaVo = new CategoriaVO();
$categoriaDao = new CategoriaDAO();

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

$categoriaVo->setId_categoria($id);

$deleta = $categoriaDao->delete($categoriaVo, $conn);

if (mysqli_affected_rows($conn)) {
    echo "<script>alert('Registro apagado com sucesso!')</script>";
    echo "<script>window.open('index.php','_self')</script>";
} else {
    echo '<p>Registo não apagado</p><br>';
    echo "<a href='index.php'>Voltar</a>";
}
