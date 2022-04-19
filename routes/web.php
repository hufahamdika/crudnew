<?php

use App\Http\Controllers\RecordController;
use App\Models\Record;
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
    return view('welcome');
});

Route::get('/', [RecordController::class, 'index'])->name('home');

Route::get('/new', [RecordController::class, 'create'])->name('record.create');
Route::post('/new-data', [RecordController::class, 'store'])->name('record.new-data');
Route::get('/edit/{id}', [RecordController::class, 'edit'])->name('record.edit');
Route::post('/update/{id}', [RecordController::class, 'update'])->name('record.update');
Route::get('/show/{id}', [RecordController::class, 'show'])->name('record.show');
Route::delete('/delete/{id}', [RecordController::class, 'destroy'])->name('record.destroy');