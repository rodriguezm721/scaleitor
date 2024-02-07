<?php
use App\Http\Controllers\CobrosController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContractualController;
use App\Http\Controllers\QueriesController;
use App\Http\Controllers\TimeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CommentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/cobros', [CobrosController::class, 'index'])->name('cobros.index');
Route::get('/insert', [CobrosController::class, 'create'])->name('cobros.create');
Route::post('/envio', [CobrosController::class, 'store'])->name('cobros.store');


//Rutas para CRUD de cobros
Route::resource('/cobros', CobrosController::class)->names([
    'store' => 'cobros.store',
    'index' => 'cobros.index',
    'create' => 'cobros.create',
    'edit' => 'cobros.edit',
    'update' => 'cobros.update',
]);

//Rutas para CRUD de servicios
Route::resource('/servicios', ServiceController::class)->names([
    'store' => 'servicios.store',
    'index' => 'servicios.index',
    'create' => 'servicios.create',
    'edit' => 'servicios.edit',
    'update' => 'servicios.update',
    'show' => 'servicios.show',
]);

//Rutas para CRUD de clientes
Route::resource('/clientes', CustomerController::class)->names([
    'store' => 'clientes.store',
    'index' => 'clientes.index',
    'create' => 'clientes.create',
    'show' => 'clientes.show',
    'edit' => 'clientes.edit',
    'update' => 'clientes.update',
]);

//Rutas para CRUD de comentarios
Route::resource('/comentarios', CommentController::class)->names([
    'store' => 'comentarios.store',
    'index' => 'comentarios.index',
    'create' => 'comentarios.create',
    'show' => 'comentarios.show',
    'edit' => 'comentarios.edit',
    'update' => 'comentarios.update',
]);

//Rutas para CRUD de contratos
Route::resource('/contratos', ContractualController::class)->names([
    'store' => 'contratos.store',
    'index' => 'contratos.index',
    'create' => 'contratos.create',
    'edit' => 'contratos.edit',
    'update' => 'contratos.update',
    'show' => 'contratos.show',
]);

//Rutas para CRUD de contratos
Route::resource('/convenios', TimeController::class)->names([
    'store' => 'convenios.store',
    'index' => 'convenios.index',
    'create' => 'convenios.create',
    'edit' => 'convenios.edit',
    'update' => 'convenios.update',
    'show' => 'convenios.show',
]);
//Route::post('/convenios/insert', [TimeController::class, 'insert'])->name('convenios.insert');
Route::get('/convenios/insert/{id}', [TimeController::class, 'insert'])->name('convenios.insert');
Route::get('/clientes/insert/{id}', [CustomerController::class, 'insert'])->name('clientes.insert');
Route::get('/comentarios/insert/{id}', [CommentController::class, 'insert'])->name('comentarios.insert');
Route::get('/servicios/insert/{id}', [ServiceController::class, 'insert'])->name('servicios.insert');

Route::delete('/contratos/{id}/contractual/{contractual_id}/dias/{dias}/monto/{monto}', [TimeController::class, 'destroy']);
Route::delete('/contratos/{customer_id}/service/{id}', [CustomerController::class, 'destroy']);
Route::delete('/contratos/{service_id}/contractual/{id}', [ServiceController::class, 'destroy']);
Route::delete('/contratos/{comment_id}/operation/{id}', [CommentController::class, 'destroy']);


Route::get('/', [QueriesController::class, 'dashboard'])->name('layouts.dashboard');
Route::post('/envio', [QueriesController::class, 'queries'])->name('data.queries');