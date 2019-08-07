<?php

session_start();
require_once './UsuarioVO.php';
require_once './UsuarioDAO.php';
require_once '../../config/conexao.php';
$usuarioVO = new UsuarioVO();
$usuarioDAO = new UsuarioDAO();

$id = $_SESSION['UsuarioID'];
$email = $_POST['email'];
$nova_senha = md5($_POST['senha']);
$nome_imagem=$_FILES['foto']['name'];

if (empty($_POST['email']) OR empty($_POST['senha'])) {

    $_SESSION['erroUpdate'] = "Caro usuário, você esqueceu de atualizar algum dado, ou deixou algum campo em branco!";
    header("Location:edita.php");
    exit();
    
} else {

    if (isset($_FILES['foto'])) {
        
        $nome = $_POST['nome'];

        //Pasta onde o arquivo vai ser salvo
        $_UP['pasta'] = '../../images_users/' . $nome . '/';

        //verificar se é possivel mover o arquivo para a pasta escolhida
        if (move_uploaded_file($_FILES['foto']['tmp_name'], $_UP['pasta'] . $nome_imagem)) {
            
        }
    }


    $usuarioVO->setId_usuario($id);
    $usuarioVO->setEmail($email);
    $usuarioVO->setSenha($nova_senha);
    $usuarioVO->setFoto_usuario($nome_imagem);


    if ($usuarioDAO->update($usuarioVO, $conn) == TRUE) {
        if ($_SESSION['UsuarioNivel'] == 3) {
            echo 'registro alterado com sucesso';
            header('Location: ../../pagina-aluno/index.php');
        }
        if ($_SESSION['UsuarioNivel'] == 2) {
            echo 'registro alterado com sucesso';
            header('Location: ../../pagina-professor/index.php');
        }
        if ($_SESSION['UsuarioNivel'] == 1) {
            echo 'registro alterado com sucesso';
            header('Location: ../../pagina-adm/index.php');
        }
    } else {
        echo 'erro ao alterar registro.';
        header('Location: edita.php');
    }
    ;
}

