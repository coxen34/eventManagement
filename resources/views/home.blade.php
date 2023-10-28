@extends('layouts.plantilla')

@section('title','home')

@section('content')

<div class="overflow-hidden">
    <div class="flex items-center justify-center h-screen my-4">
        <button class="bg-lime-700 text-white font-bold py-6 px-16 rounded hover:bg-lime-600">
            Botón 1
        </button>
        <button class="bg-transparent text-transparent py-6 rounded mr-4"style="width:60px;">
            Botón transparente
        </button>
        <button class="bg-lime-700 text-white font-bold py-6 px-16 rounded hover:bg-lime-600">
            Botón 2
        </button>
    </div>
</div>





@endsection