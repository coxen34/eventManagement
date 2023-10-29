@extends('layouts.plantilla')

@section('title', 'organizations create')

@section('content')

    <div class="container mx-auto ">


        <form action="{{ route('organizations.store') }}"method='POST' class="my-5 p-5 bg-white rounded-lg shadow-md"
            style="overflow-y: auto;">
            @csrf

            <fieldset>
                <legend>
                    <h1 class="text-4xl font-bold text-center  mb-10"> Da de alta un organizador</h1>
                </legend>


                <div class="mb-4 flex">
                    <div class="w-1/2 pr-2">
                        <label for="name" class="block text-gray-700 font-bold mb-2">Nombre:</label>
                        <input type="text" name="name" class="w-full border rounded-md py-2 px-3" required>
                    </div>

                    <div class="w-1/2 pl-2">
                        <label for="street"class="font-bold mb-2">Calle:</label>
                        <input type="text" name="street" rows="3" class="w-full border rounded-md py-2 px-3"
                            required>
                    </div>
                </div>

                <div class="mb-4 flex">
                    <div class="w-1/2 pr-2">
                        <label for="zipcode"class="font-bold mb-2">C.P</label>
                        <input type="number" name="zipcode" class="w-full border rounded-md py-2 px-3">
                    </div>

                    <div class="w-1/2 pl-2">
                        <label for="locality"class="font-bold mb-2">Localidad:</label>
                        <input type="text" name="locality" class="w-full border rounded-md py-2 px-3" required>
                    </div>
                </div>

                <div class="mb-4 flex">
                    <div class="w-1/4 pr-2">
                        <label for="province"class="font-bold mb-2">Provincia:</label>
                        <input type="text" name="province" class="w-full border rounded-md py-2 px-3" required>
                    </div>

                    <div class="w-1/4 pr-2">
                        <label for="country"class="font-bold mb-2">Pais:</label>
                        <input type="text" name="country" class="w-full border rounded-md py-2 px-3" required>
                    </div>

                    <div class="w-1/4 pr-2">
                        <label for="phone"class="font-bold mb-2">Teléfono:</label>
                        <input type="tel" name="phone" class="w-full border rounded-md py-2 px-3" required>
                    </div>

                    <div class="w-1/4">
                        <label for="email"class="font-bold mb-2">Email:</label>
                        <input type="email" name="email" class="w-full border rounded-md py-2 px-3" required>
                    </div>
                </div>
                <div class="mb-4">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md">
                        Enviar Formulario
                    </button>
                </div>

            </fieldset>
        </form>


    @endsection
