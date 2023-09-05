<?php
include("connection.php");
if (isset($_POST["email"]) && isset($_POST["pass"])) {
    $pass = $_POST["pass"];
    $email = $_POST["email"];

    $loginquery = "SELECT email, pass, dni, nombre, apellido, fecha_nacimiento, direccion, rol_id FROM 
    login_user 
    LEFT JOIN usuarios ON id_user = id_users WHERE `email` = '$email'";

    $result = $mysqli->query($loginquery);

    if ($result) {
        $row = $result->fetch_assoc();

        session_start();
        $_SESSION['user'] = $row;
        

        $contra = password_hash($row["pass"], PASSWORD_DEFAULT);

        var_dump($pass);
        var_dump($contra);
        if (password_verify($pass, $contra)) {
            header("Location: roles.php");

            echo "La contraseña es correcta.";
        } else {
            echo "La contraseña es incorrecta.";
        }
    } else {
        echo "Hubo un error en la consulta SQL.";
    }
}
