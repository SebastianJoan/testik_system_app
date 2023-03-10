<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\servicio;
use App\Http\Requests\ServicioRequest;
use App\Models\cliente;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Hash;
use Session;

class ServicioController extends Controller
{
    public function create()
    {
        return view('servicio/create',[
            'cliente' => cliente::all(),
        ]);
    }

    public function show($id_servicios){
        return view('servicio/show',[
            'profile' => servicio::with('cliente','componentes_servicio.componentes')->where('id_servicios','LIKE',$id_servicios)->get()
        ]);
    }

    public function store(ServicioRequest $request)
    {
        $cargo = servicio::create([
            'id_servicios' => $request -> id_servicios,
            'id_clientes'  => $request -> id_clientes,
            'nombre'       => $request -> nombre,
            'lugar'        => $request -> lugar,
            'descripcion'  => $request -> descripcion,
        ]);
        Session::flash('servicio_creado','Se ha registrado el cliente correctamente.');
        return redirect()->route('servicio.show',$request -> id_servicios);
    }

    public function create_from_cliente($id_clientes){
        return view('servicio/create_from_cliente',[
            'id_clientes' => $id_clientes,
        ]);
    }

    public function list()
    {
        return view('servicio/list',[
            'servicio' => servicio::orderBy('id_servicios','desc')->paginate(10),
            'countServicios' => count(servicio::all()),
        ]);
    }

    public function search(Request $request)
    {
        $activos_Filtrados = servicio::where('nombre', 'LIKE', '%'.$request->name.'%')->orwhere('id_servicios', 'LIKE', '%'.$request->name.'%')->orderBy('nombre','desc')->paginate(10);

        if( $request -> name == null){
            return view('servicio/list',[
                'servicio' => servicio::orderBy('nombre','desc')->paginate(10),
                'countServicios' => count(servicio::all()),
            ]);
        }else{
            return view('servicio/list',[
                'servicio' => $activos_Filtrados,
                'countServicios' => count($activos_Filtrados),
            ]);
        }
    }

    public function edit()
    {
        return view('servicio/edit');
    }

    public function update()
    {

    }
}
