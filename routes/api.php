<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\ProjectController;

Route::post('login',    [AuthController::class, 'login']); // Login route   
Route::post('/forgot-password', [AuthController::class, 'forgotPassword']);
Route::post('/reset-password', [AuthController::class, 'resetPassword']);
Route::prefix('auth/')
    ->controller(AuthController::class)
    ->group(function () { // Protected routes
    Route::get('users', 'getAllUsers'); // Get all users route
    Route::get('me','getConnected'); // Get authenticated/connected user
    Route::post('register', 'createUser'); // Register route 
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
    ->controller(ProjectController::class)
    ->group(function () {
    Route::post('new', 'create');
    Route::get('all', 'index');
    Route::put('update/{id}', 'update');
    Route::delete('delete/{id}', 'delete');
});