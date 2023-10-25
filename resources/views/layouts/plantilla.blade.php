<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>@yield('title')</title>
    <!-- favicon -->
    <!-- styles -->
</head>
{{-- <body class="w-full h-64"style="background-image: url('{{ asset('img/success.jpg') }}'); background-size: cover; background-repeat: no-repeat; background-position: center;"> --}}

<body class="w-full h-64">
    <header class="bg-gray-300 py-4"></header>
    <!-- header -->
    <!-- nav -->
    <div class="bg-opacity-50 min-h-screen">
        @yield('content')
    </div>
    <footer class="bg-gray-300 py-4"></footer>
    <!-- script -->
</body>


</html>
