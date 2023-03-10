@extends('layouts.app')
@section('content')
@if($errors->any())
    <div class="bg-red-500 text-white px-2 py-2 " role="alert">
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </div>
@endif
<div class="flex justify-center items-center h-screen ">
    <div class="w-96 bg-white rounded-lg shadow-lg p-6 border border-blue-500 ">
        <div class="font-medium text-lg mb-4">Creación de Componente</div>
            <form action="{{route('componente.store')}}" method="POST">
                @csrf
                @METHOD('POST')
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2">ID del componente</label>
                    <input type="text" name="id_componentes" placeholder="Nombre del Cliente" class="form-input w-full bg-white border-b border focus:outline-none px-2 py-2 border-blue-800 rounded-sm"  required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2">Nombre</label>
                    <input type="text" name="nombre" placeholder="Nombre del Cliente" class="form-input w-full bg-white border-b border focus:outline-none px-2 py-2 border-blue-800 rounded-sm"  required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2">Descripcion</label>
                    <input type="text" name="descripcion" placeholder="Nombre del responsable" class="form-input w-full bg-white border-b border focus:outline-none px-2 py-2 border-blue-800 rounded-sm"  required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2">Serial</label>
                    <input type="text" name="serial" placeholder="Nombre del responsable" class="form-input w-full bg-white border-b border focus:outline-none px-2 py-2 border-blue-800 rounded-sm"  required>
                </div>
                <div class="mt-6">
                    <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Enviar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
