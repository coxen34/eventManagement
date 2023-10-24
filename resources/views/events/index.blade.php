@extends('layouts.plantilla')

@section('title','events index')

@section('content')
<h1>Bienvenid@ a la pagina Eventos</h1>
<h2>Categorías</h2>
<ul>
    <li><a href="{{ route('events.showEventsCategory', 'Art and Culture') }}">Arte y Cultura</a></li>
    <li><a href="{{ route('events.showEventsCategory', 'Sports') }}">Deportes</a></li>
    <li><a href="{{ route('events.showEventsCategory', 'Concerts') }}">Conciertos</a></li>
    <li><a href="{{ route('events.showEventsCategory', 'Gastronomy') }}">Gastronomía</a></li>
    <li><a href="{{ route('events.showEventsCategory', 'Beauty-Fashion') }}">Belleza&Moda</a></li>
    <li><a href="{{ route('events.showEventsCategory', 'Family-Friendly') }}">Familiar</a></li>

    
    
</ul>


@endsection