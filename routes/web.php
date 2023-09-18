<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TypepetController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/typepet/all', [TypepetController::class,"index"])->name('typepet');
    Route::post('/typepet/add', [TypepetController::class,"insert"])->name('addtypepet');
    Route::post('/typepet/update/{id}', [TypepetController::class,"update"])->name('updatetypepet');
    Route::get('/typepet/edit/{id}', [TypepetController::class,"edit"])->name('edittypepet');
    Route::get('/typepet/bin', [TypepetController::class,"bin"])->name('bin');
    Route::get('/typepet/softdelete/{id}', [TypepetController::class,"softDelete"])->name('softdeletetypepet');
    Route::get('/typepet/retore/{id}', [TypepetController::class,"restore"])->name('restoretypepet');
    Route::get('/typepet/retore/{id}', [TypepetController::class,"restore"])->name('restoretypepet');
    Route::get('/typepet/delete/{id}', [TypepetController::class,"delete"])->name('deletetypepet');

});

