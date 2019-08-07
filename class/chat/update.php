<?php

session_start();
require_once './UsuarioVO.php';
require_once './UsuarioDAO.php';
require_once '../../config/conexao.php';
$usuarioVO = new UsuarioVO();
$usuarioDAO = new UsuarioDAO();

if (empty($_POST['email']) OR empty($_POST['senha'])) {

    /* echo '<script>alert("Caro usuário, você esqueceu de atualizar algum dado, ou deixou algum campo em branco!");   
      window.location.href = "edita.php";
      </script>'; */

    $_SESSION['erroUpdate'] = "Caro usuário, você esqueceu de atualizar algum dado, ou deixou algum campo em branco!";
    header("Location:edita.php");
    exit();
}else{

    if (isset($_FILES['foto'])) {

        $extensao = strtolower(substr($_FILES['foto']['name'], -4)); //pega a extensão do arquivo
        $novo_nome = md5(time()) . $extensao; //define o nome do arquivo
        $diretorio = "../../images_users/"; //define o diretorio para onde enviaremos o arquivo

        move_uploaded_file($_FILES['foto']['tmp_name'], $diretorio . $novo_nome); //efetua o upload
    }





    $id = $_SESSION['UsuarioID'];
    $email = $_POST['email'];
    $nova_senha = md5($_POST['senha']);


    $usuarioVO->setId_usuario($id);
    $usuarioVO->setEmail($email);
    $usuarioVO->setSenha($nova_senha);
    $usuarioVO->setFoto_usuario($novo_nome);


    if ($usuarioDAO->update($usuarioVO, $conn) == TRUE) {
        if ($_SESSION['UsuarioNivel']==3){
        echo 'registro alterado com sucesso';
        header('Location: ../../pagina-aluno/index.php');
        }
        if ($_SESSION['UsuarioNivel']==2){
            echo 'registro alterado com sucesso';
        header('Location: ../../pagina-professor/index.php');
        }
        if ($_SESSION['UsuarioNivel']==1){
            echo 'registro alterado com sucesso';
        header('Location: ../../pagina-adm/index.php');
        }
    } else {
        echo 'erro ao alterar registro.';
        header('Location: edita.php');
    }
    ;

}

