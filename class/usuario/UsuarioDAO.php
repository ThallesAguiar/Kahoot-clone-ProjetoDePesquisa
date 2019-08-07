<?php

class UsuarioDAO {

    public function insert(UsuarioVO $usuarioVO, $link) {
        $id_tipo_usuario = $usuarioVO->getId_tipo_usuario();
        $nome = $usuarioVO->getNome();
        $email=$usuarioVO->getEmail();
        $senha=$usuarioVO->getSenha();
        $foto=$usuarioVO->getFoto_usuario();

        $query = "INSERT INTO usuario (NOME, EMAIL,SENHA, ID_TIPO_USUARIO,FOTO_USUARIO ) VALUES ('$nome', '$email','$senha',$id_tipo_usuario,'$foto')";

        try {
            if (mysqli_query($link, $query)) {
                mysqli_commit($link);
                $usuarioVO->setId_usuario(mysqli_insert_id($link));
                return $usuarioVO;
            } else {
                throw new Exception('Erro ao cadastrar!');
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            mysqli_rollback($link);
        }
        return mysqli_query($link, $query);
    }

    public function getAll($link) {
        mysqli_query($link, "SET NAMES 'UTF8'");
        $objVO = new usuarioVO();
        $return = array();
        $query = 'SELECT * FROM `usuario` ORDER BY `ID_USUARIO`';
        $resultado = mysqli_query($link, $query);
        while ($rs = mysqli_fetch_array($resultado)) {
            $objVO->setId_usuario(stripslashes($rs['ID_USUARIO']));
            $objVO->setNome(stripslashes($rs['NOME']));
            $objVO->setEmail(stripslashes($rs['EMAIL']));
            $objVO->setSenha(stripslashes($rs['SENHA']));
            $objVO->setId_tipo_usuario(stripslashes($rs['ID_TIPO_USUARIO']));

            $return [] = clone $objVO;
        }
        return $return;
    }

    public function getLikeUsuario($link, $texto) {
        mysqli_query($link, "SET NAMES 'utf8'");
        $objVO = new usuarioVO();
        $return = array();
        $sql = sprintf('select * from usuario where `EMAIL` like "%%%s%%"', $texto);
        $resultado = mysqli_query($link, $sql);
        while ($rs = mysqli_fetch_array($resultado)) {
            $objVO->setId_usuario(stripslashes($rs['ID_USUARIO']));
            $objVO->setNome(stripslashes($rs['NOME']));
            $objVO->setEmail(stripslashes($rs['EMAIL']));
            $objVO->setSenha(stripslashes($rs['SENHA']));
            $objVO->setId_tipo_usuario(stripslashes($rs['ID_TIPO_USUARIO']));

            $return[] = clone $objVO;
        }
        return $return;
    }

    function delete(UsuarioVO $usuarioVO, $conn) {
        //$id = $usuarioVO->getId_usuario();
        echo $query = "DELETE * FROM usuario WHERE ID_USUARIO = {$usuarioVO->getId_usuario()}";
        
        return mysqli_query($conn, $query);
    }

    function update(UsuarioVO $usuarioVO, $conn){
        
        //Cria novas variaveis pegando com GET os valores da classe VO
        $id= $usuarioVO->getId_usuario();
        //$nome= $usuarioVO->getNome();
        $email=$usuarioVO->getEmail();
        $senha=$usuarioVO->getSenha();
        $foto=$usuarioVO->getFoto_usuario();
        
        //Atualiza valores na tabela categoria, passando as variaveis para os valores da tabela
        $query="UPDATE usuario SET EMAIL='$email',SENHA='$senha', FOTO_USUARIO='$foto' WHERE ID_USUARIO = '$id'";
        
        //echo $query;
        
        //retornar link e query
        return mysqli_query($conn, $query);
    }
    
    function read($conn,$id){
        
        //criar novo objetoVO e instancia
        $usuarioVO= new UsuarioVO();
        $query="SELECT * FROM usuario WHERE ID_USUARIO =$id";
        
        //Variavel $resultado recebe o link e a query
        $resultado= mysqli_query($conn, $query);
        
        /*use o ciclo WHILE para percorrer todos os dados da tabela categoria
        use o "mysqli_fetch_array" para tranformar em matriz e mostrar na tela a variavel $resultado*/
        while($row_categoria = mysqli_fetch_array($resultado)){
            //pego o novo objeto que criei e SETo ele
            $usuarioVO->setId_usuario($row_categoria['ID_USUARIO']);
            $usuarioVO->setNome($row_categoria['NOME']);
            $usuarioVO->setEmail($row_categoria['EMAIL']);
            $usuarioVO->setSenha($row_categoria['SENHA']);
            
            //$return = clone $categoriaVO;
        }
        //saio do ciclo de repetição e RETORNO um CLONE do OBEJTO "$categoriaVO"
        return clone $usuarioVO;    
    } 

}
