<?php

class respostaDAO {

    public function insert(respostaVO $objVO, $link) {
         $query = ("INSERT INTO resposta (RESPOSTA, TIPO, ID_PERGUNTA) VALUES ('{$objVO->getResposta()}', '{$objVO->getTipo()}', '{$objVO->getId_pergunta()}')");
        try {
            if (mysqli_query($link, $query)) {
                mysqli_commit($link);
                $objVO->setId_resposta(mysqli_insert_id($link));
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
        $objVO = new respostaVO();
        $return = array();
        $query = 'SELECT * FROM `resposta` ORDER BY `ID_RESPOSTA`';
        $resultado = mysqli_query($link, $query);
        while ($rs = mysqli_fetch_array($resultado)) {
            $objVO->setId_resposta(stripslashes($rs['ID_RESPOSTA']));
            $objVO->setResposta(stripslashes($rs['RESPOSTA']));
            $objVO->setTipo(stripslashes($rs['TIPO']));
            $objVO->setId_pergunta(stripslashes($rs['ID_PERGUNTA']));
            $return [] = clone $objVO;
        }
        return $return;
    }

/*     * ************** FIM GetAll ******************* */

    public function getRespostas($link, $id) {
        $objVO = new respostaVO();
        $return = array();
        $query = "SELECT * FROM resposta WHERE ID_PERGUNTA = {$id}";
        $resultado = mysqli_query($link, $query);
        while ($rs = mysqli_fetch_array($resultado)) {
            $objVO->setId_resposta(stripslashes($rs['ID_RESPOSTA']));
            $objVO->setResposta(stripslashes($rs['RESPOSTA']));
            $objVO->setTipo(stripslashes($rs['TIPO']));
            $objVO->setId_pergunta(stripslashes($rs['ID_PERGUNTA']));
            $return [] = clone $objVO;
        }
        return $return;
    }

}
