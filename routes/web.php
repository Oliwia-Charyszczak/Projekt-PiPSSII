<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\UserController;

Route::get('/user/{username}', [ProfileController::class, 'show']);


Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, "show"])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/user/{id}', [UserController::class, 'getUser'])->name('getUser');
Route::post('/user', [UserController::class, 'createUser'])->name('createUser');


Route::get('/get/spendings/{vehicle_id}', [\App\Http\Controllers\SpendingController::class, 'getSpendings'])->name('getSpendings')->middleware('auth.basic');
Route::get('/get/spending/{id}/{vehicle_id}', [\App\Http\Controllers\SpendingController::class, 'getSpending'])->name('getSpending')->middleware('auth.basic');
Route::post('/create/spending/{vehicle_id}', [\App\Http\Controllers\SpendingController::class, 'createSpending'])->name('createSpending')->middleware('auth.basic');
Route::post('/edit/spending/{id}/{vehicle_id}', [\App\Http\Controllers\SpendingController::class, 'editSpending'])->name('editSpending')->middleware('auth.basic');
Route::delete('/deleteuser/spending/{id}/{vehicle_id}', [\App\Http\Controllers\SpendingController::class, 'deleteSpending'])->name('deleteSpending')->middleware('auth.basic');


Route::get('/getuser/vehicle/{id}', [\App\Http\Controllers\VehicleController::class, 'getVehicle'])->name('getVehicle')->middleware('auth.basic');
Route::get('/getuser/vehicles', [\App\Http\Controllers\VehicleController::class, 'getVehicles'])->name('getVehicles')->middleware('auth.basic');
Route::get('/create/vehicle', [\App\Http\Controllers\VehicleController::class, 'create'])->middleware('auth.basic');
Route::post('/create/vehicle', [\App\Http\Controllers\VehicleController::class, 'createVehicle'])->name('createVehicle')->middleware('auth.basic');
Route::post('/edit/vehicle/{id}', [\App\Http\Controllers\VehicleController::class, 'editVehicle'])->name('editVehicle')->middleware('auth.basic');
Route::delete('/deleteuser/vehicle/{id}', [\App\Http\Controllers\VehicleController::class, 'deleteVehicle'])->name('deleteVehicle')->middleware('auth.basic');


require __DIR__.'/auth.php';
