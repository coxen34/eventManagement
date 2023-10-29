@extends('layouts.plantilla')

@section('title', 'allEvents')

@section('content')

    <div class="flex justify-center">
        <h2
            class="font-bold text-lg bg-black text-black p-1 w-1/2 text-center rounded"style="background-color: rgba(251, 251, 239, 0.6);">
            Todos los Organizadores</h2>
    </div>

    <br>
    @if (session('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif

    <div class="space-y-4 max-height-400px-overflow-auto">
        @foreach ($orgs->chunk(4) as $orgRow)
            <ul class="flex flex-wrap justify-between -my-4">
                @foreach ($orgRow as $org)
                    <li
                        class="border p-4 mb-4 w-64 min-h-[12rem] flex flex-col justify-between "style="background-color: rgba(251, 251, 239, 0.6);">
                        <div>
                            <strong>Organizador:</strong> {{ $org->name }}<br>
                            <strong>Calle: </strong>{{ $org->street }}<br>
                            <strong>C.P. </strong>{{ $org->zipcode }}<br>
                            <strong>Localidad:</strong> {{ $org->locality }}<br>
                            <strong>Provincia:</strong> {{ $org->province }}<br>
                            <strong>Pais:</strong> {{ $org->country }}<br>
                            <strong>Teléfono:</strong> {{ $org->phone }}<br>
                            <strong>Mail:</strong> {{ $org->email }}<br>
                        </div>
                        <br>
                        <div class="flex space-x-24">
                            <a href="{{ route('organizations.editField', ['orgId' => $org->id, 'field' => 'name']) }}"
                                class="font-bold text-blue-500 bg-blue-100 hover:bg-blue-200 rounded ">Editar</a>
                            <form method="POST" action="{{ route('organizations.destroy', ['orgId' => $org->id]) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="delete-org font-bold text-red-500 bg-red-100 hover:bg-red-200 rounded">Eliminar</button>
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>
        @endforeach
    </div>
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const deleteButtons = document.querySelectorAll('.delete-org');

        deleteButtons.forEach((button) => {
            button.addEventListener('click', function(e) {
                if (!confirm('¿Estás seguro de que deseas eliminar este organizador?')) {
                    e
                        .preventDefault(); // Cancela la acción de eliminación si el usuario cancela la confirmación.
                }
            });
        });
    });
</script>
