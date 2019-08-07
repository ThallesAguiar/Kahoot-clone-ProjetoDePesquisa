<?php

require_once './produtoVO.php';
require_once './produtoDAO.php';
require_once '../util/conexao.php';
$produto = new ProdutoVO();
$produtoDao = new produtoDAO();


$id = $_GET['id'];


$produto->setId_produto($id);

if ($produtoDao->delete($produto, $link) == TRUE) {
    //echo 'registro excluído com sucesso';
    header('Location:lista.php');
} else {
    echo 'erro ao excluir registro.';
}
;

