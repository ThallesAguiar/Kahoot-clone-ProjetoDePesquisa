<?php

require_once '../../config/conexao.php';
require_once './CategoriaVO.php';
require_once './CategoriaDAO.php';


$categoriaVo = new CategoriaVO();
$categoriaDao = new CategoriaDAO();


$desc =$_GET['desc'];
$menu_pai =$_GET['menu_pai'];

$categoriaVo->setDescricao($desc);
$categoriaVo->setMenu_pai($menu_pai);

$inserir = $categoriaDao->create($categoriaVo, $conn);

if ($inserir) {
    echo "<script>alert('Registro inserido com sucesso!')</script>";
    echo "<script>window.open('index.php','_self')</script>";
} else {
    echo "<script>alert('Registro não inserido!')</script>";
    echo "<script>window.open('index.php','_self')</script>";
}