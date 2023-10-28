@extends('layouts.plantilla')

@section('title', 'Editar Campo del Evento')

@section('content')
    <section class="max-w-screen-xl mx-auto p-4">
        <div style="background-color: rgba(251, 251, 239, 0.3);border-radius: 3%;">
            <h1 class="font-bold text-lg bg-white">Editar Campo del Evento</h1>
            @if (session('error'))
                <div>
                    {{ session('error') }}
                </div>
            @endif

            <form method="post" action="{{ route('events.updateField', ['eventId' => $event->id]) }}"class="space-y-4">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-5 gap-4">

                    <div class="mb-4">
                        <label for="title"class="block text-sm font-semibold">Titulo</label>
                        <input type="text" name="title" value="{{ $event->title }}"class="w-full p-2 border rounded">
                    </div>
                    <div>
                        <label for="event_date"class="block text-sm font-semibold">Fecha</label>
                        <input type="date" name="event_date"
                            value="{{ $event->event_date }}"class="w-full p-2 border rounded">
                    </div>
                    <div>
                        <label for="start_time"class="block text-sm font-semibold">Hora</label>
                        <input type="time" name="start_time"
                            value="{{ $event->start_time }}"class="w-full p-2 border rounded">
                    </div>
                    {{-- <input type="time" name="end_time" value="{{ $event->end_time }}"> --}}
                    <div>
                        <label for="max_capacity"class="block text-sm font-semibold">Aforo</label>
                        <input type="number" name="max_capacity"
                            value="{{ $event->max_capacity }}"class="w-full p-2 border rounded">
                    </div>
                    <div>
                        <label for="price"class="block text-sm font-semibold">Precio</label>
                        <input type="number" name="price" value="{{ $event->price }}"class="w-full p-2 border rounded">
                    </div>
                    <div>
                        <label for="street"class="block text-sm font-semibold">Calle</label>
                        <input type="text" name="street" value="{{ $event->street }}"class="w-full p-2 border rounded">
                    </div>
                    <div>
                        <label for="zipcode"class="block text-sm font-semibold">C.P.</label>
                        <input type="text" name="zipcode" value="{{ $event->zipcode }}"class="w-full p-2 border rounded">
                    </div>
                    <div>
                        <label for="locality"class="block text-sm font-semibold">Localidad</label>
                        <input type="text" name="locality"
                            value="{{ $event->locality }}"class="w-full p-2 border rounded">
                    </div>
                    <div>
                        <label for="country"class="block text-sm font-semibold">Pais</label>
                        <input type="text" name="country"
                            value="{{ $event->country }}"class="w-full p-2 border rounded">
                    </div>
                </div>
                <div class="flex space-x-4 mt-4">
                    <div class="w-1/2">
                        <label for="description" class="block text-sm font-semibold">Descripción</label>
                        <textarea name="description" class="w-full p-2 border rounded">{{ $event->description }}</textarea>
                    </div>
                    <div class="w-1/2">
                        <label for="category" class="block text-sm font-semibold">Categoría</label>
                        <select name="category" class="w-full p-2 border rounded">
                            <option value="Art and Culture" {{ $event->category === 'Art and Culture' ? 'selected' : '' }}>
                                Art
                                and
                                Culture</option>
                            <option value="Sports" {{ $event->category === 'Sports' ? 'selected' : '' }}>Sports</option>
                            <option value="Concerts" {{ $event->category === 'Concerts' ? 'selected' : '' }}>Conciertos
                            </option>
                            <option value="Gastronomy" {{ $event->category === 'Gastronomy' ? 'selected' : '' }}>
                                Gastronomía
                            </option>
                            <option value="Beauty-Fashion" {{ $event->category === 'Beauty-Fashion' ? 'selected' : '' }}>
                                Belleza y
                                moda</option>
                            <option value="Health-Wellness" {{ $event->category === 'Health-Wellness' ? 'selected' : '' }}>
                                Salud y
                                Bienestar</option>
                            <option value="Family-Friendly" {{ $event->category === 'Family-Friendly' ? 'selected' : '' }}>
                                Familiar
                            </option>
                        </select>
                    </div>
                </div>
                <button
                    type="submit"class="bg-lime-700 text-white font-semibold py-2 px-4 rounded hover:bg-lime-600">Guardar
                    cambios</button>
            </form>
            <h2 class="text-lg font-semibold mt-8">Agregar Organizadores:</h2>
            <form method="post" action="{{ route('events.addOrganizer', ['eventId' => $event->id]) }}"class="space-y-4">
                @csrf
                <div>
                    <label class="block text-sm font-semibold" for="organizerId">Selecciona un organizador</label>
                    <select name="organizerId">
                        @foreach ($availableOrganizers as $organizer)
                            <option value="{{ $organizer->id }}"> {{ $organizer->name }}</option>
                        @endforeach
                    </select>
                </div>
                <br>
                <button
                    type="submit"class="bg-lime-700 text-white font-semibold py-2 px-4 rounded hover:bg-lime-600">Agregar
                    Organizador</button>
            </form>
        </div>


        @foreach (['success', 'error2'] as $messageType)
            @if (session($messageType))
                <div class="alert alert-{{ $messageType }}">
                    {{ session($messageType) }}
                </div>
            @endif
        @endforeach

        <form method="post" id="removeOrganizerForm" action=""
            class="space-y-4"style="background-color: rgba(252, 237, 234, 0.6);border-radius: 3%;">
            @csrf

            <h2 class="text-lg font-semibold mt-8">Organizadores del evento:</h2>
            <ul>
                @php $organizations = $event->organizations; @endphp
                @for ($i = 0; $i < count($organizations); $i += 2)
                    <li class="flex justify-between space-y-2">
                        <div class="flex items-center  ml-6 mr-4">
                            <label class="flex items-center">
                                <input type="checkbox" name="selectedOrganizers[]" value="{{ $organizations[$i]->id }}"
                                    class="align-middle mr-2">
                                <span>{{ $organizations[$i]->name }}</span>
                            </label>
                        </div>
                        @if ($i + 1 < count($organizations))
                            <div class="flex items-center  ml-4 mr-6">
                                <label class="flex items-center">
                                    <input type="checkbox" name="selectedOrganizers[]"
                                        value="{{ $organizations[$i + 1]->id }}" class="align-middle mr-2">
                                    <span>{{ $organizations[$i + 1]->name }}</span>
                                </label>
                            </div>
                        @endif
                    </li>
                @endfor
            </ul>

            <button type="button" onclick="constructActionUrl()"
                class="bg-red-500 text-white font-semibold py-2 px-4 rounded hover:bg-red-600 mt-2">Quitar del
                evento</button>
        </form>

        <script>
            function constructActionUrl() {
                const selectedOrganizers = Array.from(document.querySelectorAll('input[name="selectedOrganizers[]"]:checked'))
                    .map(input => input.value);

                if (selectedOrganizers.length > 0) {
                    const eventId = '{{ $event->id }}';
                    const organizerIds = selectedOrganizers.join(',');
                    const actionUrl =
                        `{{ route('events.removeOrganizer', ['eventId' => ':eventId', 'organizerId' => ':organizerId']) }}`
                        .replace(':eventId', eventId)
                        .replace(':organizerId', organizerIds);

                    document.getElementById('removeOrganizerForm').action = actionUrl;
                    document.getElementById('removeOrganizerForm').submit();
                }
            }
        </script>
    </section>
@endsection
