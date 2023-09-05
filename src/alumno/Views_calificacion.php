<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/dist//output.css">
</head>

<body>
    <div class="w-screen h-screen flex">
        <div class="flex h-full bg-blue-900 text-white w-60  py-6 flex-col justify-between">
            <div class="px-6">
                <div class="flex flex-row justify-center items-center width=50px pb-2">
                    <img src="../assets/logo.jpg" alt="Logo" class="mx-auto max-w-full" width="50px" height="50px mb-">
                    <span class="block font-semibold text-gray-300">Universidad</span>
                </div>
                <div class="border-t border-white mb-2 pt-4 text-sm">Alumno <br> <span> Nombre</span></div>
                <div class="border-t border-white pt-4 text-sm ">Menu Alumno</div>
                <div class="mt-6 space-y-2">
                    <div class="  ">
                        <ul class="">
                            <li><a href="./Alumno_views.php"> Perfil </a></li>
                            <li> Administra tus Clases </li>
                        </ul>
                    </div>
                    </button>
                </div>
            </div>
        </div>
        <div class="flex flex-col w-[calc(100%-15rem)] px-2">
            <nav class="flex h-10 w-full  flex-row justify-between items-center">
                <div class=" flex flex-row justify-items-stretch">
                    <a href="./Alumno_views.php" class="relative  flex flex-row items-center group">
                        <img src="../assets/home.svg" alt="icono menu" width="18px" height="18px px-2">
                        <p class="px-4"> Home </p>
                    </a>
                </div>
                <div class=" flex flex-row justify-between items-center">
                    <button class="relative flex justify-center items-center group">
                        <p class="px-4"> Alumno Name </p>
                        <div class="absolute hidden group-focus:block top-full min-w-full w-max bg-white mt-1 rounded">
                            <ul class="text-left border none">
                                <li class="px-4 py-1 border-b flex flex-row gap-3"> <img src="../assets/person.svg" alt="">Perfil </li>
                                <li class="px-4 py-1 border-b flex flex-row gap-3"> <img src="../assets/cerrar.svg" alt="">>Salir </li>
                            </ul>
                        </div>
                        <img src="../assets/linias.svg" alt="icono flecha" width="16px" height="16px">
                    </button>
                </div>
            </nav>
            <section class=" h-screen bg-blue-50">
                <div class="flex  w-full flex-row justify- items-center    ">
                    <div class="flex h-10 w-full  flex-row justify-between items-center">
                        <h1 class="text-xl"> Esquema de Clases </h1>
                        <div>
                            <a href="AlumDashboard.php" class="bg-blue">Home</a>/
                            <span>Alumnos</span>
                        </div>
                    </div>
                </div>
                <div class="flex p-4 gap-2 flex-row justify-between">
                    <div class="w-1/2 ">
                        <h2 class="text-lg font-bold mb-2">Tus Materias Inscritas</h2>
                        <div class="shadow-md rounded-lg overflow-hidden">
                            <table class="w-full table-auto">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th class="py-2 px-3 text-center">#</th>
                                        <th class="py-2 px-3 text-center">Materia</th>
                                        <th class="py-2 px-3 text-center">Calificacion</th>
                                        <th class="py-2 px-3 text-center">Mensaje del maestro</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    include('../accions/connection.php');

                                    $query  = "SELECT m.id_materia, m.materia, am.calificacion, am.mensajes
                                    FROM materias AS m
                                    JOIN alumnos_materias AS am ON m.id_materia = am.id_alumate
                                    JOIN usuarios AS u ON am.id_alumno = u.id_user
                                    WHERE u.rol_id = 3";

                                    $result = $mysqli->query($query);

                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr class='bg-white'>";
                                        echo "<td class='py-2 px-4 border-r'>" . $row['id_materia'] . "</td>";
                                        echo "<td class='py-2 px-4 border-r'>" . $row['materia'] . "</td>";
                                        echo "<td class='py-2 px-4 border-r'>" . $row['calificacion'] . "</td>";
                                        echo "<td class='py-2 px-4 border-r'>" . $row['mensajes'] . "</td>";
                                        echo "</td>";
                                        echo "</tr>";
                                    }

                                    $result->free();
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="w-1/4 pl-4">
                        <h2 class="text-lg font-bold mb-2">Estas son tus materias y tus calificaciones</h2>
                    </div>
                </div>
            </section>
        </div>
    </div>
</body>
</html>