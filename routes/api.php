<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\RolesController;
use App\Http\Controllers\Api\PermissionController;
use App\Http\Controllers\Api\ReadController;
use App\Http\Controllers\Api\TownController;
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


    Route::get('/user/{id}', [UserController::class,'profile']);
    Route::delete('/user/delete/{id}', [UserController::class,'delete']);
    Route::post('/user/update/{id}', [UserController::class, 'update']);

    //Ruta obtener municipios
    Route::get('/municipios', [TownController::class,'index']);

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

        //Rutas para gestionar Mediciones - Read
        Route::get('/mediciones', [ReadController::class,'index']);
        Route::post('/medicion/create', [ReadController::class,'store']);
        Route::get('/medicion/{id}', [ReadController::class,'show']);
        Route::delete('/medicion/delete/{id}', [ReadController::class,'destroy']);
        Route::post('/medicion/update/{id}', [ReadController::class, 'update']);
        Route::get('/mediciones/latest/{nMediciones}',[ReadController::class, 'obtenerUltimasMediciones']);

        //Rutas para gestionar Roles
        Route::get('/roles', [RolesController::class,'list']);
        Route::post('/role/create', [RolesController::class,'store']);
        Route::get('/role/{id}', [RolesController::class,'show']);
        Route::delete('/role/delete/{id}', [RolesController::class,'delete']);
        Route::post('/role/update/{id}', [RolesController::class, 'update']);
        //Route::post('/role/change-permission/{id}', [RolesController::class,'changePermissions']);

	});



	//only those have manage_permission permission will get access
	Route::group(['middleware' => 'can:manage_permission|manage_user'], function(){
		Route::get('/permissions', [PermissionController::class,'list']);
		Route::post('/permission/create', [PermissionController::class,'store']);
		Route::get('/permission/{id}', [PermissionController::class,'show']);
		Route::get('/permission/delete/{id}', [PermissionController::class,'delete']);
	});



});

Route::post('/registroapp', [UserController::class,'store'])->name('register.app');

//Rutas para gestionar Mediciones - Read
Route::get('/mediciones', [ReadController::class,'index']);
Route::get('/mediciones/latest/{nMediciones}',[ReadController::class, 'obtenerUltimasMediciones']);
