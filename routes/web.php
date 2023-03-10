<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ComponenteController;
use App\Http\Controllers\ComponenteServicioController;
use App\Http\Controllers\ResponsableController;
use App\Http\Controllers\ServicioController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return  redirect('home');
});

Route::controller(AuthController::class) -> group(function () {
    Route::get('/home', 'home')            -> name('home')      -> middleware('auth');
    Route::get('/register','register')     -> name('register');
    Route::post('/save','store')           -> name('store');
    Route::get('/login','login')           -> name('login');
    Route::post('/loginstore','auth')      -> name('auth');
    Route::get('/logindestroy','destroy')  -> name('destroy')   -> middleware('auth');
});

Route::controller(CargoController::class)  -> group(function () {
    Route::get('/cargo_add', 'create')     -> name('cargo.new')      -> middleware('auth');
    Route::post('/cargo_store','store')    -> name('cargo.store')   -> middleware('auth');
    Route::get('/cargo_show','show')       -> name('cargo.show')   -> middleware('auth');
    Route::get('/cargo_list','list')       -> name('cargo.list')      -> middleware('auth');
    Route::get('/cargo_edit','edit')       -> name('cargo.edit')     -> middleware('auth');
    Route::patch('/Cargo_update','update') -> name('cargo.update')  -> middleware('auth');
    Route::get('/cargo_search','search')   -> name('cargo.search')   -> middleware('auth');
});

Route::controller(ClienteController::class)  -> group(function () {
    Route::get('/cliente_add', 'create')     -> name('cliente.new')    -> middleware('auth');
    Route::post('/cliente_store','store')    -> name('cliente.store')  -> middleware('auth');
    Route::get('/cliente_list','list')       -> name('cliente.list')   -> middleware('auth');
    Route::get('/cliente_edit','edit')       -> name('cliente.edit')   -> middleware('auth');
    Route::patch('/cliente_update','update') -> name('cliente.update') -> middleware('auth');
    Route::get('/cliente_search','search')   -> name('cliente.search') -> middleware('auth');
    Route::get('/cliente_show/{id}','show')  -> name('cliente.show')   -> middleware('auth');
});

Route::controller(ComponenteController::class) -> group(function () {
    Route::get('/componente_add', 'create')    -> name('componente.new')     -> middleware('auth');
    Route::post('/componente_store','store')    -> name('componente.store')  -> middleware('auth');
    Route::get('/componente_list','list')     -> name('componente.list')     -> middleware('auth');
    Route::get('/componente_edit','edit')      -> name('componente.edit')    -> middleware('auth');
    Route::patch('/componente_update','update') -> name('componente.update') -> middleware('auth');
    Route::get('/componente_search','search')  -> name('componente.search')  -> middleware('auth');
});


Route::controller(ComponenteServicioController::class) -> group(function () {
    Route::get('/componenteServicio_add', 'create')    -> name('componenteServicio.new')     -> middleware('auth');
    Route::get('/componenteServicio_add_from_servicio/{id_servicio}', 'create_from_servicio')-> name('componenteServicio.servicio.new') -> middleware('auth');
    Route::post('/componenteServicio_store','store')    -> name('componenteServicio.store')  -> middleware('auth');
    Route::get('/componenteServicio_list','list')     -> name('componenteServicio.list')     -> middleware('auth');
    Route::get('/componenteServicio_edit','edit')      -> name('componenteServicio.edit')    -> middleware('auth');
    Route::patch('/componenteServicio_update','update') -> name('componenteServicio.update') -> middleware('auth');
});

Route::controller(ResponsableController::class) -> group(function () {
    Route::get('/responsable_add', 'create')    -> name('responsable.new')      -> middleware('auth');
    Route::post('/responsable_store','store')    -> name('responsable.store')   -> middleware('auth');
    Route::get('/responsable_list','list')     -> name('responsable.list')      -> middleware('auth');
    Route::get('/responsable_edit','edit')      -> name('responsable.edit')     -> middleware('auth');
    Route::patch('/responsable_update','update') -> name('responsable.update')  -> middleware('auth');
    Route::get('/responsable_search','search')  -> name('responsable.search')   -> middleware('auth');
});

Route::controller(ServicioController::class) -> group(function () {
    Route::get('/servicio_add', 'create')    -> name('servicio.new')        -> middleware('auth');
    Route::get('/serviciofromcliente_add/{id_cliente}', 'create_from_cliente') -> name('servicio.cliente.new') -> middleware('auth');
    Route::post('/servicio_store','store')    -> name('servicio.store')     -> middleware('auth');
    Route::get('/servicio_list','list')     -> name('servicio.list')        -> middleware('auth');
    Route::get('/servicio_edit','edit')      -> name('servicio.edit')       -> middleware('auth');
    Route::patch('/servicio_update','update') -> name('servicio.update')    -> middleware('auth');
    Route::get('/servicio_search','search')  -> name('servicio.search')     -> middleware('auth');
    Route::get('/servicio_show/{id_servicio}','show')  -> name('servicio.show')     -> middleware('auth');
});
