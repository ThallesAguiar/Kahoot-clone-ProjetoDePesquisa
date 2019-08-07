<?php
session_start();
require_once './quizDAO.php';
require_once './quizVO.php';
require_once '../../config/conexao.php';


    echo $id_usuario=$_SESSION['UsuarioID'];
    echo $id_sala=$_SESSION['id_sala'];
    echo $pergunta=$_POST['pergunta'];
    echo $tempo=$_POST['tempo'];
    echo $resposta_um=$_POST['resposta_um'];
    echo $resposta_dois=$_POST['resposta_dois'];
    echo $resposta_tres=$_POST['resposta_tres'];
    echo $resposta_quatro=$_POST['resposta_quatro'];
    echo $resposta_correta=$_POST['resp_corret'];




$quizVO= new quizVO();
$quizVO->setId_usuario($id_usuario);
$quizVO->setId_sala($id_sala);
$quizVO->setPergunta($pergunta);
$quizVO->setTempo($tempo);
$quizVO->setResposta_correta($resposta_correta);
$quizVO->setResposta_um($resposta_um);
$quizVO->setResposta_dois($resposta_dois);
$quizVO->setResposta_tres($resposta_tres);
$quizVO->setResposta_quatro($resposta_quatro);
        

$quizDAO= new quizDAO();

$resultado=$quizDAO->insert($quizVO, $conn);

if ($resultado>0){
    $id_quiz=$resultado;
    $_SESSION['id_quiz']=$id_quiz;
   header("Location: index.php");
} else {
   header("Location: novo.php");
   $_SESSION['msg_erro_quiz']="ERRO AO CRIAR A SUA PERGUNTA<br> TENTE NOVAMENTE!!!";
}