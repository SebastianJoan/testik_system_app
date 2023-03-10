@extends('layouts.app')
@section('content')

@if(Session::has(''))
    <div class="text-white border bg-green-500 px-2 py-2 " role="alert">
        {{Session::get('')}}
    </div>
@endif

@if($errors->any())
    <div class="bg-red-500 text-white px-2 py-2 " role="alert">
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </div>
@endif

@foreach($profile as $data)
    <div class="w-full h-auto flex flex-col px-2 md:px-28 py-4 ">
        <div class="bg-slate-800 h-12 w-full rounded-t-lg flex justify-start items-center justify-items-end px-8 text-white font-bold">
            <h3>
                {{ $data -> nombre }}
            </h3>
        </div>
        <div class="bg-gray-100 border-2 border-gray-800 px-2 h-auto w-full rounded-b-lg flex justify-center items-start justify-items-center">
            <div class="w-1/3 px-2 py-2 flex flex-col gap-2">
                <img src="{{asset('img/registerbackground.jpg')}}" alt="ComponenteImage" class="w-full h-auto rounded-lg">
                <a href="{{route('servicio.cliente.new',$data -> id_clientes)}}" class=" w-full py-2 bg-green-500 rounded-md font-bold text-white hover:bg-green-700 hover:transition-colors">
                    <button class="w-full">
                        Registrar Nuevo Servicio
                    </button>
                </a>
            </div>
            <div class="mt-2 h-full w-full">
                <div class="h-full w-full bg-gray-800 px-2 py-2 rounded-t-lg text-white font-bold">
                    SERVICIOS
                </div>
                @foreach($data -> servicios as $value)
                    <div class="h-full w-full bg-gray-200 px-2 py-2 border border-black font-bold">
                        {{ $value -> id_servicios }}
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endforeach
@endsection
