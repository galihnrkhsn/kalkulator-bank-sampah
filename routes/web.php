<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategorySampahC;

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

Route::get('/sampah', [CategorySampahC::class, 'sampah'])->name('sampah');
Route::post('/', [CategorySampahC::class, 'post'])->name('hitung');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group([
    'prefix' => 'Edit',
    'middleware' => ['auth',]
], function(){
    Route::group([
        'prefix' => 'Sampah',
    ], function() {
    Route::get('/', [CategorySampahC::class, 'edit_sampah'])->name('edit_sampah');
    Route::get('/{$id}', [CategorySampahC::class, 'edited'])->name('edited');
    Route::delete('/{id}', [CategorySampahC::class, 'destroy'])->name('sampah-delete');
     });
});
