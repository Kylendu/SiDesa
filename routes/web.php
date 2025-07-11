<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\StrukturDesaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResidentController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\ServiceDocumentController;
use App\Http\Controllers\Village_trainingController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PeminjamanController;

Route::post('/ajaxupload', [ServiceDocumentController::class, 'upload']);

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::post('/pengaduan/store', [InformationController::class, 'storePengaduan'])->name('pengaduan.store');
Route::get('/berita', [InformationController::class, 'berita'])->name('berita');
Route::get('/berita/{id}', [InformationController::class, 'showBerita'])->name('berita.show');


Route::get('/pelatihan', [Village_trainingController::class, 'index'])->name('pelatihan');
Route::get('/pelatihan/search', [Village_trainingController::class, 'search'])->name('pelatihan.search');
Route::get('/pelatihan/{id}', [Village_trainingController::class, 'show'])->name('pelatihan.show');


Route::get('/layananDokumen', [ServiceDocumentController::class, 'index'])->name('dokumen');
Route::get('/layananDokumen/download/{id}', [ServiceDocumentController::class, 'download'])->name('dokumen.download');
Route::get('/layananDokumen/search', [ServiceDocumentController::class, 'search'])->name('dokumen.search');

Route::get('/ppid', function () {
    return view('all.pages.ppid');
})->name('ppid');

Route::get('/inventories', [\App\Http\Controllers\InventoryController::class, 'index'])->name('inventory');


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::post('/peminjaman', [PeminjamanController::class, 'store'])->name('peminjaman.store');
    Route::get('/profil', [PeminjamanController::class, 'profil'])->name('profil');
    Route::get('/peminjaman/{id}/download', [PeminjamanController::class, 'download'])
    ->name('peminjaman.download');
});

Route::get('/peminjaman/acc/{id}', [PeminjamanController::class, 'acc'])->name('peminjaman.acc');


