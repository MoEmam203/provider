<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ProviderController;
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


Route::view('/', 'welcome')->name('root');

Auth::routes(['register' => false]);

Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::resource('providers', ProviderController::class)->middleware('admin')->only(['index', 'create', 'store']);

    Route::resource('locations', LocationController::class)->middleware('provider');
});

Route::domain('{username:username}.' . config('app.site_url'))->group(function () {
    Route::get('/', [HomeController::class, 'domain']);
});

// for testing cuz subdomain doesn't work local 
Route::get('test/{username:username}', [HomeController::class, 'domain']);
