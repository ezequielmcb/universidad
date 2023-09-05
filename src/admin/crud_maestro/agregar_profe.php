<?php
// Incluye el archivo de conexión
include('../../accions/connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    try {
        $correo = $_POST['email'];
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellido'];
        $direccion = $_POST['direccion'];
        $fecha_nacimiento = $_POST['fecha_nacimiento'];
        $materia = $_POST['clase_asignada'];

        $query = "INSERT INTO usuarios (`nombre`, `apellido`,`direccion`, `fecha_nacimiento`, `rol_id`) VALUES ('$nombre', '$apellidos','$direccion','$fecha_nacimiento', 2)";
        $resultado = $mysqli->query($query);

        $id_generado = $mysqli->insert_id;

        $query_id = 'Select max(id_user) as id_users from `usuarios`';

        $result = $mysqli->query($query_id);

        $dato = $result->fetch_assoc();
        $dato_id = $dato['id_users'];

        if ($materia) {
            $queryMateria = "INSERT INTO `profesor_materias`(`id_profesor`, `id_profemate`) VALUES ($dato_id,  $materia)";
            $mysqli->query($queryMateria);
        }

        header('location: ./admin_views_profe.php');
        exit();
    } catch (mysqli_sql_exception $e) {
        echo $e->getMessage();
    }
}
