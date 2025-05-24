<?php

use App\Models\Resident;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResidentController;
use App\Http\Controllers\ServiceDocumentController;

Route::get('/coba', function () {
    return view('welcome');
});
// Route::get('/all', function () {
//     return view('all.layouts.appAll');
// });
Route::post('/ajaxupload', [ServiceDocumentController::class, 'upload']);

Route::get('/', [ResidentController::class, 'count']);
