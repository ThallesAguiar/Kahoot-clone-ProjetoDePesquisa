<?php

require_once '../../config/conexao.php';
require_once './SalaDAO.php';
require_once './SalaVO.php';


$salaVO = new SalaVO();
$salaDAO = new SalaDAO();

echo $id=$_POST['id'];
echo $nome=$_POST['nome'];
echo $descricao=$_POST['descricao'];
echo $visivel=$_POST['visivel'];

if (empty ($_POST['senha'])){
    $senha=NULL;
} else {
    $senha=$_POST['senha'];
}

$salaVO->setId_sala($id);
$salaVO->setNome($nome);
$salaVO->setSenha($senha);
$salaVO->setDescricao($descricao);
$salaVO->setVisivel($visivel);

$atualizar = $salaDAO->update($salaVO, $conn);

if ($atualizar) {
    echo "<script>alert('Registro atualizado com sucesso!')</script>";
    echo "<script>window.open('../quiz/index.php?idSala=$id','_self')</script>";
} else {
    echo "<script>alert('Registro não atualizado!')</script>";
    echo "<script>window.open('edita.php','_self')</script>";
}
