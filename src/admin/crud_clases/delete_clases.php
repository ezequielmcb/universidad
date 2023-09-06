<?php
require_once('../../accions/connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST["editId"];

    $cambiar = "UPDATE alumnos_materias SET id_alumate = null WHERE id_alumate = $id";
    $cambiar = "UPDATE profesor_materias SET id_profemate = null WHERE id_profemate = $id";
    
    if ($mysqli->query($cambiar)) {
        $cambiar = "UPDATE materias SET id_materia = null WHERE id_materia = $id";
        $mysqli->query($delete);
    } else {
        echo "Error al actualizar los alumnos relacionados: " . $mysqli->error;
    }

    header('location: ./admin_views_clases.php');
} else {
    echo "Error en la solicitud de eliminación.";
}

$mysqli->close();
?>
