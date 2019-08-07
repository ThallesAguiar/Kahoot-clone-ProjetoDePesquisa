<?php

require_once '../../config/conexao.php';
require_once './UsuarioVO.php';
require_once './UsuarioDAO.php';

$nome = $_POST['usuario'];
$email = $_POST['email'];
$senha = MD5($_POST['senha']);
$nome_imagem= $_FILES['foto']['name'];
$id_tipo_usuario=$_POST['tipo_usuario'];


//if (isset($_FILES['foto'])) {
//
//    $extensao = strtolower(substr($_FILES['foto']['name'], -4)); //pega a extensão do arquivo
//    $novo_nome = md5(time()) . $extensao; //define o nome do arquivo
//    $diretorio = "../../images_users/"; //define o diretorio para onde enviaremos o arquivo
//    move_uploaded_file($_FILES['foto']['tmp_name'], $diretorio . $novo_nome); //efetua o upload
//    //$foto = $novo_nome;
//
//    $query="INSERT INTO usuario ";
//} 
if (isset($_FILES['foto'])) {
//Pasta onde o arquivo vai ser salvo
    $_UP['pasta'] = '../../images_users/' . $nome . '/';

//Criar a pasta de foto do produto
    mkdir($_UP['pasta'], 0777);

    //verificar se é possivel mover o arquivo para a pasta escolhida
    if (move_uploaded_file($_FILES['foto']['tmp_name'], $_UP['pasta'] . $nome_imagem)) {
        
    }
}


$usuarioVO = new UsuarioVO();
$usuarioVO->setNome($nome);
$usuarioVO->setEmail($email);
$usuarioVO->setSenha($senha);
$usuarioVO->setId_tipo_usuario($id_tipo_usuario);
$usuarioVO->setFoto_usuario($nome_imagem);

$usuarioDAO = new UsuarioDAO();

if ($usuarioDAO->insert($usuarioVO, $conn) == TRUE) {
    echo '<script>alert("Operacao concluida com sucesso");   
               window.location.href = "../../index.php";
     </script>';
} else {
    echo '<br>erro ao inserir registro.';
}
            
        
        
        


        



 
