<?php

class QuizDAO {

    public function insert(QuizVO $quizVO, $conn) {
        $id_usuario = $quizVO->getId_usuario();
        $id_sala = $quizVO->getId_sala();
        $pergunta = $quizVO->getPergunta();
        $tempo = $quizVO->getTempo();
        $resposta_correta = $quizVO->getResposta_correta();
        $resposta_um = $quizVO->getResposta_um();
        $resposta_dois = $quizVO->getResposta_dois();
        $resposta_tres = $quizVO->getResposta_tres();
        $resposta_quatro = $quizVO->getResposta_quatro();

        echo $query = "INSERT INTO quiz (ID_USUARIO,ID_SALA,PERGUNTA,TEMPO,RESPOSTA_CORRETA,RESPOSTA_UM,RESPOSTA_DOIS,RESPOSTA_TRES,RESPOSTA_QUATRO)VALUES('$id_usuario','$id_sala','$pergunta','$tempo','$resposta_correta','$resposta_um','$resposta_dois','$resposta_tres','$resposta_quatro')";

        mysqli_query($conn, $query);

        //echo mysqli_error($conn);

        return mysqli_insert_id($conn);
    }

    public function read($conn, $id) {
        mysqli_query($conn, "SET NAMES 'UTF8'");
        $quizVO = new QuizVO();
        $query = "select * from quiz where ID_QUIZ = $id";
        $resultado = mysqli_query($conn, $query);
        while ($rs = mysqli_fetch_array($resultado)) {
            $quizVO->setId_quiz(stripslashes($rs['ID_QUIZ']));
            $quizVO->setId_usuario(stripslashes($rs['ID_USUARIO']));
            $quizVO->setId_sala(stripslashes($rs['ID_SALA']));
            $quizVO->setPergunta(stripslashes($rs['PERGUNTA']));
            $quizVO->setTempo(stripslashes($rs['TEMPO']));
            $quizVO->setResposta_correta(stripslashes($rs['RESPOSTA_CORRETA']));
            $quizVO->setResposta_um(stripslashes($rs['RESPOSTA_UM']));
            $quizVO->setResposta_dois(stripslashes($rs['RESPOSTA_DOIS']));
            $quizVO->setResposta_tres(stripslashes($rs['RESPOSTA_TRES']));
            $quizVO->setResposta_quatro(stripslashes($rs['RESPOSTA_QUATRO']));

            
        }
        return clone $quizVO;
    }

    //FUNÇÃO USADA PARA MOSTRAR TODAS AS PERGUNTAS REGISTRADAS PELO ID_SALA
    public function quiz_Sala($conn,$id_sala) {
        mysqli_query($conn, "SET NAMES 'UTF8'");
        $quizVO = new QuizVO();
        $return = array();
        $query = "SELECT * FROM `quiz` WHERE ID_SALA=$id_sala ORDER BY `ID_QUIZ`";
        $resultado = mysqli_query($conn, $query);
        while ($rs = mysqli_fetch_array($resultado)) {
            $quizVO->setId_quiz(stripslashes($rs['ID_QUIZ']));
            $quizVO->setId_usuario(stripslashes($rs['ID_USUARIO']));
            $quizVO->setId_sala(stripslashes($rs['ID_SALA']));
            $quizVO->setPergunta(stripslashes($rs['PERGUNTA']));
            $quizVO->setTempo(stripslashes($rs['TEMPO']));
            $quizVO->setResposta_correta(stripslashes($rs['RESPOSTA_CORRETA']));
            $quizVO->setResposta_um(stripslashes($rs['RESPOSTA_UM']));
            $quizVO->setResposta_dois(stripslashes($rs['RESPOSTA_DOIS']));
            $quizVO->setResposta_tres(stripslashes($rs['RESPOSTA_TRES']));
            $quizVO->setResposta_quatro(stripslashes($rs['RESPOSTA_QUATRO']));           
            $return [] = clone $quizVO;
        }
        return $return;
    }   
    
    
    //FUNÇÃO QUE MOSTRARÁ TODOS OS QUIZ CADASTRADOS
    public function getAll($conn) {
        mysqli_query($conn, "SET NAMES 'UTF8'");
        $quizVO = new QuizVO();
        $return = array();
        $query = "SELECT * FROM `quiz` ORDER BY `ID_QUIZ`";
        $resultado = mysqli_query($conn, $query);
        while ($rs = mysqli_fetch_array($resultado)) {
            $quizVO->setId_quiz(stripslashes($rs['ID_QUIZ']));
            $quizVO->setId_usuario(stripslashes($rs['ID_USUARIO']));
            $quizVO->setId_sala(stripslashes($rs['ID_SALA']));
            $quizVO->setPergunta(stripslashes($rs['PERGUNTA']));
            $quizVO->setTempo(stripslashes($rs['TEMPO']));
            $quizVO->setResposta_correta(stripslashes($rs['RESPOSTA_CORRETA']));
            $quizVO->setResposta_um(stripslashes($rs['RESPOSTA_UM']));
            $quizVO->setResposta_dois(stripslashes($rs['RESPOSTA_DOIS']));
            $quizVO->setResposta_tres(stripslashes($rs['RESPOSTA_TRES']));
            $quizVO->setResposta_quatro(stripslashes($rs['RESPOSTA_QUATRO']));           
            $return [] = clone $quizVO;
        }
        return $return;
    }   

    function delete(QuizVO $quizVO, $conn) {
        $id = $quizVO->getId_quiz();
        $query = "DELETE FROM quiz WHERE ID_QUIZ = $id";

        return mysqli_query($conn, $query);
    }

    function update(QuizVO $quizVO, $conn) {
        $id_quiz = $quizVO->getId_quiz();
        $pergunta = $quizVO->getPergunta();
        $tempo = $quizVO->getTempo();
        $resposta_correta = $quizVO->getResposta_correta();
        $resposta_um = $quizVO->getResposta_um();
        $resposta_dois = $quizVO->getResposta_dois();
        $resposta_tres = $quizVO->getResposta_tres();
        $resposta_quatro = $quizVO->getResposta_quatro();

        echo $query = "UPDATE quiz SET PERGUNTA='$pergunta',TEMPO='$tempo',RESPOSTA_CORRETA='$resposta_correta',RESPOSTA_UM='$resposta_um',RESPOSTA_DOIS='$resposta_dois',RESPOSTA_TRES='$resposta_tres',RESPOSTA_QUATRO='$resposta_quatro' WHERE ID_QUIZ='$id_quiz'";
        return (mysqli_query($conn, $query));
    }
    
    //CONTA OS QUIZES
    function qtd_Quizes($conn,$id_sala){
            $query="SELECT * FROM quiz WHERE ID_SALA=$id_sala";
            $resultado= mysqli_query($conn, $query);
            //contar o tatal de itens
            return $total_quiz= mysqli_num_rows($resultado);
            
            
            
    }

}
