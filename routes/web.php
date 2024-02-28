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
use App\Http\Controllers\SessionController;
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


Route::post('/login', [SessionController::class, 'authenticate'])->name('login.authenticate')->middleware('guest');
Route::post('/register-data', [SessionController::class, 'register'])->name('login.register')->middleware('guest');
Route::post('/logout', [SessionController::class, 'logout'])->name('session.logout')->middleware('auth');

Route::get('/', [QueriesController::class, 'signin'])->name('auth.signin')->middleware('guest');
Route::get('/register', [QueriesController::class, 'register'])->name('auth.register')->middleware('guest');

Route::post('/envio', [QueriesController::class, 'queries'])->name('data.queries')->middleware('auth');

Route::get('/dashboard', [QueriesController::class, 'dashboard'])->name('dashboard')->middleware('auth');


//Rutas para CRUD de cobros
Route::resource('/cobros', CobrosController::class)->names([
    'store' => 'cobros.store',
    'index' => 'cobros.index',
    'create' => 'cobros.create',
    'edit' => 'cobros.edit',
    'update' => 'cobros.update',
])->middleware('auth');

//Rutas para CRUD de servicios
Route::resource('/servicios', ServiceController::class)->names([
    'store' => 'servicios.store',
    'index' => 'servicios.index',
    'create' => 'servicios.create',
    'edit' => 'servicios.edit',
    'update' => 'servicios.update',
    'show' => 'servicios.show',
])->middleware('auth');

//Rutas para CRUD de clientes
Route::resource('/clientes', CustomerController::class)->names([
    'store' => 'clientes.store',
    'index' => 'clientes.index',
    'create' => 'clientes.create',
    'show' => 'clientes.show',
    'edit' => 'clientes.edit',
    'update' => 'clientes.update',
])->middleware('auth');

//Rutas para CRUD de comentarios
Route::resource('/comentarios', CommentController::class)->names([
    'store' => 'comentarios.store',
    'index' => 'comentarios.index',
    'create' => 'comentarios.create',
    'show' => 'comentarios.show',
    'edit' => 'comentarios.edit',
    'update' => 'comentarios.update',
])->middleware('auth');

//Rutas para CRUD de contratos
Route::resource('/contratos', ContractualController::class)->names([
    'store' => 'contratos.store',
    'index' => 'contratos.index',
    'create' => 'contratos.create',
    'edit' => 'contratos.edit',
    'update' => 'contratos.update',
    'show' => 'contratos.show',
])->middleware('auth');

/*Route::get('/contratos', [ContractualController::class, 'index'])->name('contratos.index');*/
Route::get('/contratosamb', [ContractualController::class, 'index2'])->name('contratos.index2')->middleware('auth');
Route::get('/contratossup', [ContractualController::class, 'index3'])->name('contratos.index3')->middleware('auth');
Route::get('/contratoscons', [ContractualController::class, 'index4'])->name('contratos.index4')->middleware('auth');

//Rutas para CRUD de contratos
Route::resource('/convenios', TimeController::class)->names([
    'store' => 'convenios.store',
    'index' => 'convenios.index',
    'create' => 'convenios.create',
    'edit' => 'convenios.edit',
    'update' => 'convenios.update',
    'show' => 'convenios.show',
])->middleware('auth');

//Rutas para CRUD de avances
Route::resource('/avances', AdvanceController::class)->names([
    'store' => 'avances.store',
    'index' => 'avances.index',
    'create' => 'avances.create',
    'edit' => 'avances.edit',
    'update' => 'avances.update',
    'show' => 'avances.show',
])->middleware('auth');
//Route::post('/convenios/insert', [TimeController::class, 'insert'])->name('convenios.insert');
Route::get('/convenios/insert/{id}', [TimeController::class, 'insert'])->name('convenios.insert')->middleware('auth');
Route::get('/clientes/insert/{service_id}/{id}', [CustomerController::class, 'insert'])->name('clientes.insert')->middleware('auth');
Route::get('/comentarios/insert/{service_id}/{id}', [CommentController::class, 'insert'])->name('comentarios.insert')->middleware('auth');
Route::get('/servicios/insert/{id}', [ServiceController::class, 'insert'])->name('servicios.insert')->middleware('auth');
Route::get('/avances/insert/{id}', [AdvanceController::class, 'insert'])->name('avances.insert')->middleware('auth');
Route::get('/cobros/insert/{id}', [CobrosController::class, 'insert'])->name('cobros.insert')->middleware('auth');

Route::delete('/contratos/{id}/contractual/{contractual_id}', [TimeController::class, 'destroy'])->middleware('auth');
Route::delete('/contratos/{customer_id}/service/{id}', [CustomerController::class, 'destroy'])->middleware('auth');
Route::delete('/contratos/{service_id}/contractuals/{id}', [ServiceController::class, 'destroy'])->middleware('auth');
Route::delete('/contratos/{comment_id}/operation/{id}', [CommentController::class, 'destroy'])->middleware('auth');
Route::delete('/contratos/{avance_id}/contrato/{id}', [AdvanceController::class, 'destroy'])->middleware('auth');
Route::delete('/contratos/{cobro_id}/contract/{id}', [CobrosController::class, 'destroy'])->middleware('auth');


Route::post('/status', [ContractualController::class, 'status'])->name('contratos.status')->middleware('auth');