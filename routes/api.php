<?php

use App\Http\Controllers\Api\ActiviteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ComposanteController;
use App\Http\Controllers\Api\IndicateurController;
use App\Http\Controllers\Api\MparamagregController;
use App\Http\Controllers\Api\ParamagregController;
use App\Http\Controllers\Api\ProjetController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\SousComposanteController;

Route::post('login',    [AuthController::class, 'login']); // Login route   
Route::post('/forgot-password', [AuthController::class, 'forgotPassword']);
Route::post('/reset-password', [AuthController::class, 'resetPassword']);
Route::post('register', [ AuthController::class, 'createUser']); // Register route 

Route::prefix('auth/')
    ->controller(AuthController::class)
    ->group(function () { // Protected routes
    Route::get('users', 'getAllUsers'); // Get all users route
    Route::get('me','getConnected'); // Get authenticated/connected user
    Route::post('/change-password', 'changePassword'); // Change password route
    Route::put('update-profile', 'updateProfile'); // Update profile route
    Route::post('logout','logout'); // Logout route
    Route::post('assign-role', 'assignRoleToUser'); // Assign role to user
    Route::delete('remove-role', 'removeRoleFromUser'); // Remove role from user
});

Route::middleware('auth:api')
    ->prefix('role/')
    ->controller(RoleController::class)
    ->group(function () {
    Route::post('','createRole');
    Route::get('all','index');
    Route::get('{role}','showRole');
    Route::put('update/{id}','updateRole');
    Route::delete('delete/{id}','destroyRole');

});

Route::prefix('projet/')
    ->middleware('auth:api')
    ->controller(ProjetController::class)
    ->group(function () {
    Route::post('new', 'create');
    Route::get('all', 'index');
    Route::put('update/{id}', 'update');
    Route::delete('delete/{id}', 'delete');
});

Route::prefix('composante/')
    ->middleware('auth:api')
    ->controller(ComposanteController::class)
    ->group(function () {
    Route::post('new', 'create');
    Route::get('all', 'index');
    Route::put('update/{id}', 'update');
    Route::delete('delete/{id}', 'delete');
});

Route::prefix('souscomposante/')
    ->middleware('auth:api')
    ->controller(SousComposanteController::class)
    ->group(function () {
    Route::post('new', 'create');
    Route::get('all', 'index');
    Route::put('update/{id}', 'update');
    Route::delete('delete/{id}', 'delete');
});

Route::prefix('activite/')
    ->middleware('auth:api')
    ->controller(ActiviteController::class)
    ->group(function () {
    Route::post('new', 'create');
    Route::get('all', 'index');
    Route::put('update/{id}', 'update');
    Route::delete('delete/{id}', 'delete');
});

Route::prefix('indicateur/')
    ->middleware('auth:api')
    ->controller(IndicateurController::class)
    ->group(function () {
    Route::post('new', 'create');
    Route::get('all', 'index');
    Route::put('update/{id}', 'update');
    Route::delete('delete/{id}', 'delete');
});

Route::prefix('mparamagreg/')
    ->middleware('auth:api')
    ->controller(MparamagregController::class)
    ->group(function () {
    Route::post('new', 'create');
    Route::get('all', 'index');
    Route::put('update/{id}', 'update');
    Route::delete('delete/{id}', 'delete');
});

Route::prefix('paramagreg/')
    ->middleware('auth:api')
    ->controller(ParamagregController::class)
    ->group(function () {
    Route::post('new', 'create');
    Route::get('all', 'index');
    Route::put('update/{id}', 'update');
    Route::delete('delete/{id}', 'delete');
});