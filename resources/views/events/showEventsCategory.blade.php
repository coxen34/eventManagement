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
    
    

    <div class="flex items-center justify-center mt-60">
        <button class="hover:bg-blue-700 text-white font-bold py-6 px-16 rounded mr-4" style="background-color:#708356">
            Botón 1
        </button>
        <button class="bg-transparent text-transparent py-6 rounded mr-4" style="width:60px;">
            Botón transparente
        </button>
        <button class="hover:bg-green-700 text-white font-bold py-6 px-16 rounded" style="background-color:#708356">
            Botón 2
        </button>
    </div>
    <div class="mt-14 mr-5 ml-5">
        {{ $events->links() }}
    </div>
    
@endsection

