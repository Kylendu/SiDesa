<?php

use App\Models\Resident;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResidentController;

Route::get('/coba', function () {
    return view('welcome');
});
// Route::get('/all', function () {
//     return view('all.layouts.appAll');
// });

Route::get('/', [ResidentController::class, 'count']);
