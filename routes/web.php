<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResidentController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\ServiceDocumentController;
use App\Http\Controllers\Village_trainingController;

Route::post('/ajaxupload', [ServiceDocumentController::class, 'upload']);

Route::get('/', [ResidentController::class, 'count'])->name('home');
Route::post('/pengaduan/store', [InformationController::class, 'storePengaduan'])->name('pengaduan.store');
Route::get('/berita', [InformationController::class, 'berita'])->name('berita');

Route::get('/pelatihan', [Village_trainingController::class, 'index'])->name('pelatihan');
Route::get('/pelatihan/search', [Village_trainingController::class, 'search'])->name('pelatihan.search');

Route::get('/layananDokumen', [ServiceDocumentController::class, 'index'])->name('dokumen');
Route::get('/layananDokumen/download/{id}', [ServiceDocumentController::class, 'download'])->name('dokumen.download');
Route::get('/layananDokumen/search', [ServiceDocumentController::class, 'search'])->name('dokumen.search');
