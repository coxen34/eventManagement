@extends('layouts.plantilla')

@section('title', 'events index')

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
    <br><br><br>
    <div class="flex justify-center ">
        <form method="GET" action="/">
            @csrf
            <button type="submit"
                class="bg-lime-700 text-white font-bold py-2 px-16 mr-6 rounded hover:bg-lime-600 "style="width: 200px;">Volver
                a Inicio</button>
        </form>
    </div>


@endsection
