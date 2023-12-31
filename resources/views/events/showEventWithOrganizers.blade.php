@extends('layouts.plantilla')

@section('title', 'Detalle del Evento')

@section('content')
    <h1>Detalles del Evento modificado</h1>

    <ul>
        <li>
            <strong>Título del Evento:</strong>
            {{ $event->title }}
        </li>
        <li>
            <strong>Fecha:</strong>
            {{ $event->event_date }}
        </li>
        <li>
            <strong>Hora de inicio:</strong>
            {{ $event->start_time }}

        </li>
        {{-- <li>
            <strong>Hora de finalización:</strong>
            {{ $event->end_time }}

        </li> --}}
        <li>
            <strong>Calle:</strong>
            {{ $event->street }}

        </li>
        <li>
            <strong>C.P.:</strong>
            {{ $event->zipcode }}

        </li>
        <li>
            <strong>Localidad:</strong>
            {{ $event->locality }}

        </li>
        <li>
            <strong>Pais:</strong>
            {{ $event->country }}

        </li>
        <li>
            <strong>Descripción:</strong>
            {{ $event->description }}

        </li>
        <li>
            <strong>Categoría:</strong>
            {{ $event->category }}

        </li>
        <li>
            <strong>Precio:</strong>
            {{ $event->price }}

        </li>
        <li>
            <strong>Aforo máximo:</strong>
            {{ $event->max_capacity }}

        </li>

    </ul>

    <h2>Organizadores:</h2>
    <ul>
        @foreach ($event->organizations as $organization)
            <li>{{ $organization->name }}

            </li>
        @endforeach
    </ul>
    </div>
