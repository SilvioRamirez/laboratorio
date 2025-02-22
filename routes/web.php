<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BioanalistaController;
use App\Http\Controllers\ConfiguracionController;
use App\Http\Controllers\ExamenController;
use App\Http\Controllers\MuestraController;
use Illuminate\Support\Facades\URL;


/* URL::forceScheme('https'); */

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
    return view('landing.index');
});

Route::get('/ninia', function () {
    return view('san.index');
});

// Login and Logout Routes...
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class,'login']);
Route::post('logout',  [LoginController::class,'logout'])->name('logout');

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function() {

    //Rutas de Configuracion
    Route::resource('configuracions', ConfiguracionController::class);
    
    //Rutas de Roles
    Route::get('/roles/{role}/delete',  [RoleController::class, 'delete'])->name('roles.delete');
    Route::resource('roles',            RoleController::class);

    //Rutas de Usuarios
    Route::get('/users/{user}/delete',  [UserController::class, 'delete'])->name('users.delete');
    Route::get('/users/ajax/create',    [UserController::class, 'ajax_create'])->name('users.ajax.create');
    Route::resource('users',            UserController::class);

    //Rutas de Productos
    Route::get('/products/{product}/delete',    [ProductController::class, 'delete'])->name('products.delete');
    Route::resource('products',                 ProductController::class);

    //Rutas de Pacientes y Resultados
    Route::get('/pacientes/{paciente}/resultados',  [PacienteController::class, 'resultados_index'])->name('pacientes.resultados.index');
    Route::post('/pacientes/resultados/store',      [PacienteController::class, 'resultados_store'])->name('pacientes.resultados.store');
    Route::get('/pacientes/resultados/destroy/{id}',[PacienteController::class, 'resultados_destroy'])->name('pacientes.resultados.destroy');

    //Rutas de ResultadosDetalle
    Route::get('/pacientes/resultado/{resultado}/resultado_detalle/',       [PacienteController::class, 'resultados_detalle_index'])->name('pacientes.resultados.detalles.index');
    Route::post('/pacientes/resultado/resultado_detalle/store/',            [PacienteController::class, 'resultados_detalle_store'])->name('pacientes.resultados.detalles.store');
    Route::get('/pacientes/resultado/{resultado}/resultado_detalle/print/', [PacienteController::class, 'resultados_detalle_print'])->name('pacientes.resultados.detalles.print');
    Route::get('/pacientes/resultado/{resultado}/resultado_detalle/pdf/',   [PacienteController::class, 'resultados_detalle_pdf'])->name('pacientes.resultados.detalles.pdf');
    Route::get('/pacientes/resultado/{resultado}/resultado_detalle/cola/',  [PacienteController::class, 'resultados_detalle_cola'])->name('pacientes.resultados.detalles.cola');
    Route::get('/pacientes/resultado/{resultado}/resultado_detalle/cola/delete',        [PacienteController::class, 'resultados_detalle_cola_delete'])->name('pacientes.resultados.detalles.cola.delete');
    
    Route::get('/pacientes/{paciente}/cola/delete',  [PacienteController::class, 'paciente_resultados_cola_vaciar'])->name('paciente.resultados.cola.vaciar');
    Route::get('/pacientes/{paciente}/cola/pdf',     [PacienteController::class, 'paciente_resultados_cola_pdf'])->name('pacientes.resultados.cola.pdf');
    Route::get('/pacientes/{paciente}/delete',    [PacienteController::class, 'delete'])->name('pacientes.delete');
    Route::resource('pacientes',                PacienteController::class);

    //Rutas de Bioanalistas
    Route::get('/bioanalistas/{bioanalista}/delete',    [BioanalistaController::class, 'delete'])->name('bioanalistas.delete');
    Route::resource('bioanalistas',                     BioanalistaController::class);

    //Rutas de Muestras
    Route::get('/muestras/{muestra}/delete',    [MuestraController::class, 'delete'])->name('muestras.delete');
    Route::resource('muestras',                 MuestraController::class);

    //Rutas de Examenes y sus Caracteristicas
    Route::get('/examenes/{examen}/delete',                 [ExamenController::class, 'delete'])->name('examenes.delete');
    Route::get('/examenes/{examen}/caracteristicas',        [ExamenController::class, 'caracteristicas_index'])->name('examenes.caracteristicas');
    Route::post('/examenes/caracteristicas/store',          [ExamenController::class, 'caracteristicas_store'])->name('examenes.caracteristicas.store');
    Route::get('/examenes/caracteristicas/destroy/{id}',    [ExamenController::class, 'caracteristicas_destroy'])->name('examenes.caracteristicas.destroy');
    Route::get('/examenes/caracteristicas/edit/{id}',       [ExamenController::class, 'caracteristicas_edit'])->name('examenes.caracteristicas.edit');
    Route::patch('/examenes/caracteristicas/update/{id}',   [ExamenController::class, 'caracteristicas_update'])->name('examenes.caracteristicas.update');
    Route::resource('examenes',                             ExamenController::class);

});