<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PesertaPdfController;
use App\Http\Controllers\PublicPesertaController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/peserta/{peserta}/pdf', [PesertaPdfController::class, 'generatePdf'])->name('peserta.pdf');
Route::get('/peserta', [PesertaPdfController::class, 'index'])->name('peserta.index');
Route::get('/peserta', [PesertaPdfController::class, 'index'])->name('peserta.index');

//peserta
Route::get('/peserta', [PublicPesertaController::class, 'index'])->name('peserta.index');
// Route::get('/peserta/{peserta}/pdf', [PublicPesertaController::class, 'generatePdf'])->name('peserta.pdf');
Route::get('/peserta-pdf/{peserta}', [PesertaPdfController::class, 'generatePdf'])->name('peserta.pdf');