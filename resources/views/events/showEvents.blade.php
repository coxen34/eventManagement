@extends('layouts.plantilla')

@section('title', 'allEvents')

@section('content')

    <div class="flex justify-center">
        <h2
            class="font-bold text-lg bg-black text-black p-1 w-1/2 text-center rounded"style="background-color: rgba(251, 251, 239, 0.6);">
            Todos los Eventos</h2>
    </div>
    <br>
    @if (session('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif
    <div class="flex justify-center ">
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



            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold  rounded-md ">Aplicar
                Filtros</button>
        </form>
    </div>


    <div class="space-y-4 max-height-400px-overflow-auto">
        @foreach ($events->chunk(4) as $eventRow)
            <ul class="flex flex-wrap justify-between -my-4">
                @foreach ($eventRow as $event)
                    <li
                        class="border p-4 mb-4 w-64 min-h-[12rem] flex flex-col justify-between "style="background-color: rgba(251, 251, 239, 0.6);">
                        <div>
                            <strong>Evento:</strong> {{ $event->title }}<br>
                            <strong>Fecha:</strong> {{ date('d-m-Y', strtotime($event->event_date)) }}<br>
                            <strong>Localidad:</strong> {{ $event->locality }}<br>
                            <strong>Precio:</strong> {{ $event->price }}<br>
                            <strong>Aforo:</strong> {{ $event->max_capacity }}<br>
                            <strong>Categoría:</strong> {{ $categoryTranslations[$event->category] ?? $event->category }}
                        </div>
                        <br>
                        <div class="flex space-x-24">
                            <a href="{{ route('events.editField', ['eventId' => $event->id, 'field' => 'title']) }}"
                                class="font-bold text-blue-500 bg-blue-100 hover:bg-blue-200 rounded">Editar</a>
                            <form method="POST" action="{{ route('events.destroy', ['eventId' => $event->id]) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="delete-event font-bold text-red-500 bg-red-100 hover:bg-red-200 rounded">Eliminar</button>
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>
        @endforeach
    </div>

    <hr>
    <div class="ml-5 mr-5 ">
        {{ $events->links() }}
    </div>
    <div class="flex justify-center ">
        <form method="GET" action="/">
            @csrf
            <button type="submit"
                class="bg-lime-700 text-white font-bold py-2 px-16 mr-6 rounded hover:bg-lime-600 "style="width: 200px;">Volver
                a Inicio</button>
        </form>
    </div>
@endsection
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



