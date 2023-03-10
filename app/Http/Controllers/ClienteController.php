<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cliente;
use App\Http\Requests\ClienteRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Hash;
use Session;

class ClienteController extends Controller
{
    public function create()
    {
        return view('cliente/create');
    }

    public function show($id_clientes)
    {
        return view('cliente/show',[
            'profile' => cliente::with('servicios')->where('id_clientes','LIKE',$id_clientes)->get()
        ]);
    }

    public function store(ClienteRequest $request)
    {
        if($request -> File('urlImage')!=null){
            $filename =  time() . '.' . $request->File('urlImage')->getClientOriginalExtension();
            $request->File('urlImage')->move(public_path() . "/storage/urlImage", $filename);
            $cargo = cliente::create([
                'id_clientes' => uniqid('cliente-',true),
                'nombre'      => $request -> nombre,
                'urlImage'    => 'urlImage/'.$filename,
                'descripcion' => $request -> descripcion,
            ]);
            Session::flash('cliente_creado','Se ha registrado el cliente correctamente.');
            return redirect()->route('cliente.list');
        }else{
            $cargo = cliente::create([
                'id_clientes' => uniqid('cliente-',true),
                'nombre'      => $request -> nombre,
                'urlImage'    => "urlImage/default-image.jpg",
                'descripcion' => $request -> descripcion,
            ]);
            Session::flash('cliente_creado','Se ha registrado el cliente correctamente.');
            return redirect()->route('cliente.list');
        }
    }

    public function list()
    {
        return view('cliente/list',[
            'Clientes' => cliente::all(),
            'countClientes' => count(cliente::all())
        ]);
    }

    public function search(Request $request)
    {

        $activos_Filtrados = cliente::where('nombre', 'LIKE', '%'.$request->name.'%')->orwhere('id_clientes', 'LIKE', '%'.$request->name.'%')->orderBy('nombre','desc')->paginate(10);

        if( $request -> name == null){
            return view('cliente/list',[
                'Clientes' => cliente::orderBy('nombre','desc')->paginate(10),
                'countClientes' => count(cliente::all()),
            ]);
        }else{
            return view('cliente/list',[
                'Clientes' => $activos_Filtrados,
                'countClientes' => count($activos_Filtrados),
            ]);
        }
    }

    public function edit()
    {
        return view('cliente/edit');
    }

    public function update()
    {

    }
}
