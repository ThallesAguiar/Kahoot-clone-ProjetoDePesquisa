<?php

class jogoDAO {
    
    public function insert(jogoVO $jogoVO, $conn) {
        $pin=$jogoVO->getPin();
        $id_sala=$jogoVO->getId_sala();

        $query = "INSERT INTO jogo (PIN,ID_SALA)VALUES ($pin,$id_sala)";
         
       
         mysqli_query($conn, $query);
         
         //echo mysqli_error($conn);
         
          return mysqli_insert_id($conn);        

    }
    
    //lê um registro do banco, por sua chave primária
    public function read($conn, $id) {
        $jogoVO = new jogoVO( );
        $query ="select * from jogo where ID_JOGO = $id";
        $resultado = mysqli_query($conn, $query);
        while ($rs = mysqli_fetch_array($resultado)) {
            $jogoVO->setId_jogo(stripslashes($rs['ID_JOGO']));
            $jogoVO->setNome(stripslashes($rs['NOME']));
            $jogoVO->setSenha(stripslashes($rs['SENHA']));
            $jogoVO->setDescricao(stripslashes($rs['DESCRICAO']));
            $jogoVO->setVisivel(stripslashes($rs['VISIVEL']));
            $jogoVO->setImagem(stripslashes($rs['IMAGEM']));
            $jogoVO->setData(stripslashes($rs['DATA']));
            $jogoVO->setId_usuario(stripslashes($rs['ID_USUARIO']));
             
        }
        return clone $jogoVO;
    }
    
    public function getAll($conn) {
        mysqli_query($conn, "SET NAMES 'UTF8'");
        $jogoVO = new jogoVO();
        $return = array();
        $query = 'SELECT * FROM `jogo` ORDER BY `ID_JOGO`';
        $resultado = mysqli_query($conn, $query);
        while ($rs = mysqli_fetch_array($resultado)) {
            $jogoVO->setId_jogo(stripslashes($rs['ID_JOGO']));
            $jogoVO->setNome(stripslashes($rs['NOME']));
            $jogoVO->setSenha(stripslashes($rs['SENHA']));
            $jogoVO->setDescricao(stripslashes($rs['DESCRICAO']));
            $jogoVO->setVisivel(stripslashes($rs['VISIVEL']));
            $jogoVO->setImagem(stripslashes($rs['IMAGEM']));
            $jogoVO->setData(stripslashes($rs['DATA']));
            $jogoVO->setId_usuario(stripslashes($rs['ID_USUARIO']));        
            $return [] = clone $jogoVO;
        }
        return $return;
    }   
    
    
    public function mostrar_Salas($conn, $id_usuario) {
        mysqli_query($conn, "SET NAMES 'UTF8'");
        $jogoVO = new jogoVO();
        $return = array();
        $query = "SELECT * FROM `jogo` WHERE ID_USUARIO=$id_usuario ORDER BY `ID_JOGO`";
        $resultado = mysqli_query($conn, $query);
        while ($rs = mysqli_fetch_array($resultado)) {
            $jogoVO->setId_jogo(stripslashes($rs['ID_JOGO']));
            $jogoVO->setNome(stripslashes($rs['NOME']));
            $jogoVO->setSenha(stripslashes($rs['SENHA']));
            $jogoVO->setDescricao(stripslashes($rs['DESCRICAO']));
            $jogoVO->setVisivel(stripslashes($rs['VISIVEL']));
            $jogoVO->setImagem(stripslashes($rs['IMAGEM']));
            $jogoVO->setData(stripslashes($rs['DATA']));
            $jogoVO->setId_usuario(stripslashes($rs['ID_USUARIO']));          
            $return [] = clone $jogoVO;
        }
        return $return;
    }   
    
    public function delete(jogoVO $jogoVO, $conn) {
         if ($jogoVO->getId_jogo() == NULL){
             throw new Exception ("Erro ao tentar excluir a jogo, verifique a chave primária.");
         }
         $query = sprintf('DELETE FROM jogo WHERE ID_JOGO = "%s"', $jogoVO->getId_jogo());
         try {
             if(!mysqli_query($conn, $query)){
                 throw new Exception ("Erro ao excluir jogo!");
             }
         } catch (Exception $ex) {
             echo $ex->getMessage();
             mysqli_rollback($conn);
         }
         mysqli_commit($conn);
         return mysqli_query($conn, $query);
    }
    
    function update(SalaVO $jogoVO, $conn) {
        $id_jogo= $jogoVO->getId_jogo();
        $nome = $jogoVO->getNome();
        $senha=$jogoVO->getSenha();
        $visivel=$jogoVO->getVisivel();
        $descricao=$jogoVO->getDescricao();
        
        $query = "UPDATE jogo SET NOME='$nome',SENHA='$senha',DESCRICAO='$descricao', VISIVEL='$visivel' WHERE ID_JOGO='$id_jogo'";
        return (mysqli_query($conn, $query));
    }
    
    //CONTA AS JOGOS
    function qtd_Salas($conn,$id_usuario){
            $query="SELECT * FROM jogo WHERE ID_USUARIO=$id_usuario";
            $resultado= mysqli_query($conn, $query);
            //contar o tatal de itens
            $total_jogos= mysqli_num_rows($resultado);
            
            if ($total_jogos){
                for ($i=1;$i<=$total_jogos;$i++){
                    return $i++;
                }
            }
            
    }
}
