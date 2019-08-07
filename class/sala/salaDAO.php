<?php

class salaDAO {
    
    public function insert(salaVO $salaVO, $conn) {
        $nome=$salaVO->getNome();
        $senha= $salaVO->getSenha();
        $descricao=$salaVO->getDescricao();
        $visivel=$salaVO->getVisivel();
        $imagem=$salaVO->getImagem();
        $id_usuario=$salaVO->getId_usuario();

        echo $query = "INSERT INTO sala (NOME,SENHA, DESCRICAO,VISIVEL,IMAGEM,DATA,ID_USUARIO)VALUES ('$nome','$senha','$descricao','$visivel','$imagem',NOW(),'$id_usuario')";
         
       
         mysqli_query($conn, $query);
         
         //echo mysqli_error($conn);
         
          return mysqli_insert_id($conn);        

    }
    
    //lê um registro do banco, por sua chave primária
    public function read($conn, $id) {
        $salaVO = new salaVO( );
        $query ="select * from sala where ID_SALA = $id";
        $resultado = mysqli_query($conn, $query);
        while ($rs = mysqli_fetch_array($resultado)) {
            $salaVO->setId_sala(stripslashes($rs['ID_SALA']));
            $salaVO->setNome(stripslashes($rs['NOME']));
            $salaVO->setSenha(stripslashes($rs['SENHA']));
            $salaVO->setDescricao(stripslashes($rs['DESCRICAO']));
            $salaVO->setVisivel(stripslashes($rs['VISIVEL']));
            $salaVO->setImagem(stripslashes($rs['IMAGEM']));
            $salaVO->setData(stripslashes($rs['DATA']));
            $salaVO->setId_usuario(stripslashes($rs['ID_USUARIO']));
             
        }
        return clone $salaVO;
    }
    
    public function getAll($conn) {
        mysqli_query($conn, "SET NAMES 'UTF8'");
        $salaVO = new salaVO();
        $return = array();
        $query = 'SELECT * FROM `sala` ORDER BY `ID_SALA`';
        $resultado = mysqli_query($conn, $query);
        while ($rs = mysqli_fetch_array($resultado)) {
            $salaVO->setId_sala(stripslashes($rs['ID_SALA']));
            $salaVO->setNome(stripslashes($rs['NOME']));
            $salaVO->setSenha(stripslashes($rs['SENHA']));
            $salaVO->setDescricao(stripslashes($rs['DESCRICAO']));
            $salaVO->setVisivel(stripslashes($rs['VISIVEL']));
            $salaVO->setImagem(stripslashes($rs['IMAGEM']));
            $salaVO->setData(stripslashes($rs['DATA']));
            $salaVO->setId_usuario(stripslashes($rs['ID_USUARIO']));        
            $return [] = clone $salaVO;
        }
        return $return;
    }   
    
    
    public function mostrar_Salas($conn, $id_usuario) {
        mysqli_query($conn, "SET NAMES 'UTF8'");
        $salaVO = new salaVO();
        $return = array();
        $query = "SELECT * FROM `sala` WHERE ID_USUARIO=$id_usuario ORDER BY `ID_SALA`";
        $resultado = mysqli_query($conn, $query);
        while ($rs = mysqli_fetch_array($resultado)) {
            $salaVO->setId_sala(stripslashes($rs['ID_SALA']));
            $salaVO->setNome(stripslashes($rs['NOME']));
            $salaVO->setSenha(stripslashes($rs['SENHA']));
            $salaVO->setDescricao(stripslashes($rs['DESCRICAO']));
            $salaVO->setVisivel(stripslashes($rs['VISIVEL']));
            $salaVO->setImagem(stripslashes($rs['IMAGEM']));
            $salaVO->setData(stripslashes($rs['DATA']));
            $salaVO->setId_usuario(stripslashes($rs['ID_USUARIO']));          
            $return [] = clone $salaVO;
        }
        return $return;
    }   
    
    public function delete(salaVO $salaVO, $conn) {
         if ($salaVO->getId_sala() == NULL){
             throw new Exception ("Erro ao tentar excluir a sala, verifique a chave primária.");
         }
         $query = sprintf('DELETE FROM sala WHERE ID_SALA = "%s"', $salaVO->getId_sala());
         try {
             if(!mysqli_query($conn, $query)){
                 throw new Exception ("Erro ao excluir sala!");
             }
         } catch (Exception $ex) {
             echo $ex->getMessage();
             mysqli_rollback($conn);
         }
         mysqli_commit($conn);
         return mysqli_query($conn, $query);
    }
    
    function update(SalaVO $salaVO, $conn) {
        $id_sala= $salaVO->getId_sala();
        $nome = $salaVO->getNome();
        $senha=$salaVO->getSenha();
        $visivel=$salaVO->getVisivel();
        $descricao=$salaVO->getDescricao();
        
        $query = "UPDATE sala SET NOME='$nome',SENHA='$senha',DESCRICAO='$descricao', VISIVEL='$visivel' WHERE ID_SALA='$id_sala'";
        return (mysqli_query($conn, $query));
    }
    
    //CONTA AS SALAS
    function qtd_Salas($conn,$id_usuario){
            $query="SELECT * FROM sala WHERE ID_USUARIO=$id_usuario";
            $resultado= mysqli_query($conn, $query);
            //contar o tatal de itens
            $total_salas= mysqli_num_rows($resultado);
            
            if ($total_salas){
                for ($i=1;$i<=$total_salas;$i++){
                    return $i++;
                }
            }
            
    }
}
