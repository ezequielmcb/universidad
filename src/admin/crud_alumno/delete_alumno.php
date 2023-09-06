<?php
require_once('../../accions/connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST["editId"];

    $queryUser = "DELETE FROM login_user WHERE id_users = $id";
    $mysqli->query($queryUser);

$delete = "DELETE FROM profesor_materias WHERE id_profesor = $id";

if ($mysqli->query($delete)) {
    $deleteUser = "DELETE FROM usuarios WHERE id_user = $id";
    $mysqli->query($deleteUser);
} else {
    echo "Error al eliminar las materias del usuario: " . $mysqli->error;
}

    header('location: ./admin_views_alum.php');
} else {
    echo "Error en la solicitud de eliminación.";
}

$mysqli->close();
?>
