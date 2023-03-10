<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CargoRequest;
use App\Models\cargo;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Hash;
use Session;

class CargoController extends Controller
{
    public function create()
    {
        return view('cargo/create');
    }

    public function store(CargoRequest $request)
    {
        $cargo = cargo::create([
            'id_cargo'    => uniqid($request -> cargo,true),
            'cargo'       => $request -> cargo,
            'descripcion' => $request -> descripcion,
        ]);

        Session::flash('cargo_creado','Se ha registrado el cargo correctamente.');
        return redirect()->route('cargo.list');
    }

    public function list()
    {
        return view('cargo/list',[
            'cargo' => cargo::orderBy('cargo','desc')->paginate(10),
            'countcargo' => count(cargo::all()),
        ]);
    }

    public function search(Request $request)
    {
        $activos_Filtrados = cargo::where('cargo', 'LIKE', '%'.$request->name.'%')->orwhere('id_cargo', 'LIKE', '%'.$request->name.'%')->orderBy('nombre','desc')->paginate(10);

        if( $request -> name == null){
            return view('cargo/list',[
                'cargo' => cargo::orderBy('nombre','desc')->paginate(10),
                'countcargo' => count(cargo::all()),
            ]);
        }else{
            return view('cargo/list',[
                'cargo' => $activos_Filtrados,
                'countcargo' => count($activos_Filtrados),
            ]);
        }
    }

    public function edit()
    {
        return view('cargo/edit');
    }

    public function update()
    {

    }

}
