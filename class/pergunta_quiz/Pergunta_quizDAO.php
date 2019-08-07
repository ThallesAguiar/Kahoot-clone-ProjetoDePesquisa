<?php
class pergunta_quizDAO {

    public function insert(pergunta_quizVO $objVO, $link) {
        $query = "INSERT INTO `pergunta_quiz`(`ID_PERGUNTA`,`ID_QUIZ`,`ID_TURMA`) VALUES ";
		$query.= "('{$objVO->getId_pergunta()}','{$objVO->getId_quiz()}','{$objVO->getId_turma()}')";
		
		try {
            if (mysqli_query($link, $query)) {
                mysqli_commit($link);
                $objVO->setId_pergunta_quiz(mysqli_insert_id($link));
                printf('Registro inserido com sucesso.');
                return $objVO;
            } else {
                throw new Exception('Erro ao cadastrar!');
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            mysqli_rollback($link);
        }
    }

    public function getAll($link) {
        mysqli_query($link, "SET NAMES 'UTF8'");
        $objVO = new pergunta_quizVO();
        $return = array();
        $query = 'SELECT * FROM `pergunta_quiz` ORDER BY `ID_PERGUNTA`';
        $resultado = mysqli_query($link, $query);
        while ($rs = mysqli_fetch_array($resultado)) {
            $objVO->setId_pergunta_quiz(stripslashes($rs['ID_PERGUNTA_QUIZ']));
            $objVO->setId_pergunta(stripslashes($rs['ID_PERGUNTA']));
            $objVO->setId_quiz(stripslashes($rs['ID_QUIZ']));
            		            
            $return [] = clone $objVO;
        }
        return $return;
    }

/*     * ************** FIM GetAll ******************* */

    public function getPerguntas($link, $id) {
        $objVO = new pergunta_quizVO();
        $return = array();
        $query = "SELECT * FROM pergunta_quiz WHERE ID_PERGUNTA = {$id}";
        $resultado = mysqli_query($link, $query);
        while ($rs = mysqli_fetch_array($resultado)) {
            $objVO->setId_pergunta_quiz(stripslashes($rs['ID_PERGUNTA_QUIZ']));
            $objVO->setId_pergunta(stripslashes($rs['ID_PERGUNTA']));
            $objVO->setId_quiz(stripslashes($rs['ID_QUIZ']));
			
			
            $return [] = clone $objVO;
        }
        return $return;
    }

}
