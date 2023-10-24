@extends('layouts.plantilla')

@section('title', 'events create')

@section('content')

    <h1>En esta página podrás crear un evento</h1>
    
    <div class="container">

        <form action="{{ route('events.store') }}"method='POST'>
            @csrf

            <div>
                <label for="title">Título del Evento:</label>
                <input type="text" name="title"  required>
            </div>

            <div >
                <label for="event_date">Fecha del Evento:</label>
                {{-- <input type="date" name="event_date"  required> --}}
                <input type="date" id="fecha" name="event_date" min="{{ date('Y-m-d') }}" >

            </div>

            <div class="form-group">
                <label for="start_time">Hora de Inicio:</label>
                <input type="time" name="start_time"  required>
            </div>

            {{-- <div>
                <label for="end_time">Hora de Finalización:</label>
                <input type="time" name="end_time"  required>
            </div> --}}

            <div>
                <label for="street">Calle:</label>
                <input type="text" name="street"  required>
            </div>

            <div>
                <label for="zipcode">Código Postal:</label>
                <input type="text" name="zipcode"  required>
            </div>

            <div>
                <label for="locality">Localidad:</label>
                <input type="text" name="locality"  required>
            </div>

            <div>
                <label for="country">País:</label>
                <input type="text" name="country"  required>
            </div>

            <div>
                <label for="description">Descripción:</label>
                <textarea name="description"  rows="3" required></textarea>
            </div>

            <div class="form-group">
                <label for="category">Categoría:</label>
                <select name="category"  required>
                    <option value="Art and Culture">Arte y Cultura</option>
                    <option value="Sports">Deportes</option>
                    <option value="Concerts">Conciertos</option>
                    <option value="Gastronomy">Gastronomía</option>
                    <option value="Beauty-Fashion">Belleza y Moda</option>
                    <option value="Health-Wellness">Salud y Bienestar</option>
                    <option value="Family-Friendly">Familiar</option>
                </select>
            </div>

            <div >
                <label>Organizadores:</label>
                @foreach ($organizations as $organizer)
                    <div >
                        <label >{{ $organizer->name }}</label>
                        <input type="checkbox" name="organizations[]" value="{{ $organizer->id }}"  >
                        
                    </div>
                @endforeach
            </div>
            
            <div>
                <label for="price">Precio:</label>
                <input type="number" min=1 name="price"  required>
            </div>

            <div>
                <label for="max_capacity">Capacidad Máxima:</label>
                <input type="number" min=1 name="max_capacity"  required>
            </div>

            <button type="submit">Crear Evento</button>
        </form>
    </div>

@endsection
