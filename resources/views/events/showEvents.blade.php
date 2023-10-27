@extends('layouts.plantilla')

@section('title', 'allEvents')

@section('content')

    <h2>Todos los Eventos</h2>
    @if (session('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif

    <form method="get" action="{{ route('events.filter') }}" class="mb-4">
        <label for="order" class="font-bold">Ordenar por:</label>
        <select name="order" id="order" class="border rounded-md py-2 px-3">
            <option value="title">Título</option>
            <option value="event_date">Fecha</option>
            <option value="locality">Localidad</option>
            <option value="price">Precio</option>
            <option value="max_capacity">Aforo</option>

        </select>

        <label for="category" class="font-bold">Categoría:</label>
        

        <select name="category" id="category">
            <option value="">Todas las Categorías</option>
            <option value="Art and Culture">Arte y Cultura</option>
            <option value="Sports">Deportes</option>
            <option value="Concerts">Conciertos</option>
            <option value="Gastronomy">Gastronomía</option>
            <option value="Beauty-Fashion">Belleza y Moda</option>
            <option value="Health-Wellness">Salud y Bienestar</option>
            <option value="Family-Friendly">Familiar</option>

        </select>



        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md">Aplicar
            Filtros</button>
    </form>



    <ul>
        @foreach ($events as $event)
            <li class="border p-4 mb-4 flex justify-between items-center">
                <div>
                    <strong>Evento:</strong> {{ $event->title }}<br>
                    <strong>Fecha:</strong> {{ date('d-m-Y', strtotime($event->event_date)) }}<br>
                    <strong>Localidad:</strong> {{ $event->locality }}<br>
                    <strong>Precio:</strong> {{ $event->price }}<br>
                    <strong>Aforo:</strong> {{ $event->max_capacity }}<br>
                    <strong>Categoría:</strong> {{ $categoryTranslations[$event->category] ?? $event->category }}

                    <br>

                </div>
                <div>
                    <a href="{{ route('events.editField', ['eventId' => $event->id, 'field' => 'title']) }}"
                        class="text-blue-500">Editar</a>
                    <form method="POST" action="{{ route('events.destroy', ['eventId' => $event->id]) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-event text-red-500">Eliminar</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>


    <br><br><br><br><br><br><br><br>

    {{ $events->links() }}



    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.delete-event');

            deleteButtons.forEach((button) => {
                button.addEventListener('click', function(e) {
                    if (!confirm('¿Estás seguro de que deseas eliminar el evento?')) {
                        e
                            .preventDefault(); // Cancela la acción de eliminación si el usuario cancela la confirmación.
                    }
                });
            });
        });
    </script>
@endsection
