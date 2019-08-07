<?php
class perguntaDAO {
    public function insert(perguntaVO $objVO, $link) {
        $query = ("INSERT INTO `pergunta`(`DESCRICAO`, `PONTUACAO`, `ID_DISCIPLINA`, `ID_CATEGORIA`, `ID_USUARIO`) VALUES ('{$objVO->getDescricao()}',0.5,'{$objVO->getId_disciplina()}','{$objVO->getId_categoria()}',2)");
		
		try {
            if (mysqli_query($link, $query)) {
				$last_id = mysqli_insert_id($link);
                mysqli_commit($link);
				$objVO->setId_pergunta($last_id);
                
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
        $objVO = new perguntaVO();
        $return = array();
        $query = 'SELECT * FROM `pergunta` ORDER BY `ID_PERGUNTA`';
        $resultado = mysqli_query($link, $query);
        while ($rs = mysqli_fetch_array($resultado)) {
            $objVO->setId_pergunta(stripslashes($rs['ID_PERGUNTA']));
            $objVO->setDescricao(stripslashes($rs['DESCRICAO']));
            $objVO->setPontuacao(stripslashes($rs['PONTUACAO']));
            $objVO->setId_disciplina(stripslashes($rs['ID_DISCIPLINA']));
            $objVO->setId_categoria(stripslashes($rs['ID_CATEGORIA']));
            $objVO->setId_usuario(stripslashes($rs['ID_USUARIO']));
			            
            $return [] = clone $objVO;
        }
        return $return;
    }
/*     * ************** FIM GetAll ******************* */
    
    
    public function getRandom($link) {
        mysqli_query($link, "SET NAMES 'UTF8'");
        $objVO = new perguntaVO();
        $return = array();
        $query = 'SELECT * FROM `pergunta`  WHERE `ID_PERGUNTA` >0 and `ID_PERGUNTA` < 20000 ORDER BY rand() LIMIT 10';
        $resultado = mysqli_query($link, $query);
        while ($rs = mysqli_fetch_array($resultado)) {
            $objVO->setId_pergunta(stripslashes($rs['ID_PERGUNTA']));
            $objVO->setDescricao(stripslashes($rs['DESCRICAO']));
            $objVO->setPontuacao(stripslashes($rs['PONTUACAO']));
            $objVO->setId_disciplina(stripslashes($rs['ID_DISCIPLINA']));
            $objVO->setId_categoria(stripslashes($rs['ID_CATEGORIA']));
            $objVO->setId_usuario(stripslashes($rs['ID_USUARIO']));
			            
            $return [] = clone $objVO;
        }
        return $return;
    }
    public function getPerguntas($link, $id) {
        $objVO = new perguntaVO();
        $return = array();
        $query = "SELECT * FROM pergunta WHERE ID_PERGUNTA = {$id}";
        $resultado = mysqli_query($link, $query);
        while ($rs = mysqli_fetch_array($resultado)) {
            $objVO->setId_pergunta(stripslashes($rs['ID_PERGUNTA']));
            $objVO->setDescricao(stripslashes($rs['DESCRICAO']));
            $objVO->setPontuacao(stripslashes($rs['PONTUACAO']));
			$objVO->setId_disciplina(stripslashes($rs['ID_DISCIPLINA']));
			$objVO->setId_categoria(stripslashes($rs['ID_CATEGORIA']));
			$objVO->setId_usuario(stripslashes($rs['ID_USUARIO']));
			
            $return [] = clone $objVO;
        }
        return $return;
    }
}