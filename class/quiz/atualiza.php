<?php

require_once '../../config/conexao.php';
require_once './QuizDAO.php';
require_once './QuizVO.php';


$quizVO = new QuizVO();
$quizDAO = new QuizDAO();


    echo $id_quiz=$_POST['id'];
    echo $pergunta=$_POST['pergunta'];
    echo $tempo=$_POST['tempo'];
    echo $resposta_um=$_POST['resposta_um'];
    echo $resposta_dois=$_POST['resposta_dois'];
    echo $resposta_tres=$_POST['resposta_tres'];
    echo $resposta_quatro=$_POST['resposta_quatro'];
    echo $resposta_correta=$_POST['resp_corret'];




$quizVO->setId_quiz($id_quiz);
$quizVO->setPergunta($pergunta);
$quizVO->setTempo($tempo);
$quizVO->setResposta_correta($resposta_correta);
$quizVO->setResposta_um($resposta_um);
$quizVO->setResposta_dois($resposta_dois);
$quizVO->setResposta_tres($resposta_tres);
$quizVO->setResposta_quatro($resposta_quatro);

$atualizar = $quizDAO->update($quizVO, $conn);

if ($atualizar) {
    echo "<script>alert('Registro atualizado com sucesso!')</script>";
    echo "<script>window.open('index.php','_self')</script>";
} else {
    echo "<script>alert('Registro não atualizado!')</script>";
    echo "<script>window.open('edita.php','_self')</script>";
}
