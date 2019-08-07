<?php

class Foto_usuarioDAO {

    //CRIAR
    function create(Foto_usuarioVO $Foto_usuarioVO, $conn){
        
        //Cria novas variaveis pegando com GET os valores da classe VO
        //$id= $categoria->getId_categoria();
       $arquivo= $Foto_usuarioVO->getArquivo();
       $data= $Foto_usuarioVO->getData();
        
        //Insere valores na tabela categoria
        $query="INSERT INTO foto_usuario (ARQUIVO,DATA) VALUES ('$arquivo',$data)" ;
        
        //retorna o mysqli_query com o link e a variavel $query
        return mysqli_query($conn, $query);
    }

    //LISTAR
    function read($conn,$id){
        
        //criar novo objetoVO e instancia
        $Foto_usuarioVO= new Foto_usuarioVO();
        $query="SELECT * FROM foto_usuario WHERE ID_FOTO_USUARIO =$id";
        
        //Variavel $resultado recebe o link e a query
        $resultado= mysqli_query($conn, $query);
        
        /*use o ciclo WHILE para percorrer todos os dados da tabela categoria
        use o "mysqli_fetch_array" para tranformar em matriz e mostrar na tela a variavel $resultado*/
        while($row_categoria = mysqli_fetch_array($resultado)){
            //pego o novo objeto que criei e SETo ele
            $Foto_usuarioVO->setId_foto_usuario($row_categoria['id_foto_usuario']);
            $Foto_usuarioVO->setArquivo($row_categoria['arquivo']);
            $Foto_usuarioVO->setData($row_categoria['data']);
            //$return = clone $categoriaVO;
        }
        //saio do ciclo de repetição e RETORNO um CLONE do OBEJTO "$categoriaVO"
        return clone $Foto_usuarioVO;    
    } 
    
    //ATUALIZAR
    function update(Foto_usuarioVO $Foto_usuarioVO, $link){
        
        //Cria novas variaveis pegando com GET os valores da classe VO
        $id= $Foto_usuarioVO->getId_foto_usuario();
        $arquivo= $Foto_usuarioVO->getArquivo();
        $data= $Foto_usuarioVO->getData();
        
        //Atualiza valores na tabela categoria, passando as variaveis para os valores da tabela
        $query="UPDATE foto_usuario SET ID_FOTO_USUARIO='$id',ARQUIVO='$arquivo',DATA='$data' WHERE id_foto_usuario = '$id'";
        
        //echo $query;
        
        //retornar link e query
        return mysqli_query($link, $query);
    }
    
    //DELETAR
    function delete(Foto_usuarioVO $Foto_usuarioVO, $link){
        
        //Pego somente o ID da coluna que eu vou querer apagar, pois o ID é unico
        $id= $Foto_usuarioVO->getId_foto_usuario();
        
        //Deleto o ID da tabela categoria
        $query="DELETE FROM foto_usuario WHERE id_foto_usuario=$id";
        
        //retornar link e query
        return mysqli_query($link, $query);
    }
    
    
    
    //função que recebe como parametro a conexão. 
    //função responsavel por mostrar a tabela categoria
    function selectAll($link){
        
        
        //crio um novo objetoVO
        $categoriaVO=new CategoriaVO();
        
        //Retorno um ARRAY
        $return=array();
        
        //Crio uma variavel para receber o SELECT FROM
        $query="SELECT *FROM categoria";
                
        //Variavel $resultado recebe o link e a query
        $resultado= mysqli_query($link, $query);
        
        //use o ciclo WHILE para percorrer todos os dados da tabela categoria
        //use o "mysqli_fetch_array" para tranformar em matriz e mostrar na tela a variavel $resultado
        while($row_categoria= mysqli_fetch_array($resultado)){
            //pego o novo objeto que criei e SETo ele
            $categoriaVO->setId_categoria($row_categoria['ID_CATEGORIA']);
            $categoriaVO->setDescricao($row_categoria['DESCRICAO']);
            $categoriaVO->setMenu_pai($row_categoria['MENU_PAI']);
            
            //pego a variavel que possue um ARRAY "$RETURN=ARRAY()" e este ARRAY recebe um CLONE do objeto $categoriaVO
            $return[]= clone $categoriaVO;
        }
        
        //retornar $return
        return $return;  
    }
    
    
    //Paginação
    function selectAllWithPages($link,$start,$number_rows) {

        $categoriaVO = new CategoriaVO();

        $return = array();

        $sql = "SELECT * FROM categoria ". "LIMIT $start,$number_rows ";

        $resultado = mysqli_query($link, $sql);

         while ($row_categoria = mysqli_fetch_array($resultado)) {
            $categoriaVO->setId_categoria($row_categoria['id_categoria']);
            $categoriaVO->setDesc_categoria($row_categoria['descr_categoria']);
            $categoriaVO->setSigla_categoria($row_categoria['sigla_categoria']);

            $return[] = clone $categoriaVO;
        }

        return $return;
    }    
}
