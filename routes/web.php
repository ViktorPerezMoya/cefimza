<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Test;
use App\Livewire\Register;
use App\Livewire\Login;
use App\Livewire\Logout;
use App\Livewire\Dashboard;
use App\Livewire\Admin\EquipoAbm;
use App\Livewire\Admin\UsuariosAbm;
use App\Livewire\Admin\UsuariosForm;
use App\Livewire\Admin\Configuracion;
use App\Livewire\Admin\Secciones\SeccionesAbm;
use App\Livewire\Admin\Secciones\FormSeccion;
use App\Livewire\Admin\Secciones\RedactarSeccion;
use App\Livewire\Admin\Secciones\VistaPrevia;
use App\Livewire\Admin\TarjetasListado;
use App\Livewire\Admin\TarjetasForm;
use App\Livewire\Admin\NotasListado;
use App\Livewire\Admin\NotasForm;
use App\Livewire\Admin\DatosListado;
use App\Livewire\Admin\DatosForm;
use App\Livewire\Admin\IntegranteForm;
use App\Livewire\Admin\ParametrosAbm;
use App\Livewire\Admin\ParametrosForm;
use App\Http\Controllers\IndexController;
use App\Http\Middleware\InterceptorMiddleware;

Route::get('/', [IndexController::class,'index'])->middleware(InterceptorMiddleware::class);
Route::get('/informes', [IndexController::class,'informes'])->middleware(InterceptorMiddleware::class);
Route::get('/informe/{url}', [IndexController::class,'informe'])->middleware(InterceptorMiddleware::class);

Route::get('/test',                 Test::class);

Route::prefix('auth')->middleware(['guest'])->group(function(){
    Route::get('/register',         Register::class)->name('register');
    Route::get('/login',            Login::class)->name('login');
});

Route::prefix('admin')->middleware(['auth'])->group(function(){
    Route::get('/logout',           Logout::class)->name('logout');
    Route::get('/',                 Dashboard::class)->name('admin-home');
    Route::get('/dashboard',        Dashboard::class)->name('dashboard');
    Route::get('/configuracion',    Configuracion::class)->name('configuracion');

    Route::get('/secciones',        SeccionesAbm::class)->name('secciones');
    Route::get('/nueva-seccion',    FormSeccion::class)->name('nueva-seccion');
    Route::get('/editar-seccion/{id}',    FormSeccion::class)->name('editar-seccion');
    Route::get('/redactar-seccion/{id}',    RedactarSeccion::class)->name('redactar-seccion');
    Route::get('/vista-previa/{id}',    VistaPrevia::class)->name('vista-previa');

    Route::get('/tarjetas/{idseccion}',    TarjetasListado::class)->name('tarjetas');
    Route::get('/tarjetas/nueva/{idseccion}',    TarjetasForm::class)->name('tarjetas-nueva');
    Route::get('/tarjetas/editar/{id}',    TarjetasForm::class)->name('tarjetas-editar');

    Route::get('/notas/{idseccion}',    NotasListado::class)->name('notas');
    Route::get('/notas/nueva/{idseccion}',    NotasForm::class)->name('notas-nueva');
    Route::get('/notas/editar/{id}',    NotasForm::class)->name('notas-editar');

    Route::get('/datos/{idseccion}',    DatosListado::class)->name('datos');
    Route::get('/datos/nuevo/{idseccion}',    DatosForm::class)->name('datos-nuevo');
    Route::get('/datos/editar/{id}',    DatosForm::class)->name('datos-editar');

    Route::get('/equipo',                           EquipoAbm::class)->name('equipo');
    Route::get('/equipo/integrante/nuevo',          IntegranteForm::class)->name('integrante-nuevo');
    Route::get('/equipo/integrante/editar/{id}',    IntegranteForm::class)->name('integrante-editar');

    Route::get('/parametros',       ParametrosAbm::class)->name('parametros');
    Route::get('/parametros/nuevo',          ParametrosForm::class)->name('parametros-nuevo');
    Route::get('/parametros/editar/{id}',    ParametrosForm::class)->name('parametros-editar');

    Route::get('/usuarios',         UsuariosAbm::class)->name('usuarios');
    Route::get('/usuarios/nuevo',          UsuariosForm::class)->name('usuarios-nuevo');
    Route::get('/usuarios/editar/{id}',    UsuariosForm::class)->name('usuarios-editar');
});
