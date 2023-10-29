@extends('layouts.plantilla')

@section('title', 'Editar Campo del Organizador')

@section('content')
    <section class="max-w-screen-xl mx-auto p-4">
        <div style="background-color: rgba(251, 251, 239, 0.3);border-radius: 3%;">
            <h1 class="font-bold text-lg bg-white">Editar Campo del Organizador</h1>
            @if (session('error'))
                <div>
                    {{ session('error') }}
                </div>
            @endif

            <form method="post" action="{{ route('organizations.updateField', ['orgId' => $org->id]) }}"class="space-y-4">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-5 gap-4">

                    <div class="mb-4">
                        <label for="name"class="block text-sm font-semibold">Nombre</label>
                        <input type="text" name="name" value="{{ $org->name }}"class="w-full p-2 border rounded">
                    </div>
                    <div>
                        <label for="street"class="block text-sm font-semibold">Calle</label>
                        <input type="text" name="street" value="{{ $org->street }}"class="w-full p-2 border rounded">
                    </div>
                    <div>
                        <label for="locality"class="block text-sm font-semibold">Localidad</label>
                        <input type="text" name="locality" value="{{ $org->locality }}"class="w-full p-2 border rounded">
                    </div>
                    <div>
                        <label for="zipcode"class="block text-sm font-semibold">C.P.</label>
                        <input type="text" name="zipcode" value="{{ $org->zipcode }}"class="w-full p-2 border rounded">
                    </div>

                    <div>
                        <label for="province"class="block text-sm font-semibold">Provincia</label>
                        <input type="text" name="province" value="{{ $org->province }}"class="w-full p-2 border rounded">
                    </div>
                </div>
                <div class="flex space-x-4 mt-4">
                    <div class="w-1/2">
                        <label for="country" class="block text-sm font-semibold">Pais</label>
                        <input type="text" name="country"value="{{ $org->country }}" class="w-full p-2 border rounded">
                    </div>
                    <div class="w-1/2">
                        <label for="phone" class="block text-sm font-semibold">Teléfono</label>
                        <input type="tel" name="phone"value=" {{ $org->phone }}" class="w-full p-2 border rounded">
                    </div>
                    <div class="w-1/4">
                        <label for="email"class="font-bold mb-2">Email:</label>
                        <input type="email" name="email"value=" {{ $org->email }}"
                            class="w-full border rounded-md py-2 px-3">
                    </div>
                </div>

                <button
                    type="submit"class="bg-lime-700 text-white font-semibold py-2 px-4 rounded hover:bg-lime-600">Guardar
                    cambios</button>
            </form>
        </div>
        
        <div class="flex justify-end ">
            <form method="GET" action="/">
                @csrf
                <button type="submit"
                    class="bg-lime-700 text-white font-bold py-2 px-16 mr-6 rounded hover:bg-lime-600  ">Volver
                    a Inicio</button>
            </form>
        </div>


        @foreach (['success', 'error2'] as $messageType)
            @if (session($messageType))
                <div class="alert alert-{{ $messageType }}">
                    {{ session($messageType) }}
                </div>
            @endif
        @endforeach

    </section>
@endsection
