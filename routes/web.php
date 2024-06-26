<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchPrestadorController;
use App\Http\Controllers\ServicoController;
use App\Http\Controllers\GeoLocationController;
use App\Http\Controllers\AutenticacaoController;
use App\Http\Controllers\UsuarioController;

Route::get('/users', [UsuarioController::class, 'index']);
Route::post('/createUsers', [UsuarioController::class, 'store']);
Route::get('/users/{id}', [UsuarioController::class, 'show']);
Route::put('/users/{id}', [UsuarioController::class, 'update']);
Route::delete('/users/{id}', [UsuarioController::class, 'destroy']);



Route::post('/login', [AutenticacaoController::class, 'login']);
Route::get('/index', [AutenticacaoController::class, 'index']);


Route::group(['middleware' => 'jwt.auth'], function () {

    Route::get('/BuscarServico', [ServicoController::class, 'show']);
    Route::post('/BuscarPrestador', [SearchPrestadorController::class, 'searchPrestador']);
    Route::get('/BuscarCoordenadas', [GeoLocationController::class, 'getGeolocation']);
    Route::Get('/buscarGeolocalizacao', [GeoLocationController::class, 'buscarGeolocalizacao']);
});



