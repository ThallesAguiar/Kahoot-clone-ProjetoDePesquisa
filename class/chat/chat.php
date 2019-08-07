
<?php
require_once '../../config/conexao.php';

session_start();


$nome = $_SESSION['UsuarioNome'];
$query = "SELECT FOTO_USUARIO FROM usuario WHERE NOME='$nome'";
$resultado = mysqli_query($conn, $query);

$linha = mysqli_fetch_array($resultado);
$foto = $linha["FOTO_USUARIO"];


$query = "SELECT * FROM chat ORDER BY id_chat DESC";
$resultado = mysqli_query($conn, $query);

while ($row = mysqli_fetch_array($resultado)):
    ?>
    <div id="chat_data">
        <div class="card" style="width: 100%;">
            <img class="card-img-top rounded-right"  style="width: 4em;" src="<?php echo "../../images_users/" . $nome . '/' . $foto; ?>" alt="Imagem de usuario">
            <div class="card-body">
                <small><p class="card-text"><?php echo $row['NOME']; ?> :</p></small>
                <p class="card-text" style="width: 100%;"><?php echo $row['MENSAGEM']; ?></p>
                <span style="float: right;"><?php echo formatDate($row['DATA']); ?></span>
            </div>
        </div>


    </div>
<?php endwhile; ?>