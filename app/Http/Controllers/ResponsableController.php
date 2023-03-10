<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\responsable;
use App\Models\cargo;
use App\Http\Requests\ResponsableRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Hash;
use Session;


class ResponsableController extends Controller
{
    public function create()
    {
        return view('responsable/create',[
            'cargos' => cargo::all(),
        ]);
    }

    public function store(ResponsableRequest $request)
    {
        if($request -> File('urlImage')!=null){
            $filename =  time() . '.' . $request->File('urlImage')->getClientOriginalExtension();
            $request->File('urlImage')->move(public_path() . "/storage/urlImage", $filename);
            $cargo = responsable::create([
                'id_responsable' => uniqid('responsable-',true),
                'id_cargo'       => $request -> id_cargo,
                'nombre'         => $request -> nombre,
                'urlImage'       => 'urlImage/'.$filename
            ]);
            Session::flash('responsable_creado','Se ha registrado el responsable correctamente.');
            return redirect()->route('responsable.list');
        }else{
            $cargo = responsable::create([
                'id_responsable' => uniqid('responsable-',true),
                'id_cargo'       => $request -> id_cargo,
                'nombre'         => $request -> nombre,
                'urlImage'       => "urlImage/default-image.jpg",
            ]);
            Session::flash('responsable_creado','Se ha registrado el responsable correctamente.');
            return redirect()->route('responsable.list');
        }
    }

    public function list()
    {
        return view('responsable/list',[
            'responsables' => responsable::orderBy('nombre','desc')->paginate(10),
            'countresponsable' => count(responsable::all()),
        ]);
    }

    public function search(Request $request)
    {
        $activos_Filtrados = responsable::where('nombre', 'LIKE', '%'.$request->name.'%')->orwhere('id_responsable', 'LIKE', '%'.$request->name.'%')->orderBy('nombre','desc')->paginate(10);

        if( $request -> name == null){
            return view('responsable/list',[
                'responsables' => responsable::orderBy('nombre','desc')->paginate(10),
                'countresponsable' => count(responsable::all()),
            ]);
        }else{
            return view('responsable/list',[
                'responsables' => $activos_Filtrados,
                'countresponsable' => count($activos_Filtrados),
            ]);
        }
    }

    public function edit()
    {
        return view('responsable/edit');
    }

    public function update()
    {

    }
}
