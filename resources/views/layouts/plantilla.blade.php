<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/35a2d9730b.js" crossorigin="anonymous"></script>
    <link rel="icon" href={{ asset('img/silueta.png') }} sizes="128x128" type="image/png">

    <title>@yield('title')</title>

</head>

<body class="w-full h-16 ">
    <header class="bg-stone-950 py-4">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-white text-lg font-semibold ml-4">EventManagement</h1>
            </div>
            <div>
                <button
                    class="text-white group-hover:bg-blue-500 group-hover:bg-opacity-25 px-4 py-2 rounded focus:outline-none">
                    <i class="fa-solid fa-bars fa-2x"></i>
                </button>
                <ul
                    class="hidden absolute right-0 mt-2 bg-white border border-gray-200 rounded-lg shadow-lg text-gray-800 group-hover:block">
                    <li class="py-2 px-4 hover:bg-gray-200">Opción 1</li>
                    <li class="py-2 px-4 hover:bg-gray-200">Opción 2</li>
                    <li class="py-2 px-4 hover:bg-gray-200">Opción 3</li>
                </ul>
            </div>
        </div>
    </header>

    <main
        class="bg-opacity-50 h-screen"style="background-image: url('{{ asset('img/agenda.jpg') }}'); background-size: cover; background-repeat: no-repeat; background-position: center;">
        <div class="overflow-hidden">
            @yield('content')
        </div>
    </main>

    <footer class="bg-stone-950 py-4">
        <div class="container mx-auto flex flex-col justify-center items-center text-center">
            <ul class="flex space-x-4">
                <li><a href="#" class="hover:text-blue-500"><i class="fa-brands fa-facebook text-white"></i></a>
                </li>
                <li><a href="#" class="hover:text-blue-500"><i class="fa-brands fa-instagram text-white"></i></a>
                </li>
                <li><a href="#" class="hover:text-blue-500"><i class="fa-brands fa-whatsapp text-white"></i></a>
                </li>
                <li><a href="#" class="hover:text-blue-500"><i class="fa-regular fa-envelope text-white"></i></a>
                </li>
            </ul>
            <p class="text-sm text-white mt-4">&copy; Laravel | 2023 </p>
        </div>
    </footer>

</body>

</html>
