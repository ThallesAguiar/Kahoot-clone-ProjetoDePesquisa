<?php
class DisciplinaDAO{

	function create(DisciplinaVO $disciplinaVO, $conn){
		$id=$disciplinaVO->getId_disciplina();
		$nome=$disciplinaVO->getNome();

		$query="INSERT INTO disciplina (ID_DISCIPLINA, NOME) VALUES ($id, '$nome')";

		return mysqli_query($conn, $query);
	}


	function read($conn, $id){
		$disciplinaVO= new DisciplinaVO();

		$query="SELECT * FROM disciplina WHERE ID_DISCIPLINA=$id";

		$resultado=mysqli_query($conn, $query);

		while ($row_disciplina=mysqli_fetch_array($resultado)) {
			$id=$disciplinaVO->setId_disciplina($row_disciplina['id_disciplina']);
			$nome=$disciplinaVO->setNome($row_disciplina['nome']);
		}

		return clone $disciplinaVO;
	}


	function update(DisciplinaVO $disciplinaVO, $conn){
		$id=$disciplinaVO->getId_disciplina();
		$nome=$disciplinaVO->getNome();

		$query="UPDATE disciplina SET id=$id, nome='$nome' WHERE id=$id";

		return mysqli_query($conn, $query);
	}


	function delete(DisciplinaVO $disciplinaVO, $conn){
		$id=$disciplinaVO->getId_disciplina();

		$query="DELETE FROM disciplina WHERE id=$id";

		return mysqli_query($conn, $query);
	}

            
        

	













	/*public function insert(disciplinaVO $objVO, $link)
    {
        $query = ("INSERT INTO disciplina (ID_DISCIPLINA, NOME) VALUES ('{$objVO->getId_disciplina()}', '{$objVO->getNome()}')");
        //$query = ("INSERT INTO disciplina (NOME) VALUES ('{$objVO->getNome()}')");
        try
        {
            if (mysqli_query($link, $query))
            {
                mysqli_commit($link);
                $objVO->setId_disciplina(mysqli_insert_id($link));
                return $objVO;
            }
            else
            {
                throw new Exception('Erro ao cadastrar!');
            }
        }
        catch (Exception $e)
        {
            echo $e->getMessage();
            mysqli_rollback($link);
        }
    }*/

    public function getAll($link)
    {
        mysqli_query($link, "SET NAMES 'UTF8'");
        $objVO = new disciplinaVO();
        $return = array();
        $query = 'SELECT * FROM `disciplina` ORDER BY `ID_DISCIPLINA`';
        $resultado = mysqli_query($link, $query);
        while ($rs = mysqli_fetch_array($resultado))
        {
            $objVO->setId_disciplina(stripslashes($rs['ID_DISCIPLINA']));
            $objVO->setNome(stripslashes($rs['NOME']));
            $return [] = clone $objVO;
        }
        return $return;
    }

    public function getDisciplina($link, $id)
    {
        $objVO = new disciplinaVO();
        $return = array();
        $query = "SELECT * FROM disciplina WHERE ID_DISCIPLINA = {$id}";
        $resultado = mysqli_query($link, $query);
        while ($rs = mysqli_fetch_array($resultado))
        {
            $objVO->setId_disciplina(stripslashes($rs['ID_DISCIPLINA']));
            $objVO->setNome(stripslashes($rs['NOME']));
            $return [] = clone $objVO;
        }
        return $return;
    }
}