<?php

require_once '../../config/conexao.php';
require_once './SalaDAO.php';
require_once './SalaVO.php';


$salaVO = new SalaVO();
$salaDAO = new SalaDAO();

$id = $_GET['id'];

$salaVO->setId_sala($id);

$deleta = $salaDAO->delete($salaVO, $conn);

if ($deleta) {
    echo "<script>alert('Registro apagado com sucesso!')</script>";
    echo "<script>window.open('../../pagina-professor/index.php','_self')</script>";
} else {
    echo '<p>Registo não apagado</p><br>';
    echo "<a href='../quiz/index.php'>Voltar</a>";
}
