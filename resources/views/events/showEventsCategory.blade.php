@extends('layouts.plantilla')

@section('title', 'Eventos de la categoría: ' . $category)

@section('content')
    <h1>Eventos de la categoría: {{ $category }}</h1>

    <ul>
        @foreach ($events as $event)
            <li>{{ $event->title }}</li>
        @endforeach
    </ul>
@endsection

