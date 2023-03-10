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
        <div class="font-medium text-lg mb-4">Creación de Servicio</div>
            <form action="{{route('servicio.store')}}" method="POST">
                @csrf
                @METHOD('POST')
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2">Cliente</label>
                    <select name="id_clientes" class="form-input w-full bg-white border-b border focus:outline-none px-2 py-2 border-blue-800 rounded-sm">
                        <option value="">-- Por favor seleccciona un Cliente --</option>
                        @foreach($cliente as $data)
                            <option value="{{$data -> id_clientes}}">{{$data -> nombre}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2">Identificador de Servicio</label>
                     <input type="text" name="id_servicios" placeholder="Identificador del Servicio" class="form-input w-full bg-white border-b border focus:outline-none px-2 py-2 border-blue-800 rounded-sm"  required>
                 </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2">Lugar</label>
                    <input type="text" name="lugar" placeholder="Nombre del Servicio" class="form-input w-full bg-white border-b border focus:outline-none px-2 py-2 border-blue-800 rounded-sm"  required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2">Descripcion</label>
                    <input type="text" name="descripcion" placeholder="Nombre del Servicio" class="form-input w-full bg-white border-b border focus:outline-none px-2 py-2 border-blue-800 rounded-sm"  required>
                </div>
                <div class="mt-6">
                    <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Enviar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
