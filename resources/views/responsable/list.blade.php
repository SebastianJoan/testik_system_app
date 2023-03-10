@extends('layouts.app')
@section('content')

@if(Session::has('responsable_creado'))
    <div class="text-white border bg-green-500 px-2 py-2 " role="alert">
        {{Session::get('responsable_creado')}}
    </div>
@endif

@if($errors->any())
    <div class="bg-red-500 text-white px-2 py-2 " role="alert">
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </div>
@endif

<div class="w-full h-auto px-9 py-9 gap-4 flex flex-col">
    <div class="w-full h-auto flex flex-col gap-2 md:flex-row md:gap-2 md:justify-between md:items-center md:justify-items-center ">
        <div class="w-auto h-auto flex flex-col gap-2 justify-center items-center justify-items-center">
            <h1 class="font-medium text-2xl md:font-bold md:text-3xl">
                RESPONSABLES
            </h1>
            <a href="{{route('responsable.new')}}" class="px-2 py-2 w-full bg-white text-green-600 border-green-600 border hover:bg-green-800 hover:text-white rounded-sm shadow-sm  flex justify-center items-center justify-items-center">
                AGREGAR NUEVO RESPONSABLE
            </a>
            <a href="#" class="px-2 py-2 bg-white text-blue-600 border-blue-600 border hover:bg-blue-800 hover:text-white rounded-sm shadow-sm ">
                EXPORTAR LISTADO DE RESPONSABLES: {{ $countresponsable }}
            </a>
        </div>
        <form
            action="{{route('responsable.search')}}"
            method='GET'
            class="flex"
        >
            @csrf
            <input type="text"   name="name" placeholder="Buscar.." class=" px-2 py-2 focus:outline-none bg-gray-800 text-white rounded-sm">
            <input type="submit" value="Buscar.." class=" px-2 py-2 bg-white text-blue-600 cursor-pointer border-blue-600 border hover:bg-blue-800 hover:text-white rounded-sm shadow-sm ">
        </form>
    </div>
    <div class="hidden md:flex md:flex-col md:w-full md:h-auto md:bg-gray-700 md:text-white">
        <div class="w-full h-auto py-2 px-2 flex flex-row justify-between items-center justify-items-center">
            <div class="w-1/4 flex justify-start items-center justify-items-center">
                <h3>
                    ID
                </h3>
            </div>
            <div class="w-1/4 flex justify-start items-center justify-items-center">
                <h3>
                    CARGO
                </h3>
            </div>
            <div class="w-1/4 flex justify-start items-center justify-items-center">
                <h3>
                    DESCRIPCION
                </h3>
            </div>
            <div class="w-1/4 flex justify-start items-center justify-items-center">
                <h3>
                    Informacion
                </h3>
            </div>
        </div>
        <div class="flex flex-col bg-white text-black justify-center items-center justify-items-center">
            @foreach($responsables as $data)
                <div class="w-full h-auto py-2 px-2 flex flex-row justify-between items-center justify-items-center">
                    <div class="w-1/4 flex justify-start items-center justify-items-center">
                        <h3>
                            {{ $loop -> index + 1 }}
                        </h3>
                    </div>
                    <div class="w-1/4 flex justify-start items-center justify-items-center">
                        <h3>
                            {{ $data -> cargo -> cargo }}
                        </h3>
                    </div>
                    <div class="w-1/4 flex justify-start items-center justify-items-center">
                        <h3>
                            @if( $data -> descripcion != null )
                                {{ $data -> descripcion }}
                            @else
                                NO POSEE
                            @endif
                        </h3>
                    </div>
                    <div class="w-1/4 flex justify-start items-center justify-items-center">
                        <a href="#">
                            Informacion
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    {{-- {{ $activos -> links() }} --}}

    <div class="flex flex-col gap-4 md:hidden">
        @foreach($responsables as $data)
            <div class="w-full h-auto flex  bg-slate-800 text-white flex-col gap-3 rounded-sm px-2 py-2">
                <div class="w-full h-auto px-2">
                    ID: {{ $data -> taqActivos }}
                </div>
                <div class="w-full h-auto px-2">
                    CARGO: {{ $data -> cargo -> cargo }}
                </div>
                <div class="w-full h-auto px-2">
                    DESCRIPCION: {{ $data -> descripcion }}
                </div>
                <a href="#" >
                    <div class=" cursor-pointer px-2 py-2 bg-white text-green-600 border-green-600 border hover:bg-green-800 hover:text-white rounded-sm shadow-sm ">
                        INFORMACION
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection
