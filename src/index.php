<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../dist/output.css">
    <script src="https://kit.fontawesome.com/302e5dde8e.js" crossorigin="anonymous"></script>
    <title>Login</title>
</head>
<body class="flex items-center justify-center  flex-col h-screen bg-amber-100">
    <div class="w-40 h-40 mb-5">
        <img src="./assets/logo.jpg" alt="logo">
    </div>
    <div class="bg-white p-5 rounded-none shadow-md h-70 w-80">
        <h2 class="text-x font-semibold-[#BDBDBD] mb-4 flex justify-center ">Bienvenido ingresa con tu cuenta
        </h2>
        <form method="post" action="./accions/login_db.php">
            <div class="flex items-center gap-3 px-3 h-10 max-w-[360px] border rounded-md border-[#BDBDBD] mb-4">
                <input type="text" name="email" id="email" placeholder="Email" class="h-9 w-full outline-none">
                <i class="fa-solid fa-envelope text-gray-400"></i>
            </div>
            <div class="flex items-center gap-3 px-3 h-10 max-w-[360px] border rounded-md border-[#BDBDBD] mb-4">
                <input type="password" name="pass" id="pass" placeholder="Password" class="h-9 w-full outline-none">
                <i class="fa-solid fa-lock text-gray-400"></i>
            </div>
            <div class="flex justify-center">
                <button type="submit" class="w-1/3 bg-blue-500 text-white rounded-md py-1 px-2 focus:outline-none hover:bg-indigo-700 ">
                    Ingresar
                </button>
            </div>
        </form>
    </div>
    </div>

</body>

</html>