<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\servicio;
use App\Http\Requests\ComponenteServicioRequest;
use App\Models\componentes_servicio;
use App\Models\componente;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Hash;
use Session;

class ComponenteServicioController extends Controller
{
    public function create()
    {
        return view('componente_servicio/create',[
            'servicios' => servicio::all(),
            'componente' => componente::all(),
        ]);
    }

    public function create_from_servicio($id_servicios){
        return view('componente_servicio/create_from_servicio',[
            'id_servicios' => $id_servicios,
            'componentes' => componente::all(),
        ]);
    }

    public function store(ComponenteServicioRequest $request)
    {
        $cargo = componentes_servicio::create([
            'id_componente_servicio' => uniqid('componentes_servicio-',true),
            'id_servicios'           => $request -> id_servicios,
            'id_componentes'         => $request -> id_componentes,
        ]);
        Session::flash('componente_asignado','Se ha registrado el cliente correctamente.');
        return redirect()->route('cliente.list');
    }

    public function list()
    {
        return view('componente_servicio/list');
    }

    public function edit()
    {
        return view('componente_servicio/edit');
    }

    public function update()
    {

    }
}
