<?php
class DisciplinaVO
{
    private $id_disciplina;
    private $nome;

    function getId_disciplina()
    {
        return $this->id_disciplina;
    }

    function getNome()
    {
        return $this->nome;
    }

    function setId_disciplina($id_disciplina)
    {
        $this->id_disciplina = $id_disciplina;
    }

    function setNome($nome)
    {
        $this->nome = $nome;
    }
}