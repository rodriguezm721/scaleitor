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
use App\Http\Controllers\ForgotPasswordController;
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

//Inicio de sesion
Route::post('/login', [SessionController::class, 'authenticate'])->name('login.authenticate')->middleware('guest');
Route::post('/register-data', [SessionController::class, 'register'])->name('login.register')->middleware('guest');
//Cierre de sesion
Route::post('/logout', [SessionController::class, 'logout'])->name('session.logout')->middleware(['auth','role:admin|editor|lector']);
//Inicio de aplicacion
Route::get('/', [QueriesController::class, 'signin'])->name('auth.signin')->middleware('guest');
Route::get('/register', [QueriesController::class, 'register'])->name('auth.register')->middleware('guest');
//Consulta del dashboard que muestra modal y resultado de consulta
Route::post('/consulta', [QueriesController::class, 'show'])->name('consulta.show')->middleware(['auth','role:admin|editor|lector']);
//Vista del dashboard
Route::get('/dashboard', [QueriesController::class, 'dashboard'])->name('dashboard')->middleware(['auth','check.role:admin|editor|lector']);
//Recuperacion de contraseña
Route::get('forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
//Ruta para cambio de estatus del contrato
Route::post('/status', [ContractualController::class, 'status'])->name('contratos.status')->middleware(['auth','role:admin|editor']);


//Rutas para CRUD de cobros
Route::resource('/cobros', CobrosController::class)->names([
    'store' => 'cobros.store',
    'edit' => 'cobros.edit',
    'update' => 'cobros.update',
])->middleware(['auth','role:admin|editor']);

//Rutas para CRUD de servicios
Route::resource('/servicios', ServiceController::class)->names([
    'store' => 'servicios.store',
    'index' => 'servicios.index',
    'create' => 'servicios.create',
    'edit' => 'servicios.edit',
    'update' => 'servicios.update',
    'show' => 'servicios.show',
])->middleware(['auth','role:admin|editor']);

//Rutas para CRUD de clientes
Route::resource('/clientes', CustomerController::class)->names([
    'store' => 'clientes.store',
    'create' => 'clientes.create',
    'show' => 'clientes.show',
    'edit' => 'clientes.edit',
    'update' => 'clientes.update',
])->middleware(['auth','role:admin|editor']);

//Rutas para CRUD de comentarios
Route::resource('/comentarios', CommentController::class)->names([
    'store' => 'comentarios.store',
    'show' => 'comentarios.show',
])->middleware(['auth','role:admin|editor|lector']);

//Rutas para CRUD de contratos
/*Route::resource('/contratos', ContractualController::class)->names([
    'store' => 'contratos.store',
    'index' => 'contratos.index',
    'create' => 'contratos.create',
    'edit' => 'contratos.edit',
    'update' => 'contratos.update',
])->middleware(['auth','role:admin|editor|lector']);

Route::get('/contratos', [ContractualController::class, 'show'])->name('contratos.show')->middleware(['auth','role:admin|editor|lector']);
*/

Route::middleware(['auth'])->group(function () {
    // Ruta para mostrar el formulario de creación
    Route::get('/contratos/create', [ContractualController::class, 'create'])
        ->name('contratos.create')
        ->middleware('role:admin|editor|');

    // Ruta para almacenar un nuevo contrato
    Route::post('/contratos', [ContractualController::class, 'store'])
        ->name('contratos.store')
        ->middleware('role:admin|editor|');

    // Ruta para mostrar todos los contratos
    Route::get('/contratos', [ContractualController::class, 'index'])
        ->name('contratos.index')
        ->middleware('role:admin|editor|');

    // Ruta para mostrar un contrato específico
    Route::get('/contratos/{contrato}', [ContractualController::class, 'show'])
        ->name('contratos.show')
        ->middleware('role:admin|editor|lector');

    // Ruta para mostrar el formulario de edición de un contrato
    Route::get('/contratos/{contrato}/edit', [ContractualController::class, 'edit'])
        ->name('contratos.edit')
        ->middleware('role:admin|editor');

    // Ruta para actualizar un contrato existente
    Route::put('/contratos/{contrato}', [ContractualController::class, 'update'])
        ->name('contratos.update')
        ->middleware('role:admin|editor');

    // Puedes agregar más rutas aquí con middleware personalizado si es necesario
});


/*Route::get('/contratos', [ContractualController::class, 'index'])->name('contratos.index');*/
Route::get('/contratosamb', [ContractualController::class, 'index2'])->name('contratos.index2')->middleware(['auth','role:admin|editor']);
Route::get('/contratossup', [ContractualController::class, 'index3'])->name('contratos.index3')->middleware(['auth','role:admin|editor']);
Route::get('/contratoscons', [ContractualController::class, 'index4'])->name('contratos.index4')->middleware(['auth','role:admin|editor']);

//Rutas para CRUD de contratos
Route::resource('/convenios', TimeController::class)->names([
    'store' => 'convenios.store',
    'edit' => 'convenios.edit',
    'update' => 'convenios.update',
    'show' => 'convenios.show',
])->middleware(['auth','role:admin|editor']);

//Rutas para CRUD de avances
Route::resource('/avances', AdvanceController::class)->names([
    'store' => 'avances.store',
    'edit' => 'avances.edit',
    'update' => 'avances.update',
])->middleware(['auth','role:admin|editor']);

//Route::post('/convenios/insert', [TimeController::class, 'insert'])->name('convenios.insert');
Route::get('/convenios/insert/{id}', [TimeController::class, 'insert'])->name('convenios.insert')->middleware(['auth','role:admin|editor']);
Route::get('/clientes/insert/{service_id}/{id}', [CustomerController::class, 'insert'])->name('clientes.insert')->middleware(['auth','role:admin|editor']);
Route::get('/comentarios/insert/{service_id}/comment_id/{id}', [CommentController::class, 'insert'])->name('comentarios.insert')->middleware(['auth','role:admin|editor|lector']);
Route::get('/servicios/insert/{id}', [ServiceController::class, 'insert'])->name('servicios.insert')->middleware(['auth','role:admin|editor']);
Route::get('/avances/insert/{id}', [AdvanceController::class, 'insert'])->name('avances.insert')->middleware(['auth','role:admin|editor']);
Route::get('/cobros/insert/{id}', [CobrosController::class, 'insert'])->name('cobros.insert')->middleware(['auth','role:admin|editor']);

Route::delete('/contratos/{id}/contractual/{contractual_id}', [TimeController::class, 'destroy'])->middleware(['auth','role:admin|editor']);
Route::delete('/contratos/{customer_id}/service/{id}', [CustomerController::class, 'destroy'])->middleware(['auth','role:admin|editor']);
Route::delete('/contratos/{service_id}/contractuals/{id}', [ServiceController::class, 'destroy'])->middleware(['auth','role:admin|editor']);
Route::delete('/contratos/{comment_id}/operation/{id}', [CommentController::class, 'destroy'])->middleware(['auth','role:admin|editor|lector']);
Route::delete('contratos/{avance_id}/contrato/{id}', [AdvanceController::class, 'destroy'])->middleware(['auth','role:admin|editor']);
Route::delete('/contratos/{cobro_id}/contract/{id}', [CobrosController::class, 'destroy'])->middleware(['auth','role:admin|editor']);
Route::delete('/contratos/{contrato_id}', [ContractualController::class, 'destroy'])->middleware(['auth','role:admin|editor']);