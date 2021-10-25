<?php

use App\Http\Controllers\LocationController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\RedirectController;
use App\Models\Provider;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

define("PAGINATE_NUMBER",5);

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// redirect route after Login
Route::get('redirect', [RedirectController::class,'redirectUser']);

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('providers', [ProviderController::class,'index'])->name("providers");
    Route::view("/providers/create",'providers.create')->name("providers.create");
    Route::post('providers', [ProviderController::class,'store'])->name("providers.store");
});

Route::middleware(['auth', 'provider'])->group(function () {
    Route::get("locations/{provider}",[LocationController::class,'index'])->name("locations");
    Route::get("/locations/create/{provider}",[LocationController::class,'create'])->name("locations.create");
    // Route::view("/locations",'locations.create')->name("locations.create");
    Route::post("locations",[LocationController::class,'store'])->name("locations.store");
});



