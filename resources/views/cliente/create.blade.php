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
        <div class="font-medium text-lg mb-4">Creación de clientes</div>
            <form
                action="{{route('cliente.store')}}"
                method="POST"
            >
                @csrf
                @method('POST')
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2">Nombre</label>
                    <input type="text" name="nombre" placeholder="Nombre del Cliente" class="form-input w-full bg-white border-b border focus:outline-none px-2 py-2 border-blue-800 rounded-sm"  required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2">Descripcion</label>
                    <input type="text" name="descripcion" placeholder="Descripcion del Cliente" class="form-input w-full bg-white border-b border focus:outline-none px-2 py-2 border-blue-800 rounded-sm"  required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2">Imagen</label>
                    <input name="descripcion" name="urlImage"  accept="image/png, image/gif, image/jpeg" placeholder="Nombre del responsable" class="form-input w-full  bg-white border-b  focus:outline-none px-2 py-2  rounded-sm border-2 file:bg-blue-800 file:px-2 file:py-2 file:text-white file:outline-none file:border-none cursor-pointer file:cursor-pointer file:rounded-lg" aria-describedby="file_input_help" id="file_input" type="file" >
                </div>
                <div class="mt-6">
                    <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Enviar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
