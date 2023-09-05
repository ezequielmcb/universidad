<?php
require_once('../../accions/connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['deleteId'])) {
    
    // // Ejecutar la consulta SQL para eliminar el registro
    // $mysqli->query("DELETE FROM usuarios WHERE id_user = $id");

    // // Redirigir después de la eliminación
    // header('location: ./admin_views_alum.php');
    // exit();
    echo "la solicitud de eliminación.";
} else {
    echo "Error en la solicitud de eliminación.";
}
?>

