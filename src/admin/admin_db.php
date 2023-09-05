<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user']['rol_id'] != 1) {
    header('Location: ../index.php');
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/dist//output.css">
    <script src="../accions/modal_salir.js" defer></script>
</head>

<body>
    <div class="w-screen h-screen flex">
        <div class="flex h-full bg-blue-900 text-white w-60  py-6 flex-col justify-between">
            <div class="px-6">
                <div class="flex flex-row justify-center items-center width=50px pb-2">
                    <img src="../assets/logo.jpg" alt="Logo" class="mx-auto max-w-full " width="50px" height="50px mb-">
                    <span class="block font-semibold text-gray-300">Universidad</span>
                </div>
                <div class="border-t border-white mb-2 pt-4 text-sm">Administrador</div>
                <div class="border-t border-white pt-4 text-sm ">Menu Administracion</div>
                <div class="mt-6 space-y-2">
                    <a href="./permisos_usuarios/admin_views_permisos.php" class=" flex flex-row justify-center  group">
                        <img src="../assets/permisos.svg" alt="llave" height="32px" width="32px">
                        <p class="px-4"> Permisos </p>
                    </a>
                    <a href="./crud_maestro/admin_views_profe.php" class=" flex flex-row justify-center  group">
                        <img src="../assets/profe.svg" alt="" height="32px" width="32px">
                        <p class=" px-4"> Maestros </p>
                    </a>
                    <a href="./crud_alumno/admin_views_alum.php" class=" flex flex-row justify-center  group">
                        <img src="../assets/alumno.svg" alt="" height="32px" width="32px">
                        <p class="px-4"> Alumnos </p>
                    </a>
                    <a href="./crud_clases/admin_views_clases.php" class=" flex flex-row justify-center group">
                        <img src="../assets/clases.svg" alt="" height="32px" width="32px">
                        <p class="px-4"> Clases </p>
                    </a>
                </div>
            </div>
        </div>
        <div class="flex flex-col w-[calc(100%-15rem)] px-2">
            <nav class="flex h-10 w-full  flex-row justify-between items-center">
                <div class=" flex flex-row justify-items-stretch">
                    <a href="./admin_db.php" class="relative flex flex-row items-center group">
                        <img src="../assets/home.svg" alt="icono menu" width="18px" height="18px px-2">
                        <p class="px-4"> Home </p>
                        <div class="absolute hidden group-focus:block top-full min-w-full w-max bg-white  mt-1 rounded">
                            <ul class="text-left border none">
                                <li class=" px-4 py-1 border-b"><a href="Adm_Das_Per.php"></a> Permisos </li>
                                <li class=" px-4 py-1"> <a href="Adm_Das_Maes.php"></a> Maestro</li>
                                <li class=" px-4 py-1"><a href="Adm_Das_Alum.php"></a> Alumnos</li>
                                <li class=" px-4 py-1"><a href="Adm_Das_Class.php"></a> Clases</li>
                            </ul>
                        </div>
                    </a>
                </div>
                <div class=" flex flex-row justify-between items-center">
                    <button id="buttonToggle" class="relative flex justify-center items-center group">
                        <p class="px-4"> administrador </p>
                        <div id="toggleMenu" class=" absolute top-full min-w-full w-max bg-white mt-1 rounded hidden">

                            <ul class="text-left border none">
                                <li class="px-4 py-1 border-b flex flex-row gap-3"> <img src="../assets/person.svg" alt="">
                                    Perfil </li>
                                <a href="../accions/logout.php">
                                    <li class="px-4 py-1 border-b flex flex-row gap-3"><img src="../assets/cerrar.svg" alt="">
                                        Salir
                                    </li>
                                </a>
                            </ul>
                        </div>
                        <img src="../assets/linias.svg" alt="icono flecha" width="18px" height="18px">
                    </button>
                </div>
            </nav>
            <section class=" h-screen bg-blue-50">
                <div class="flex  w-full flex-row justify- items-center    ">
                    <div class="flex h-10 w-full  flex-row justify-between items-center">
                        <h1 class="text-xl"> Dashboard</h1>
                        <div>
                            <a href="#" class="bg-blue">Home</a>/
                            <span>Dashboard</span>
                        </div>
                    </div>
                </div>
                <div class="w-1/2 items-start">
                    <div class="w-120 h-20 bg-white border border-gray-300 shadow-md flex flex-col justify-center items-start text-sm p-4">
                        <p>Bienvenido!<br> Selecciona la acción que quieras realizar en las pestañas del menú de la
                            izquierda</p>
                    </div>
                </div>
            </section>
        </div>
    </div>

</body>

</html>