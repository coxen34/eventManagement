@extends('layouts.plantilla')

@section('title', 'events create')

@section('content')



    <div class="container mx-auto ">


        <form action="{{ route('events.store') }}"method='POST' class="my-5 p-5 bg-white rounded-lg shadow-md"
            style="overflow-y: auto;">
            @csrf

            <fieldset>
                <legend>
                    <h1 class="text-4xl font-bold text-center  mb-10"> Crea un evento</h1>
                </legend>


                <div class="mb-4 flex">
                    <div class="w-1/2 pr-2">
                        <label for="title" class="block text-gray-700 font-bold mb-2">Título del Evento:</label>
                        <input type="text" name="title" class="w-full border rounded-md py-2 px-3" required>
                    </div>

                    <div class="w-1/2 pl-2">
                        <label for="description"class="font-bold mb-2">Descripción:</label>
                        <textarea name="description" rows="3" class="w-full border rounded-md py-2 px-3" required></textarea>
                    </div>
                </div>

                <div class="mb-4 flex">
                    <div class="w-1/2 pr-2">
                        <label for="event_date"class="font-bold mb-2">Fecha del Evento:</label>
                        <input type="date" id="fecha" name="event_date" min="{{ date('Y-m-d') }}"
                            class="w-full border rounded-md py-2 px-3">
                    </div>

                    <div class="w-1/2 pl-2">
                        <label for="start_time"class="font-bold mb-2">Hora de Inicio:</label>
                        <input type="time" name="start_time" class="w-full border rounded-md py-2 px-3" required>
                    </div>
                </div>
                {{-- <div>
                <label for="end_time">Hora de Finalización:</label>
                <input type="time" name="end_time"  required>
            </div> --}}
                <div class="mb-4 flex">
                    <div class="w-1/4 pr-2">
                        <label for="street"class="font-bold mb-2">Calle:</label>
                        <input type="text" name="street" class="w-full border rounded-md py-2 px-3" required>
                    </div>

                    <div class="w-1/4 pr-2">
                        <label for="zipcode"class="font-bold mb-2">Código Postal:</label>
                        <input type="text" name="zipcode" class="w-full border rounded-md py-2 px-3" required>
                    </div>

                    <div class="w-1/4 pr-2">
                        <label for="locality"class="font-bold mb-2">Localidad:</label>
                        <input type="text" name="locality" class="w-full border rounded-md py-2 px-3" required>
                    </div>

                    <div class="w-1/4">
                        <label for="country"class="font-bold mb-2">País:</label>
                        <input type="text" name="country" class="w-full border rounded-md py-2 px-3" required>
                    </div>
                </div>

                <div class="mb-4">
                    <label for="category"class="font-bold mb-2">Categoría:</label>

                    <select name="category" required>
                        <option value="Art and Culture">Arte y Cultura</option>
                        <option value="Sports">Deportes</option>
                        <option value="Concerts">Conciertos</option>
                        <option value="Gastronomy">Gastronomía</option>
                        <option value="Beauty-Fashion">Belleza y Moda</option>
                        <option value="Health-Wellness">Salud y Bienestar</option>
                        <option value="Family-Friendly">Familiar</option>
                    </select>

                </div>
                <label class="font-bold mb-2">Organizadores:</label>
                <div class="mb-4 grid grid-cols-2 gap-4"style="max-height: 200px; overflow-y: auto;">

                    @foreach ($organizations as $organizer)
                        <div class="flex items-center">
                            <input type="checkbox" name="organizations[]" value="{{ $organizer->id }}"
                                class="w-4 h-4 border rounded-md"required>
                            <label class="ml-2"class="font-bold mb-2">{{ $organizer->name }}</label>
                        </div>
                    @endforeach
                </div>

                <div class="mb-4 grid grid-cols-2 gap-4">
                    <div>
                        <label for="price"class="font-bold mb-2">Precio:</label>
                        <input type="number" min="1" name="price" class="w-full border rounded-md py-2 px-3"
                            required>
                    </div>
                    <div>
                        <label for="max_capacity"class="font-bold mb-2">Capacidad Máxima:</label>
                        <input type="number" min="1" name="max_capacity" class="w-full border rounded-md py-2 px-3"
                            required>
                    </div>
                </div>

                <button type="submit"class="text-white font-bold py-2 px-4 rounded-md"
                    style="background-color:#708356">Crear Evento</button>

            </fieldset>
        </form>
        <div class="flex justify-end ">
            <form method="GET" action="/">
                @csrf
                <button type="submit"
                    class="bg-lime-700 text-white font-bold py-2 px-16 mr-6 rounded hover:bg-lime-600 ">Volver
                    a Inicio</button>
            </form>
        </div>
        
    </div>



@endsection
{{-- <script>
    function goBack() {
        window.history.back();
    }
</script> --}}
