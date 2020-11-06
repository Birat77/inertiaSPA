<?php

use App\Http\Controllers\OrganizationsController;
use Inertia\Inertia;
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

Route::get('/', function () {
    return view('layouts.app');
});

Route::get('/home', function () {
    return Inertia::render('Welcome', [
        'user' => ['name' => 'laravel', 'type' => 'spa']
    ]);
})->middleware(['verified']);

// Route::resource('organizations',  \App\Http\Controllers\OrganizationsController::class);
Route::group(['prefix' => 'organizations', 'middleware' => 'verified'], function () {
    Route::get('/', [\App\Http\Controllers\OrganizationsController::class, 'index'])->name('organizations.index');
    Route::post('/', [\App\Http\Controllers\OrganizationsController::class, 'store'])->name('organizations.store');
    Route::get('/create', [\App\Http\Controllers\OrganizationsController::class, 'create'])->name('organizations.create');
    Route::get('/{organization}/edit', [\App\Http\Controllers\OrganizationsController::class, 'edit'])->name('organizations.edit');
    Route::post('/{organization}', [\App\Http\Controllers\OrganizationsController::class, 'update'])->name('organizations.update');
    Route::delete('/{organization}', [\App\Http\Controllers\OrganizationsController::class, 'destroy'])->name('organizations.destroy');
});
