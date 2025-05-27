<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KosakataController;
use App\Http\Controllers\LaporanController;
use App\Livewire\TanyaAi;

// use App\Filament\Pages\Auth\Register;



// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [KosakataController::class, 'index']);
Route::get('/tanya-ai', function(){
    return view('ai.index');
});
// Route::get('/', function(){
//     return view('/landingpages', [KosakataController::class, 'index']);
// });
Route::get('/kosakata', [KosakataController::class, 'index'])->name('kosakata.index');
Route::get('/report', [LaporanController::class, 'index'])->name('form-laporan.index');
Route::post('/report', [LaporanController::class, 'store'])->name('form-laporan.store');
// Tanyai AI ROute
// Route::get('/tanya-ai', TanyaAi::class);// atau tanpa auth jika publik

