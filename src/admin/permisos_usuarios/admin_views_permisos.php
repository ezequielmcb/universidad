<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user']['rol_id'] != 1) {
    header('Location: login.php');
    exit();
}
include('../../accions/connection.php');

$data = "SELECT login_user.*, usuarios.*
         FROM login_user
         INNER JOIN usuarios ON login_user.id_users = usuarios.id_user";

$resulta = $mysqli->query($data);

$rolquery = "SELECT * FROM roles";
$resulrol = $mysqli->query($rolquery);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/dist//output.css">
    <script src="../../accions/modalPermisos.js" defer></script>
    <script src="../../accions/modal_salir.js" defer></script>
</head>

<body>
    <div class="w-screen h-screen flex">
        <div class="flex h-full bg-blue-900 text-white w-60  py-6 flex-col justify-between">
            <div class="px-6">
                <div class="flex flex-row justify-center items-center width=50px pb-2">
                    <img src="../../assets/logo.jpg" alt="Logo" class="mx-auto max-w-full " width="50px" height="50px mb-">
                    <span class="block font-semibold text-gray-300">Universidad</span>
                </div>
                <div class="border-t border-white mb-2 pt-4 text-sm">Administrador</div>
                <div class="border-t border-white pt-4 text-sm ">Menu Administracion</div>
                <div class="mt-6 space-y-2">
                    <a href="./admin_views_permisos.php" class=" flex flex-row justify-center  group">
                        <img src="../../assets/permisos.svg" alt="llave" height="32px" width="32px">
                        <p class="px-4"> Permisos </p>
                    </a>
                    <a href="../crud_maestro/admin_views_profe.php" class=" flex flex-row justify-center  group">
                        <img src="../../assets/profe.svg" alt="" height="32px" width="32px">
                        <p class=" px-4"> Maestros </p>
                    </a>
                    <a href="../crud_alumno/admin_views_alum.php" class=" flex flex-row justify-center  group">
                        <img src="../../assets/alumno.svg" alt="" height="32px" width="32px">
                        <p class="px-4"> Alumnos </p>
                        <a href="../crud_clases/admin_views_clases.php" class=" flex flex-row justify-center group">
                            <img src="../../assets/clases.svg" alt="" height="32px" width="32px">
                            <p class="px-4"> Clases </p>
                        </a>
                </div>
            </div>
        </div>
        <div class="flex flex-col w-[calc(100%-15rem)] px-2">
            <nav class="flex h-10 w-full  flex-row justify-between items-center">
                <div class=" flex flex-row justify-items-stretch">
                    <a href="../admin_db.php" class="relative  flex flex-row items-center group">
                        <img src="../../assets/home.svg" alt="icono menu" width="18px" height="18px px-2">
                        <p class="px-4"> Home </p>
                    </a>
                </div>
                <div class=" flex flex-row justify-between items-center">
                <button id="buttonToggle" class="relative flex justify-center items-center group">
                        <p class="px-4"> administrador </p>
                        <div id="toggleMenu" class=" absolute top-full min-w-full w-max bg-white mt-1 rounded hidden">

                            <ul class="text-left border none">
                                <li class="px-4 py-1 border-b flex flex-row gap-3"> <img src="../../assets/person.svg" alt="">
                                    Perfil </li>
                                <a href="../../accions/logout.php">
                                    <li class="px-4 py-1 border-b flex flex-row gap-3"><img src="../../assets/cerrar.svg" alt="">
                                        Salir
                                    </li>
                                </a>
                            </ul>
                        </div>
                        <img src="../../assets/linias.svg" alt="icono flecha" width="18px" height="18px">
                    </button>
                </div>
            </nav>
            <section class=" h-screen bg-blue-50">
                <div class="flex  w-full flex-row justify- items-center    ">
                    <div class="flex h-10 w-full  flex-row justify-between items-center">
                        <h1 class="text-xl"> Lista de Permisos</h1>
                        <div>
                            <a href="../admin_db.php" class=" text-blue-500">Home</a>/
                            <span>permisos</span>
                        </div>
                    </div>
                </div>
                <div class="hidden fixed inset-0  justify-center items-center z-50" id="modal">
                    <div class="bg-white p-8 rounded-lg shadow-md w-96">
                        <h2 class="text-2xl font-semibold mb-4">Editar Permisos</h2>
                        <form action="./editar_permisos.php" method="post" class="text" id="permisosForm">
                            <input type="hidden" id="usuario_id" name="usuario_id" value="">
                            <label for="email" class="block mb-2">Email del Usuario:</label>
                            <input type="email" id="email" name="email" class="w-full p-2 border rounded mb-4" value="">

                            <label for="permiso" class="block mb-2">Permiso:</label>
                            <select id="permiso" name="permiso" class="w-full p-2 border rounded mb-4">
                                <option selected value="">Seleciona materia</option>
                                <?php
                                if ($resulrol->num_rows > 0) {
                                    while ($row = $resulrol->fetch_assoc()) {
                                ?>
                                        <option value="<?= $row['id_rol'] ?>"><?= $row['rol'] ?>
                                        </option>
                                <?php
                                    }
                                }
                                ?>
                            </select>

                            <button type="button" id="cerrar" class="bg-gray-400 text-white px-4 py-2 rounded mr-2">Cerrar</button>
                            <button type="submit" id="guardarCambios" class="bg-blue-500 text-white px-4 py-2 rounded">Guardar
                                Cambios</button>
                        </form>
                    </div>
                </div>
                <div class="container mx-auto p-8 bg-white">
                    <h2 class="text-2xl font-semibold mb-4">Informacion de Permisos</h2>
                    <table class="w-full border">
                        <thead>
                            <tr class="bg-gray-300">
                                <th class="py-2 px-4">Email/Usuario</th>
                                <th class="py-2 px-4">Permiso</th>
                                <th class="py-2 px-4">Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="infoUser">

                            <?php
                            if ($resulta->num_rows > 0) {
                                while ($row = $resulta->fetch_assoc()) {
                                    echo '<tr class="bg-white">';
                                    echo "<td class='py-2 px-4 border-r'>" . $row['email'] . "</td>";
                                    echo '<td class="py-2 px-4 border-r">';
                                    if ($row['rol_id'] == 1) {
                                        echo 'Administrador';
                                    } elseif ($row['rol_id'] == 2) {
                                        echo 'Maestro';
                                    } elseif ($row['rol_id'] == 3) {
                                        echo 'Alumno';
                                    } else {
                                        echo 'Rol Desconocido';
                                    }
                                    echo '</td>';

                                    echo '<td class="py-2 px-4 border-r flex flex-row">';
                                    echo '<button class="bg-blue-500 text-white px-2 py-1 rounded editar" onclick="editar(this)" >Editar</button>';
                                    echo '</td>';
                                    echo '</tr>';
                                }
                            } else {
                                echo '<tr class="bg-white">';
                                echo '<td class="py-2 px-4 border-r" colspan="7">No se encontraron usuarios</td>';
                                echo '</tr>';
                            }

                            $mysqli->close();
                            ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>
</body>

</html>