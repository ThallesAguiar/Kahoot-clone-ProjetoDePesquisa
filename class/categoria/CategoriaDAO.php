<?php

class CategoriaDAO {

    //CRIAR
    function create(CategoriaVO $categoria, $link){
        
        //Cria novas variaveis pegando com GET os valores da classe VO
        //$id= $categoria->getId_categoria();
       $descricao= $categoria->getDescricao();
       $menu_pai= $categoria->getMenu_pai();
        
        //Insere valores na tabela categoria
        $query="INSERT INTO categoria ( DESCRICAO, MENU_PAI) VALUES ('$descricao',$menu_pai)" ;
        
        //retorna o mysqli_query com o link e a variavel $query
        return mysqli_query($link, $query);
    }

    //LISTAR
    function read($link,$id){
        
        //criar novo objetoVO e instancia
        $categoriaVO= new CategoriaVO();
        $query="SELECT * FROM categoria WHERE ID_CATEGORIA =$id";
        
        //Variavel $resultado recebe o link e a query
        $resultado= mysqli_query($link, $query);
        
        /*use o ciclo WHILE para percorrer todos os dados da tabela categoria
        use o "mysqli_fetch_array" para tranformar em matriz e mostrar na tela a variavel $resultado*/
        while($row_categoria = mysqli_fetch_array($resultado)){
            //pego o novo objeto que criei e SETo ele
            $categoriaVO->setId_categoria($row_categoria['id_categoria']);
            $categoriaVO->setDescricao($row_categoria['descricao']);
            $categoriaVO->setMenu_pai($row_categoria['menu_pai']);
            
            //$return = clone $categoriaVO;
        }
        //saio do ciclo de repetição e RETORNO um CLONE do OBEJTO "$categoriaVO"
        return clone $categoriaVO;    
    } 
    
    //ATUALIZAR
    function update(CategoriaVO $categoria, $link){
        
        //Cria novas variaveis pegando com GET os valores da classe VO
        $id= $categoria->getId_categoria();
        $descricao= $categoria->getDescricao();
        $menu_pai= $categoria->getMenu_pai();
        
        //Atualiza valores na tabela categoria, passando as variaveis para os valores da tabela
        $query="UPDATE categoria SET ID_CATEGORIA='$id',DESCRICAO='$descricao',MENU_PAI='$menu_pai' WHERE id_categoria = '$id'";
        
        //echo $query;
        
        //retornar link e query
        return mysqli_query($link, $query);
    }
    
    //DELETAR
    function delete(CategoriaVO $categoria, $link){
        
        //Pego somente o ID da coluna que eu vou querer apagar, pois o ID é unico
        $id= $categoria->getId_categoria();
        
        //Deleto o ID da tabela categoria
        $query="DELETE FROM categoria WHERE id_categoria=$id";
        
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
