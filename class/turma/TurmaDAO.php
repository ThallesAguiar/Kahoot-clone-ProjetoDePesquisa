<?php

class turmaDAO {
    
    public function insert(turmaVO $objVO, $link) {
        $query = sprintf("INSERT INTO turma (ANO, semestre, nome, sigla, ID_DISCIPLINA, ID_USUARIO) VALUES (".$objVO->getAno().", ".$objVO->getSemestre().", '".$objVO->getNome()."', '".$objVO->getSigla()."', ".$objVO->getId_disciplina().", ".$objVO->getId_usuario().")"); 
        //echo $query;
		try {
            if (mysqli_query($link, $query)) {
                mysqli_commit($link);
                $objVO->setId_turma(mysqli_insert_id($link));
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
        $objVO = new turmaVO();
        $return = array();
        $query = 'SELECT * FROM `turma` ORDER BY `ID_TURMA`';
        $resultado = mysqli_query($link, $query);
        while ($rs = mysqli_fetch_array($resultado)) {
            $objVO->setId_turma(stripslashes($rs['ID_TURMA']));
            $objVO->setAno(stripslashes($rs['ANO']));
            $objVO->setSemestre(stripslashes($rs['SEMESTRE']));
            $objVO->setNome(stripslashes($rs['NOME']));
            $objVO->setSigla(stripslashes($rs['SIGLA']));
            $objVO->setId_usuario(stripslashes($rs['ID_USUARIO']));
            $objVO->setId_disciplina(stripslashes($rs['ID_DISCIPLINA']));
                       
            $return [] = clone $objVO;
        }
        return $return;
    }
  
    
    public function delete(turmaVO $objVO, $link) {
         if ($objVO->getId_turma() == NULL){
             throw new Exception ("Erro ao tentar excluir a turma, verifique a chave primária.");
         }
         $query = sprintf('DELETE FROM turma WHERE id_turma = "%s"', $objVO->getId_turma());
         try {
             if(!mysqli_query($link, $query)){
                 throw new Exception ("Erro ao excluir turma!");
             }
         } catch (Exception $ex) {
             echo $ex->getMessage();
             mysqli_rollback($link);
         }
         mysqli_commit($link);
         return mysqli_query($link, $query);
    }
    
    public function update(turmaVO $objVO, $link) {
        
    }
    
}