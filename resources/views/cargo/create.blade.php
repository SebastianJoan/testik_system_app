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
        <div class="font-medium text-lg mb-4">Creación de Cargo</div>
            <form
                action="{{route('cargo.store')}}"
                method="POST"
            >
                @csrf
                @method('POST')
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2">Nombre</label>
                    <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" name="cargo" placeholder="Nombre del Cargo" class="form-input w-full bg-white border-b border focus:outline-none px-2 py-2 border-blue-800 rounded-sm"  required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2">Descripcion</label>
                    <input type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" name="descripcion" placeholder="Descripcion del Cargo" class="form-input w-full bg-white border-b border focus:outline-none px-2 py-2 border-blue-800 rounded-sm"  required>
                </div>
                <div class="mt-6">
                    <input type="submit" class="w-full cursor-pointer bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600" value="Enviar">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
