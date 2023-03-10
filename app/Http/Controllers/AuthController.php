<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Hash;
use Session;

class AuthController extends Controller
{
    public function register()
    {
        return view('Auth/register');
    }

    public function home()
    {
        return view('home');
    }

    public function login()
    {
        return view('Auth/login');
    }

    public function auth()
    {
        if (auth()->attempt(request(['email', 'password'])) == false) {
            return back()->withErrors([
                'message' => 'Usuario o Contraseña Equivocados, Por favor intentar de nuevo'
            ]);
        }

        return redirect()->to('/home');
    }

    public function destroy()
    {
        auth()->logout();

        return redirect()->to('/home');
    }

    public function store(UserRequest $request)
    {
        User::create([
            'name'           => $request -> name,
            'email'          => $request -> email,
            'password'       => Hash::make($request -> password),
        ]);

        Session::flash('usuario_registrado','Se ha registrado el usuario correctamente.');
        return redirect()->to('/home');

    }
}
