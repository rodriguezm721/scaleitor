<?php
use App\Http\Controllers\CobrosController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContractualController;
use App\Http\Controllers\TimeController;


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

Route::get('/', function () {
    return view('layouts/dashboard');
});

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

//Rutas para CRUD de contratos
Route::resource('/contratos', ContractualController::class)->names([
    'store' => 'contratos.store',
    'index' => 'contratos.index',
    'create' => 'contratos.create',
    'edit' => 'contratos.edit',
    'update' => 'contratos.update',
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
Route::delete('/convenios/{id}/contractual/{contractual_id}/dias/{dias}/monto/{monto}', [TimeController::class, 'destroy']);

