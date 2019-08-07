<?php

class turma_alunoDAO {
    
    public function insert(turma_alunoVO $objVO, $link) {
        $query = sprintf("INSERT INTO turma_aluno (ID_TURMA, ID_USUARIO) VALUES (".$objVO->getId_turma().", ".$objVO->getId_usuario().")"); 
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
    
    
}
?>