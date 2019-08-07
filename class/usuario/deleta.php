<?php

require_once './usuarioVO.php';
require_once './usuarioDAO.php';
require_once '../../config/conexao.php';
$usuarioVO = new UsuarioVO();
$usuarioDAO = new UsuarioDAO();

echo $id = $_GET['id'];
echo $usuarioVO->setId_usuario($id);

$resultado=$usuarioDAO->delete($usuarioVO, $conn);

if ($resultado>0) {
    echo 'registro excluído com sucesso';
    header('Location:listar_todos.php');
} else {
    echo 'erro ao excluir registro.';
    header('Location:listar_todos.php');
}
;

