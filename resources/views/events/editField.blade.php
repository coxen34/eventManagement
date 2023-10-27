@extends('layouts.plantilla')

@section('title', 'Editar Campo del Evento')

@section('content')

    <h1>Editar Campo del Evento</h1>
    @if (session('error'))
        <div>
            {{ session('error') }}
        </div>
    @endif

    <form method="post" action="{{ route('events.updateField', ['eventId' => $event->id]) }}">
        @csrf
        @method('PUT')

        <input type="text" name="title" value="{{ $event->title }}">
        <input type="date" name="event_date" value="{{ $event->event_date }}">
        <input type="time" name="start_time" value="{{ $event->start_time }}">
        {{-- <input type="time" name="end_time" value="{{ $event->end_time }}"> --}}
        <input type="text" name="street" value="{{ $event->street }}">
        <input type="text" name="zipcode" value="{{ $event->zipcode }}">
        <input type="text" name="locality" value="{{ $event->locality }}">
        <input type="text" name="country" value="{{ $event->country }}">
        <textarea name="description">{{ $event->description }}</textarea>
        <select name="category">
            <option value="Art and Culture" {{ $event->category === 'Art and Culture' ? 'selected' : '' }}>Art and Culture
            </option>
            <option value="Sports" {{ $event->category === 'Sports' ? 'selected' : '' }}>Sports</option>
            <option value="Concerts" {{ $event->category === 'Concerts' ? 'selected' : '' }}>Conciertos</option>
            <option value="Gastronomy" {{ $event->category === 'Gastronomy' ? 'selected' : '' }}>Gastronomía</option>
            <option value="Beauty-Fashion" {{ $event->category === 'Beauty-Fashion' ? 'selected' : '' }}>Belleza y moda
            </option>
            <option value="Health-Wellness" {{ $event->category === 'Health-Wellness' ? 'selected' : '' }}>Salud y
                Bienestar</option>
            <option value="Family-Friendly" {{ $event->category === 'Family-Friendly' ? 'selected' : '' }}>Familiar
            </option>
        </select>
        <input type="number" name="price" value="{{ $event->price }}">
        <input type="number" name="max_capacity" value="{{ $event->max_capacity }}">
        <button type="submit">Guardar cambios</button>
    </form>
   
    <h2>Agregar Organizadores:</h2>
    <form method="post" action="{{ route('events.addOrganizer', ['eventId' => $event->id]) }}">
        @csrf
        <select name="organizerId">
            @foreach ($availableOrganizers as $organizer)
                <option value="{{ $organizer->id }}"> {{ $organizer->name }}</option>
            @endforeach
        </select>
        <button type="submit">Agregar Organizador</button>
    </form>
    
@foreach (['success', 'error2'] as $messageType)
    @if (session($messageType))
        <div class="alert alert-{{ $messageType }}">
            {{ session($messageType) }}
        </div>
    @endif
@endforeach

    <h2>Organizadores:</h2>
    <ul>
        @foreach ($event->organizations as $organization)
            <li>{{ $organization->name }}
                <a href="{{ route('events.removeOrganizer', ['eventId' => $event->id, 'organizerId' => $organization->id]) }}"
                    class="btn btn-danger">Eliminar</a>
            </li>
        @endforeach
    </ul>

    </div>
    @endsection
