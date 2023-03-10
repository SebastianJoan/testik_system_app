<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\componente;
use App\Http\Requests\ComponenteRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Hash;
use Session;

class ComponenteController extends Controller
{
    public function create()
    {
        return view('componente/create');
    }

    public function store(ComponenteRequest $request)
    {
        $duplicado = count(componente::where('id_componentes','LIKE',$request -> id_componentes)->get());

        if( $duplicado != 1  ){
            if($request -> File('urlImage')!=null){
                $filename =  time() . '.' . $request->File('urlImage')->getClientOriginalExtension();
                $request->File('urlImage')->move(public_path() . "/storage/urlImage", $filename);
                $cargo = componente::create([
                    'id_componentes'  => $request -> id_componentes,
                    'nombre'          => $request -> nombre,
                    'descripcion'     => $request -> descripcion,
                    'serial'          => $request -> serial,
                    'urlImage'        =>'urlImage/'.$filename
                ]);
                Session::flash('cliente_creado','Se ha registrado el cliente correctamente.');
                return redirect()->route('componente.list');
            }else{
                $cargo = componente::create([
                    'id_componentes'  => $request -> id_componentes,
                    'nombre'          => $request -> nombre,
                    'descripcion'     => $request -> descripcion,
                    'serial'          => $request -> serial,
                    'urlImage'        => "urlImage/default-image.jpg",
                ]);
                Session::flash('cliente_creado','Se ha registrado el cliente correctamente.');
                return redirect()->route('componente.list');
            }
        }else{
            return Redirect::back()->withErrors(['msg' => 'El Componente ya se encuentra registrado']);
        }
    }

    public function list()
    {
        return view('componente/list',[
            'componentes' => componente::all(),
            'countComponentes' => count(componente::all()),
        ]);
    }

    public function search(Request $request)
    {

        $activos_Filtrados = componente::where('nombre', 'LIKE', '%'.$request->name.'%')->orwhere('serial', 'LIKE', '%'.$request->name.'%')->orwhere('id_componentes', 'LIKE', '%'.$request->name.'%')->orderBy('nombre','desc')->paginate(10);

        if( $request -> name == null){
            return view('componente/list',[
                'componentes' => componente::orderBy('nombre','desc')->paginate(10),
                'countComponentes' => count(componente::all()),
            ]);
        }else{
            return view('componente/list',[
                'componentes' => $activos_Filtrados,
                'countComponentes' => count($activos_Filtrados),
            ]);
        }
    }

    public function edit()
    {
        return view('componente/edit');
    }

    public function update()
    {

    }
}
