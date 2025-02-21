<?php

use App\Http\Controllers\Api\AlumnoController;
use App\Http\Controllers\Api\AsignaturaController;
use App\Http\Controllers\Api\CategoriaAsignaturaController;
use App\Http\Controllers\Api\CicloController;
use App\Http\Controllers\Api\ExpedienteController;
use App\Http\Controllers\Api\HorarioController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\ProfesorController;
use App\Http\Controllers\Api\ProfesorAsignaturaController;
use App\Http\Controllers\Api\SeccionController;
use App\Http\Controllers\Api\GradoController;
use App\Http\Controllers\Api\PasswordController;
use App\Http\Controllers\Api\SituacionIngresoController;
use App\Http\Controllers\Api\EstadoSolicitudController;
use App\Http\Controllers\Api\SolicitudInscripcionController;
use App\Http\Controllers\Api\PeriodoController;
use App\Http\Controllers\Api\NotasAsignaturaController;
use App\Http\Controllers\Api\UsuarioController;
use Illuminate\Support\Facades\Route;
use Orion\Facades\Orion;

/*Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');*/

//LOGIN
Route::post('/login',[LoginController::class,'login']);

//rutas para catalogos
Route::group(['prefix' => 'catalogos'],function(){

    Orion::resource('categoria-asignatura', CategoriaAsignaturaController::class)->only('index');
    Orion::resource('asignatura', AsignaturaController::class)->only('index');
    Orion::resource('ciclos',CicloController::class)->only('index');
    Orion::resource('horarios',HorarioController::class)->only('index');
    Orion::resource('secciones',SeccionController::class)->only('index');
    //Orion::resource('grados', GradoController::class)->only('index');
    Orion::resource('situacion_ingreso',SituacionIngresoController::class)->only('index');
    Orion::resource('estado_solicitud',EstadoSolicitudController::class)->only('index');
//    Orion::resource('solicitud-inscripcion',SolicitudInscripcionController::class)->only('store');
    //Mantenimiento y filtros Catalogos
    Route::group(['middleware' => ['auth:sanctum']],function(){
        Orion::resource('asignatura',AsignaturaController::class)->only('store','update','delete','restore','search');
        Orion::resource('horarios',HorarioController::class)->only('store','update','delete','restore');
        Orion::resource('secciones',SeccionController::class)->only('store','update','delete','restore','search');
        Orion::resource('grados',GradoController::class);
        Orion::resource('categoria-asignatura',CategoriaAsignaturaController::class)->only('store','update');
    });
});

//rutas solicitud inscripcion
Route::group(['prefix' => 'solicitud-inscripcion'],function(){
    Orion::resource('solicitud',SolicitudInscripcionController::class)->only('store');

    Route::group(['middleware' => ['auth:sanctum']],function(){
       Orion::resource('inscripcion',SolicitudInscripcionController::class)->only('update');
    });
});

//rutas notas y periodos alumnos
Route::group(['prefix' => 'notas' ,'middleware' => ['auth:sanctum']],function(){
    Orion::resource('mis-notas', NotasAsignaturaController::class)->only('show');
    Orion::resource('alumnos-notas', NotasAsignaturaController::class);
    Orion::resource('periodo', PeriodoController::class)->only('store','update','delete','restore','search', 'index', 'show');
});

//Rutas usuarios del sistema
Route::group(['middleware' => ['auth:sanctum']],function(){
    Orion::resource('profesor', ProfesorController::class);
    Orion::resource('profesor-asignatura', ProfesorAsignaturaController::class);
    Orion::resource('alumno', AlumnoController::class);
    Orion::resource('expediente', ExpedienteController::class);

    //cambio de contraseña
    Route::post('change-password',[PasswordController::class,'changePassword']);

    Route::group(['prefix' => 'usuario'],function(){
        Route::get('/',[UsuarioController::class,'getUsuario']);
    });
});
