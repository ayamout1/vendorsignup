<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FileUploadController;


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
    return view('vendor_form');
});
Route::get('/vendor-form', function () {
    return view('vendor_form');  // This is the name of your blade file without .blade.php
})->name('vendor.form');

Route::get('/fileshow/{email}', [FileUploadController::class, 'show'])->name('file.show');

Route::put('/file/{email}', [FileUploadController::class, 'update'])->name('file.update');
