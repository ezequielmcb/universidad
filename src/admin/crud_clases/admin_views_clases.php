<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user']['rol_id'] != 1) {
    header('Location: login.php');
    exit();
}

include('../../accions/connection.php');

$userquery = "SELECT * FROM usuarios WHERE rol_id = 2";
$resultUser = $mysqli->query($userquery);

if ($resultUser->num_rows > 0) {
    $usuarios = array();

    while ($row = $resultUser->fetch_assoc()) {
        $usuarios[] = $row;
    }
} else {
    echo 'No se encontraron usuarios con ese rol.';
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/dist//output.css">
    <script src="../../accions/modal_clases.js" defer></script>
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
                    <a href="../permisos_usuarios/admin_views_permisos.php" class=" flex flex-row justify-center  group">
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
                    </a>
                    <a href="./admin_views_clases.php" class=" flex flex-row justify-center group">
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
                        <h1 class="text-xl"> Lista de Clases </h1>
                        <div>
                            <a href="../admin_db.php" class=" text-blue-500">Home</a>/
                            <span>Maestro</span>
                        </div>
                    </div>
                </div>
                <div class="max-w-4xl mx-auto p-8 bg-white rounded shadow-lg mt-8">
                    <div class="flex justify-between mb-4">
                        <h3 class="text-2xl font-semibold">Información de Clases</h3>
                        <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 cursor-pointer" id="modalToggle">
                            Agregar Clase
                        </button>
                    </div>
                    <div id="modal" class="hidden fixed top-0 left-0 w-full h-full flex justify-center items-center bg-opacity-50 bg-black">
                        <div class="bg-white p-8 rounded shadow-lg w-1/2">
                            <h2 class="text-2xl font-semibold mb-4">Agregar Clase</h2>
                            <form action="./agregar_clases.php" method="POST">
                                <div class="mb-2">
                                    <label for="materia" class="block font-medium">Nombre de la Materia</label>
                                    <input type="text" id="materia" name="materia" class="w-full border px-3 py-2 rounded focus:outline-none focus:ring focus:border-blue-300">
                                </div>
                                <div class="mb-2">
                                    <label for="profesor" class="block font-medium">Maestro Disponible para la
                                        clase</label>
                                    <select id="profesor" name="profesor" class="w-full border px-3 py-2 rounded focus:outline-none focus:ring focus:border-blue-300">
                                        <?php
                                        foreach ($usuarios as $usuario) {
                                            echo '<option value="' . $usuario['id_user'] . '">' . $usuario['nombre'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="flex justify-end gap-2 mt-6">
                                    <button type="button" class="bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-500" id="closeModal">Cerrar</button>
                                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600" id="createBtn">Crear</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <table class="w-full border-collapse border">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="py-2 px-4 border-r">#</th>
                                <th class="py-2 px-4 border-r">Materia</th>
                                <th class="py-2 px-4 border-r">Maestro</th>
                                <th class="py-2 px-4 border-r">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $query  = "SELECT m.id_materia, m.materia, u.nombre
                            FROM materias AS m
                            INNER JOIN profesor_materias AS pm ON m.id_materia = pm.id_profemate
                            INNER JOIN usuarios AS u ON pm.id_profesor = u.id_user
                            WHERE u.rol_id = 2;";
                            $result = $mysqli->query($query);

                            while ($row = $result->fetch_assoc()) {
                                echo "<tr class='bg-white'>";
                                echo "<td class='py-2 px-4 border-r'>" . $row['id_materia'] . "</td>";
                                echo "<td class='py-2 px-4 border-r'>" . $row['materia'] . "</td>";
                                echo "<td class='py-2 px-4 border-r'>" . $row['nombre'] . "</td>";

                                echo "<td class='py-2 px-4 border-r flex flex-row'>";
                                echo "<button class='text-blue-500 hover:underline' id='modalUpdateToggle'
                                        onclick='openUpdateModal(this)'>Editar</button>";
                                echo "<button class='text-red-500 hover:underline ml-2'>Eliminar</button>";
                                echo "</td>";
                                echo " </tr>";
                            }
                            $result->free();
                            ?>
                        </tbody>
                    </table>
                    <div id="updateModal" class="hidden fixed top-0 left-0 w-full h-full flex justify-center items-center bg-opacity-50 bg-black">
                        <div class="bg-white p-8 rounded shadow-lg w-1/2">
                            <h2 class="text-2xl font-semibold mb-4">Actualizar Clase</h2>
                            <form action="./editar_clases.php" method="POST">
                                <input type="hidden" id="updateId" name="updateId">
                                <div class="mb-2">
                                    <label for="newMateria" class="block font-medium">Nombre de la Clase:</label>
                                    <input type="text" id="newMateria" name="newMateria" class="w-full border px-3 py-2 rounded focus:outline-none focus:ring focus:border-blue-300">
                                </div>
                                <div class="mb-2">
                                    <label for="newProfe" class="block font-medium">Maestro
                                        Asignado:</label>
                                    <select id="newProfe" name="newProfe" class="w-full border px-3 py-2 rounded focus:outline-none focus:ring focus:border-blue-300">
                                        <?php
                                        foreach ($usuarios as $usuario) {
                                            echo '<option value="' . $usuario['id_user'] . '">' . $usuario['nombre'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="flex justify-end gap-2 mt-6">
                                    <button type="button" class="bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-500" id="closeUpdateModal">Cerrar</button>
                                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600" id="updateBtn">Actualizar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</body>

</html>