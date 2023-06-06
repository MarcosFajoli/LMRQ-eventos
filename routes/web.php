<?php

use Illuminate\Support\Facades\Route;

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

use App\Http\Controllers\EventController;

Route::get('/', [EventController::class, 'index']);
Route::get('/eventos', [EventController::class, 'showAll']);
Route::get('/eventos/criar', [EventController::class, 'create'])->middleware('auth');
Route::get('/eventos/presencas', [EventController::class, 'showPresences'])->middleware('auth');
Route::get('/eventos/{id}', [EventController::class, 'showOne']);
Route::get('/eventos/editar/{id?}', [EventController::class, 'edit'])->middleware('auth');
Route::get('/dashboard', [EventController::class, 'dashboard'])->middleware('auth');

Route::post('/eventos', [EventController::class, 'store']);
Route::post('/eventos/participar/{id}', [EventController::class, 'join'])->middleware('auth');

Route::put('/eventos/editar/{id}', [EventController::class, 'update'])->middleware('auth');

Route::delete('/eventos/{id}', [EventController::class, 'destroy'])->middleware('auth');
Route::delete('/eventos/cancelar/{id}', [EventController::class, 'leave'])->middleware('auth');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [EventController::class, 'dashboard']);
});
