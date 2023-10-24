
@extends('layouts.plantilla')

@section('title', 'allEvents')

@section('content')

    <h2>Todos los Eventos</h2>
    @if(session('success'))
    <div >
        {{ session('success') }}
    </div>
@endif

    <ul>
        @foreach ($events as $event)
            <li>{{ $event->title }}</li>
            <a href="{{ route('events.editField', ['eventId' => $event->id, 'field' => 'title']) }}">Editar</a>
            <form method="POST" action="{{ route('events.destroy', ['eventId' => $event->id])}}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Eliminar</button>
            </form>
        @endforeach
    </ul>
@endsection
