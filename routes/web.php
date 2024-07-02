<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\ParkingSpotController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ParkingUsageController;
use App\Http\Controllers\PlanController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [CustomAuthController::class, 'dashboard']); 
Route::get('dashboard', [CustomAuthController::class, 'dashboard']); 
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom'); 
Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom'); 
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');
Route::get('parking-usage/entry', [ParkingUsageController::class, 'showEntryForm'])->name('parking-usage.entry');
    Route::post('parking-usage/entry', [ParkingUsageController::class, 'registerEntry'])->name('parking-usage.entry');
Route::resource('plans', PlanController::class);
Route::resource('parking-spots', ParkingSpotController::class);
Route::get('report', [ReportController::class, 'generateReport'])->name('report');
Route::get('financial-report', [ReportController::class, 'financialReport'])->name('reports.financial');

Route::post('parking-usage/exit/{id}', [ParkingUsageController::class, 'exit'])->name('parking-usage.exit');
