<?php

use App\Http\Controllers\Api\DeviceController;
use App\Http\Controllers\Api\MapController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\RolesController;
use App\Http\Controllers\Api\PermissionController;
use App\Http\Controllers\Api\ReadController;
use App\Http\Controllers\Api\TownController;
use App\Http\Controllers\Api\NotificationsController;
use App\Http\Controllers\Api\UserInformationController;
use App\Http\Controllers\Api\GasController;
use App\Http\Controllers\Api\HealthyTownController;
use App\Http\Controllers\Api\ZoneController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('login', [AuthController::class,'login']);

Route::group(['middleware' => 'auth:api'], function(){

	Route::get('logout', [AuthController::class,'logout']);

	Route::get('profile', [AuthController::class,'profile']);
	Route::post('change-password', [AuthController::class,'changePassword']);
	Route::post('update-profile', [AuthController::class,'updateProfile']);

    //Ruta obtener municipios
    Route::get('/municipios', [TownController::class,'index']);
    Route::post('/municipios/create', [TownController::class,'store']);
    Route::get('/municipio/{id}', [TownController::class,'show']);
    Route::post('/municipio/update/{id}', [TownController::class,'update']);
    Route::delete('/municipio/delete/{id}', [TownController::class,'destroy']);
    Route::get('/municipio/users/{id}', [TownController::class, 'users']);



    //Ruta obtener zonas
    Route::get('/zonas', [ZoneController::class,'index']);
    Route::post('/zone/create', [ZoneController::class,'store']);
    Route::get('/zone/{id}', [ZoneController::class,'show']);
    Route::post('/zone/update/{id}', [ZoneController::class,'update']);
    Route::delete('/zone/delete/{id}', [ZoneController::class,'destroy']);
    Route::get('/zone/users/{id}', [ZoneController::class, 'users']);


    Route::get('/user/{id}', [UserController::class,'profile']);
    Route::delete('/user/delete/{id}', [UserController::class,'delete']);
    Route::post('user/device/',[UserInformationController::class,'asignarDispositivo']);
    Route::post('/user/update/{id}', [UserController::class, 'update']);

    //Ruta obtener notificaciones
    Route::get('/notificaciones', [NotificationsController::class,'index']);
    Route::get('/notificaciones/user', [NotificationsController::class,'getNotificationsByUser']);
    Route::post('/notificaciones/create', [NotificationsController::class,'store']);
    Route::get('/notificacion/{id}', [NotificationsController::class,'obtenerNotification']);
    Route::post('/notificacion/update/{id}', [NotificationsController::class,'update']);
    Route::delete('/notificacion/delete/{id}', [NotificationsController::class,'destroy']);
    Route::delete('/notificaciones/user', [NotificationsController::class,'eliminarNotificacionesByUser']);

    //Ruta obtener dispositivos
    Route::get('/dispositivos', [DeviceController::class,'index']);
    Route::get('/dispositivos/{id}', [DeviceController::class,'show']);
    Route::post('/dispositivos/create', [DeviceController::class,'store']);
    Route::post('/dispositivos/update/{id}', [DeviceController::class,'update']);
    Route::delete('/dispositivos/delete/{id}', [DeviceController::class,'destroy']);

    //Rutas para gestionar Mediciones - Read
    Route::get('/mediciones', [ReadController::class,'index']);
    Route::post('/medicion/create', [ReadController::class,'store']);
    Route::get('/medicion/{id}', [ReadController::class,'show']);
    Route::delete('/medicion/delete/{id}', [ReadController::class,'destroy']);
    Route::post('/medicion/update/{id}', [ReadController::class, 'update']);
    //Route::get('/mediciones/latest/{nMediciones}',[ReadController::class, 'obtenerUltimasMediciones']);
    Route::get('/mediciones/user', [ReadController::class, 'obtenerUltimasReadsByUser']);
    Route::get('/mediciones/town', [ReadController::class, 'obtenerUltimasReadsByTown']);
    Route::post('/mediciones/date', [ReadController::class, 'obtenerReadsByUserAndDate']);
    Route::get('/mediciones/town/{id}', [ReadController::class, 'getMedicionesByTown']);
    Route::get('/mediciones/convert', [ReadController::class,'convertReadsToObjects']);
    Route::get('/mediciones/convert/filter', [ReadController::class,'convertReadsToObjectsFilter']);


    // Rutas para gestionar healthyTowns
    Route::get('/healthytowns', [HealthyTownController::class,'index']);
    Route::post('/healthytown/create', [HealthyTownController::class,'store']);
    Route::get('/healthytown/{id}', [HealthyTownController::class,'show']);
    Route::delete('/healthytown/delete/{id}', [HealthyTownController::class,'destroy']);

    //Rutas para gestionar guía gases
    Route::get('/gases', [GasController::class, 'index']);
    Route::get('/gas/{id}', [GasController::class, 'show']);

    //only those have manage_user permission will get access
	Route::group(['middleware' => 'checkpermissions'], function(){

        //Rutas para gestionar usuarios
		Route::get('/users', [UserController::class,'list']);
		Route::post('/user/create', [UserController::class,'store']);
		//Route::get('/user/{id}', [UserController::class,'profile']);
		//Route::delete('/user/delete/{id}', [UserController::class,'delete']);
        //Route::post('/user/update/{id}', [UserController::class, 'update']);
		//Route::post('/user/change-role/{id}', [UserController::class,'changeRole']);
        Route::get('/user/latest/{nUsuarios}',[UserController::class,'getUltimosUsuarios']);


        //Rutas para gestionar Roles
        Route::get('/roles', [RolesController::class,'list']);
        Route::post('/role/create', [RolesController::class,'store']);
        Route::get('/role/{id}', [RolesController::class,'show']);
        Route::delete('/role/delete/{id}', [RolesController::class,'delete']);
        Route::post('/role/update/{id}', [RolesController::class, 'update']);
        //Route::post('/role/change-permission/{id}', [RolesController::class,'changePermissions']);

        //Rutas para gestionar permisos
        Route::get('/permisos', [PermissionController::class,'list']);
        Route::post('/permisos/create', [PermissionController::class,'store']);
        Route::get('/permisos/{id}', [PermissionController::class,'show']);
        Route::delete('/permisos/delete/{id}', [PermissionController::class,'delete']);
    });




	//only those have manage_permission permission will get access
	/*Route::group(['middleware' => 'can:manage_permission|manage_user'], function(){
		Route::get('/permissions', [PermissionController::class,'list']);
		Route::post('/permission/create', [PermissionController::class,'store']);
		Route::get('/permission/{id}', [PermissionController::class,'show']);
		Route::get('/permission/delete/{id}', [PermissionController::class,'delete']);
	}); */



});

Route::post('/registroapp', [UserController::class,'store'])->name('register.app');

//Ruta obtener municipios
Route::get('/municipios', [TownController::class,'index']);


//Rutas para gestionar Mediciones - Read
Route::get('/mediciones', [ReadController::class,'index']);
Route::get('/mediciones/latest/{nMediciones}',[ReadController::class, 'obtenerUltimasMediciones']);

//Rutas para mapas
Route::get('/mapa', [MapController::class,'index']);
Route::post('/mapa/create', [MapController::class,'store']);
Route::get('/mapa/{id}', [MapController::class,'show']);
Route::delete('/mapa/delete/{id}', [MapController::class,'destroy']);
