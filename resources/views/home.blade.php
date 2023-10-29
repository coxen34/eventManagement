@extends('layouts.plantilla')

@section('title', 'home')

@section('content')


    <div class="overflow-hidden">
        <div class="flex items-center justify-center h-screen my-4">
            <div class="grid grid-cols-1 grid-rows-3 gap-4">
                <form method="GET" action="{{ url('organizations') }}">
                    @csrf
                    <button type="submit" class="bg-lime-700 text-white font-bold py-6 px-16 rounded hover:bg-lime-600"style="width: 200px;">Crear Organizador</button>
                </form>
                
                <form method="GET" action="{{ url('events/create') }}">
                    @csrf
                    <button type="submit" class="bg-lime-700 text-white font-bold py-6 px-16 rounded hover:bg-lime-600"style="width: 200px;">Crear evento</button>
                </form>

                <form method="GET" action="{{ url('organizations/showOrgs') }}">
                    @csrf
                    <button type="submit" class="bg-lime-700 text-white font-bold py-6 px-16 rounded hover:bg-lime-600"style="width: 200px;">Modificar Organizador</button>
                </form>

                <form method="GET" action="{{ url('events/showEvents') }}">
                    @csrf
                    <button type="submit" class="bg-lime-700 text-white font-bold py-6 px-16 rounded hover:bg-lime-600"style="width: 200px;">Modificar evento</button>
                </form>

                <form method="GET" action="{{ url('events') }}">
                    @csrf
                    <button type="submit" class="bg-lime-700 text-white font-bold py-6 px-16 rounded hover:bg-lime-600"style="width: 200px;">Visualizar eventos</button>
                </form>
                
                
                
                
                
                
            </div>
        </div>
    </div>
@endsection
