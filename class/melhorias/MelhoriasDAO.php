<?php

class MelhoriasDAO {

    function create(MelhoriasVO $melhoriasVO, $conn) {
        $id = $melhoriasVO->getId_melhoria();
        $descricao = $melhoriasVO->getDescricao();
        $email = $melhoriasVO->getEmail();
        $dt_solicitacao = $melhoriasVO->getDt_solicitacao();
        $dt_atualizacao = $melhoriasVO->getDt_atualizacao();
        $situacao = $melhoriasVO->getSituacao();
        $id_usuario = $melhoriasVO->getIdUsuario();

        $query = "INSERT INTO melhorias (ID_DISCIPLINA, DESCRICAO, EMAIL, DT_SOLICITACAO, DT_ATUALIZACAO, SITUACAO, ID_USUARIO) "
                . "VALUES ($id, '$descricao','$email','$dt_solicitacao','$dt_atualizacao','$situacao','$id_usuario')";

        return mysqli_query($conn, $query);
    }

    function read($conn, $id) {
        $melhoriasVO = new melhoriasVO();

        $query = "SELECT * FROM melhorias WHERE ID_MELHORIAS=$id";

        $resultado = mysqli_query($conn, $query);

        while ($row_melhoria = mysqli_fetch_array($resultado)) {
            $melhoriasVO->setId_melhoria($row_melhoria['ID_MELHORIAS']);
            $melhoriasVO->setDescricao($row_melhoria['DESCRICAO']);
            $melhoriasVO->setEmail($row_melhoria['EMAIL']);
            $melhoriasVO->setDt_solicitacao($row_melhoria['DT_SOLICITACAO']);
            $melhoriasVO->setDt_atualizacao($row_melhoria['DT_ATUALIZACAO']);
            $melhoriasVO->setSituacao($row_melhoria['SITUACAO']);
            $melhoriasVO->setId_usuario($row_melhoria['ID_USUARIO']);
        }

        return clone $melhoriasVO;
    }

    function update(MelhoriasVO $melhoriasVO, $conn) {
        $id = $melhoriasVO->getId_melhoria();
        $descricao = $melhoriasVO->getDescricao();
        $email = $melhoriasVO->getEmail();
        $dt_solicitacao = $melhoriasVO->getDt_solicitacao();
        $dt_atualizacao = $melhoriasVO->getDt_atualizacao();
        $situacao = $melhoriasVO->getSituacao();
        $id_usuario = $melhoriasVO->getIdUsuario();

        $query = "UPDATE melhorias SET id=$id, descricao=$descricao, email=$email, dt_solicitacao=$dt_solicitacao,dt_atualizacao=$dt_atualizacao, situacao=$situacao,id_usuario=$id_usuario"
                . " WHERE id=$id";

        return mysqli_query($conn, $query);
    }

    function delete(MelhoriasVO $melhoriasVO, $conn) {
        $id = $melhoriasVO->getId_melhoria();

        $query = "DELETE FROM melhoria WHERE id=$id";

        return mysqli_query($conn, $query);
    }

    
    //função que recebe como parametro a conexão. 
    //função responsavel por mostrar a tabela melhorias
    function selectAll($link){
        
        
        //crio um novo objetoVO
        $melhoriasVO=new MelhoriasVO();
        
        //Retorno um ARRAY
        $return=array();
        
        //Crio uma variavel para receber o SELECT FROM
        $query="SELECT *FROM categoria";
                
        //Variavel $resultado recebe o link e a query
        $resultado= mysqli_query($link, $query);
        
        //use o ciclo WHILE para percorrer todos os dados da tabela melhorias
        //use o "mysqli_fetch_array" para tranformar em matriz e mostrar na tela a variavel $resultado
        while ($row_melhoria = mysqli_fetch_array($resultado)) {
            $melhoriasVO->setId_melhoria($row_melhoria['ID_MELHORIAS']);
            $melhoriasVO->setDescricao($row_melhoria['DESCRICAO']);
            $melhoriasVO->setEmail($row_melhoria['EMAIL']);
            $melhoriasVO->setDt_solicitacao($row_melhoria['DT_SOLICITACAO']);
            $melhoriasVO->setDt_atualizacao($row_melhoria['DT_ATUALIZACAO']);
            $melhoriasVO->setSituacao($row_melhoria['SITUACAO']);
            $melhoriasVO->setId_usuario($row_melhoria['ID_USUARIO']);
        
            
            //pego a variavel que possue um ARRAY "$RETURN=ARRAY()" e este ARRAY recebe um CLONE do objeto $categoriaVO
            $return[]= clone $melhoriasVO;
        }
        
        //retornar link e query
        return mysqli_query($link, $query);  
    }
    
}
