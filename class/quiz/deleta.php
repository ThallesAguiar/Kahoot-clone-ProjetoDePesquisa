<?php

require_once '../../config/conexao.php';
require_once './QuizDAO.php';
require_once './QuizVO.php';


$quizVO = new QuizVO();
$quizDAO = new QuizDAO();

$id = $_GET['id'];

$quizVO->setId_quiz($id);

$deleta = $quizDAO->delete($quizVO, $conn);

if ($deleta) {
    echo "<script>alert('Registro apagado com sucesso!')</script>";
    echo "<script>window.open('index.php','_self')</script>";
} else {
    echo '<p>Registo não apagado</p><br>';
    echo "<a href='index.php'>Voltar</a>";
}
