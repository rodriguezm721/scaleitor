<?php
use App\Http\Controllers\CobrosController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContractualController;
use App\Http\Controllers\QueriesController;
use App\Http\Controllers\TimeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AdvanceController;
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

/*Route::get('/contratos', [ContractualController::class, 'index'])->name('contratos.index');*/
Route::get('/contratosamb', [ContractualController::class, 'index2'])->name('contratos.index2');
Route::get('/contratossup', [ContractualController::class, 'index3'])->name('contratos.index3');
Route::get('/contratoscons', [ContractualController::class, 'index4'])->name('contratos.index4');

//Rutas para CRUD de contratos
Route::resource('/convenios', TimeController::class)->names([
    'store' => 'convenios.store',
    'index' => 'convenios.index',
    'create' => 'convenios.create',
    'edit' => 'convenios.edit',
    'update' => 'convenios.update',
    'show' => 'convenios.show',
]);

//Rutas para CRUD de avances
Route::resource('/avances', AdvanceController::class)->names([
    'store' => 'avances.store',
    'index' => 'avances.index',
    'create' => 'avances.create',
    'edit' => 'avances.edit',
    'update' => 'avances.update',
    'show' => 'avances.show',
]);
//Route::post('/convenios/insert', [TimeController::class, 'insert'])->name('convenios.insert');
Route::get('/convenios/insert/{id}', [TimeController::class, 'insert'])->name('convenios.insert');
Route::get('/clientes/insert/{service_id}/{id}', [CustomerController::class, 'insert'])->name('clientes.insert');
Route::get('/comentarios/insert/{service_id}/{id}', [CommentController::class, 'insert'])->name('comentarios.insert');
Route::get('/servicios/insert/{id}', [ServiceController::class, 'insert'])->name('servicios.insert');
Route::get('/avances/insert/{id}', [AdvanceController::class, 'insert'])->name('avances.insert');
Route::get('/cobros/insert/{id}', [CobrosController::class, 'insert'])->name('cobros.insert');

Route::delete('/contratos/{id}/contractual/{contractual_id}/dias/{dias}/monto/{monto}', [TimeController::class, 'destroy']);
Route::delete('/contratos/{customer_id}/service/{id}', [CustomerController::class, 'destroy']);
Route::delete('/contratos/{service_id}/contractual/{id}', [ServiceController::class, 'destroy']);
Route::delete('/contratos/{comment_id}/operation/{id}', [CommentController::class, 'destroy']);
Route::delete('/contratos/{avance_id}/contrato/{id}', [AdvanceController::class, 'destroy']);
Route::delete('/contratos/{cobro_id}/contract/{id}', [CobrosController::class, 'destroy']);


Route::get('/', [QueriesController::class, 'dashboard'])->name('layouts.dashboard');
Route::post('/envio', [QueriesController::class, 'queries'])->name('data.queries');