<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\ParkingSpotController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ParkingUsageController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\CalendarController;

Route::get('/', [CustomAuthController::class, 'dashboard']); 
Route::get('dashboard', [CustomAuthController::class, 'dashboard']); 
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom'); 
Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom'); 
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');

Route::resource('plans', PlanController::class);
Route::resource('parking-spots', ParkingSpotController::class);
Route::get('report', [ReportController::class, 'generateReport'])->name('report');
Route::get('financial-report', [ReportController::class, 'financialReport'])->name('reports.financial');

Route::get('parking-usage/entry', [ParkingUsageController::class, 'showEntryForm'])->name('parking-usage.entry');
Route::post('parking-usage/entry', [ParkingUsageController::class, 'registerEntry'])->name('parking-usage.register-entry');
Route::post('parking-usage/exit/{id}', [ParkingUsageController::class, 'registerExit'])->name('parking-usage.exit');

Route::get('/choose-date', [CalendarController::class, 'index'])->name('choose-date');
Route::post('/redirect-to-report', [CalendarController::class, 'redirectToReport'])->name('redirect-to-report');
Route::get('/daily-report/{date}', [ReportController::class, 'dailyReportFromQuery'])->name('daily-report.query');
// Route::post('/daily-report/{date}', [CalendarController::class, 'dailyReport'])->name('daily-report');
