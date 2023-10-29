@extends('layouts.plantilla')

@section('title', 'home')

@section('content')


    <div class="overflow-hidden">
        <div class="flex items-center justify-center h-screen my-4">
            <div class="grid grid-cols-1 grid-rows-3 gap-4">
                <button class="bg-lime-700 text-white font-bold py-6 px-16 rounded hover:bg-lime-600">Crear evento</button>
                <button class="bg-lime-700 text-white font-bold py-6 px-16 rounded hover:bg-lime-600">Editar evento</button>
                <button class="bg-lime-700 text-white font-bold py-6 px-16 rounded hover:bg-lime-600">Visualizar
                    eventos</button>
                <button class="bg-lime-700 text-white font-bold py-6 px-16 rounded hover:bg-lime-600">Crear
                    organizador</button>
                <button class="bg-lime-700 text-white font-bold py-6 px-16 rounded hover:bg-lime-600">Editar
                    organizador</button>
            </div>
        </div>
    </div>
@endsection
