<?php
require_once('../../accions/connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST["editId"];

    // Elimina el registro en login_user
    $queryLoginUser = "DELETE FROM login_user WHERE id_users = $id";
    if ($mysqli->query($queryLoginUser)) {
        echo "Registro de correo eliminado con éxito.";
    } else {
        echo "Error al eliminar el registro de correo login: " . $mysqli->error;
    }

  // Supongamos que $id es el ID del usuario que deseas eliminar

// Elimina los registros relacionados en profesor_materias
$queryEliminarMaterias = "DELETE FROM profesor_materias WHERE id_profesor = $id";

if ($mysqli->query($queryEliminarMaterias)) {
    // Luego, elimina el registro en usuarios
    $queryEliminarUsuario = "DELETE FROM usuarios WHERE id_user = $id";

    if ($mysqli->query($queryEliminarUsuario)) {
        echo "Registro de usuario y sus materias eliminados con éxito.";
    } else {
        echo "Error al eliminar el registro de usuario: " . $mysqli->error;
    }
} else {
    echo "Error al eliminar las materias del usuario: " . $mysqli->error;
}


    // Redirige a la página después de la eliminación
    header('location: ./admin_views_alum.php');
} else {
    echo "Error en la solicitud de eliminación.";
}

$mysqli->close();
?>
