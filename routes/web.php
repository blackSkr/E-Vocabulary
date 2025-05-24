<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KosakataController;
// use App\Filament\Pages\Auth\Register;



// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [KosakataController::class, 'index']);

// Route::get('/', function(){
//     return view('/landingpages', [KosakataController::class, 'index']);
// });
Route::get('/kosakata', [KosakataController::class, 'index'])->name('kosakata.index');

