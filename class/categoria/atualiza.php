<?php

require_once '../../config/conexao.php';
require_once './CategoriaVO.php';
require_once './CategoriaDAO.php';


$categoriaVo = new CategoriaVO();
$categoriaDao = new CategoriaDAO();


$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$desc = filter_input(INPUT_GET, 'desc', FILTER_SANITIZE_STRING);
$menu_pai = filter_input(INPUT_GET, 'menu_pai', FILTER_SANITIZE_STRING);

$categoriaVo->setId_categoria($id);
$categoriaVo->setDescricao($desc);
$categoriaVo->setMenu_pai($menu_pai);

$atualizar = $categoriaDao->update($categoriaVo, $conn);


if ($atualizar) {
    echo "<script>alert('Registro atualizado com sucesso!')</script>";
    echo "<script>window.open('index.php','_self')</script>";
} else {
    echo "<script>alert('Registro não atualizado!')</script>";
    echo "<script>window.open('index.php','_self')</script>";
}
