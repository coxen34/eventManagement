
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
            <button type="submit" class="btn btn-danger delete-event">Eliminar</button>
        </form>
    @endforeach
</ul>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const deleteButtons = document.querySelectorAll('.delete-event');
    
            deleteButtons.forEach((button) => {
                button.addEventListener('click', function (e) {
                    if (!confirm('¿Estás seguro de que deseas eliminar el evento?')) {
                        e.preventDefault(); // Cancela la acción de eliminación si el usuario cancela la confirmación.
                    }
                });
            });
        });
    </script>
    
    
    
    
    
    
    
@endsection
