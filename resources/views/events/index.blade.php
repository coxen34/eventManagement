@extends('layouts.plantilla')

@section('title','events index')

@section('content')

<h2 class="text-4xl font-bold text-center mb-32">Eventos por categoría</h2>
<ul class=" mx-auto space-y-4 max-w-md">
    <li>
        <a href="{{ route('events.showEventsCategory', 'Art and Culture') }}"
           class=" block px-4 py-2  hover:bg-gray-100  rounded text-center font-bold">{{ 'Arte y Cultura' }}</a>
    </li>
    <li>
        <a href="{{ route('events.showEventsCategory', 'Sports') }}"
           class="block px-4 py-2  hover:bg-gray-100 rounded text-center font-bold">{{ 'Deportes' }}</a>
    </li>
    <li>
        <a href="{{ route('events.showEventsCategory', 'Concerts') }}"
           class="block px-4 py-2  hover:bg-gray-100 rounded text-center font-bold">{{ 'Conciertos' }}</a>
    </li>
    <li>
        <a href="{{ route('events.showEventsCategory', 'Gastronomy') }}"
           class="block px-4 py-2  hover:bg-gray-100 rounded text-center font-bold">{{ 'Gastronomía' }}</a>
    </li>
    <li>
        <a href="{{ route('events.showEventsCategory', 'Beauty-Fashion') }}"
           class="block px-4 py-2  hover:bg-gray-100 rounded text-center font-bold">{{ 'Belleza&Moda' }}</a>
    </li>
    <li>
        <a href="{{ route('events.showEventsCategory', 'Family-Friendly') }}"
           class="block px-4 py-2  hover:bg-gray-100 rounded text-center font-bold">{{ 'Familiar' }}</a>
    </li>
</ul>

<div class="flex items-center justify-center mt-40">
    <button class="text-white font-bold py-6 px-16 rounded mr-4" style="background-color:#708356">
        Botón 1
    </button>
    <button class="bg-transparent text-transparent py-6 rounded mr-4" style="width:60px;">
        Botón transparente
    </button>
    <button class=" text-white font-bold py-6 px-16 rounded" style="background-color:#708356;">
        Botón 2
    </button>
</div>








@endsection