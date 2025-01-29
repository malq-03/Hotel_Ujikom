<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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

route::get('/home', [AdminController::class,'index'])->name('home');
route::get('/', [AdminController::class,'home']);
route::get('/home', [AdminController::class,'index'])->name('home');
route::get('/create_kamar', [AdminController::class,'create_kamar']);
route::post('/tambah_kamar', [AdminController::class,'tambah_kamar'])->name('tambah_kamar');
route::get('/data_kamar', [AdminController::class,'data_kamar']);
route::get('/update_kamar/{id}', [AdminController::class,'update_kamar']);
route::post('/edit_kamar/{id}', [AdminController::class,'edit_kamar']);
route::get('/delete_kamar/{id}', [AdminController::class,'delete_kamar']);
route::get('/detail_kamar/{id}', [AdminController::class,'detail_kamar']);
route::get('/add_booking/{id}', [HomeController::class,'add_booking']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
