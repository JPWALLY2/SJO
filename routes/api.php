<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::POST('usuarios/cadastrar', [UsuarioController::class, 'store']);

// rotas admin
// Route::group(['prefix' => 'admin'], function () {
    // Route::resource('usuarios', UsuarioController::class);
    // Route::resource('times', TimesController::class);
    // Route::get('/', [TimesController::class, 'index']);
// });