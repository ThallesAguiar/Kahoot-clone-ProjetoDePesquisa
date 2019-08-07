<?php

class tipo_usuarioDAO {
    
    public function insert(tipo_usuarioVO $objVO, $link) {
        $query = "INSERT INTO tipo_usuario (DESCRICAO) VALUES ('{$objVO->getDescricao()}')";
        try {
            if (!mysqli_query($link, $query)){
                throw new Exception("Erro ao cadastrar o tipo de usuário!");
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
            mysqli_rollback($link);
        }
        mysqli_commit($link);
        $objVO->setId_tipo_usuario(mysqli_insert_id($link));
        return $objVO;
    }
    
    public function getAll($link) {
        mysqli_query($link, "SET NAMES 'UTF8'");
        $objVO = new tipo_usuarioVO();
        $return = array();
        $query = 'SELECT * FROM tipo_usuario ORDER BY DESCRICAO';
        try{
            if (!$resultado = mysqli_query($link, $query)){
                throw new Exception ("Erro ao buscar os tipos de usuário cadastrados no banco de dados!");
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
        while ($rs = mysqli_fetch_array($resultado)){
            $objVO->setId_tipo_usuario(stripslashes($rs['id_tipo_usuario']));
            $objVO->setDescricao(stripslashes($rs['descricao']));
            $return = clone $objVO;
        }
        return $return;
    }
    
    public function getById($link, $id) {
        $objVO = new tipo_usuarioVO();
        $query = "SELECT * FROM tipo_usuario WHERE ID_TIPO_USUARIO = {$id}";
        try{
            if (!$resultado = mysqli_query($link, $query)){
                throw new Exception("Erro ao pesquisar o valor no banco de dados.");
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
        while ($rs = mysqli_fetch_array($resultado)){
            $objVO->setId_tipo_usuario(stripslashes($rs['id_tipo_usuario']));
            $objVO->setDescricao(stripslashes($rs['descricao']));
            $return = clone $objVO;
        }
        return $return;
    }
    
    public function delete(tipo_usuarioVO $objVO, $link) {
        
    }
    
    public function update(tipo_usuarioVO $objVO, $link) {
        
    }
}
