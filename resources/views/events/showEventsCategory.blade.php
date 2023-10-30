@extends('layouts.plantilla')

@section('title', 'Eventos de la categoría: ' . $category)

@section('content')
    <h1 class="text-4xl font-bold text-center mt-10 mb-10">Eventos de la categoría: {{ $category }}</h1>

        <table class="mx-auto rounded" style="margin-top: 15%; width:60%;background-color: rgba(251, 251, 239, 0.3)";>

        <thead>
            <tr>
                <th>Título</th>
                <th>Fecha </th>
                <th> </th>
                <th>Precio</th>
                <th> </th>
                <th>Localidad</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($events as $event)
                <tr>
                    <td >{{ $event->title }}</td>
                    <td class="mr-4 ">{{ date('d-m-Y', strtotime($event->event_date)) }}</td>
                    <td>&nbsp;&nbsp;</td>
                    <td class="mr-4">{{ number_format($event->price, 2) }} €</td>
                    <td>&nbsp;&nbsp;</td>
                    <td >{{ $event->locality }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br><br><br><br>
    <div class="flex justify-center mt-16">
        <form method="GET" action="/">
            @csrf
            <button type="submit"
                class="bg-lime-700 text-white font-bold py-2 px-16 mr-6 rounded hover:bg-lime-600 "style="width: 200px;">Volver
                a Inicio</button>
        </form>
    </div>

    
    <div class="mt-14 mr-5 ml-5">
        {{ $events->links() }}
    </div>
    
@endsection

