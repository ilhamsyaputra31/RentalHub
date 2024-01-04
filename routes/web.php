<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthControllers;
use App\Http\Controllers\UserControllers;
use App\Http\Controllers\AdminControllers;
use App\Http\Controllers\MitraControllers;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\DatamitraControllers;
use App\Http\Controllers\CategoryProdukController;
use App\Http\Controllers\paymant;
use App\Http\Controllers\sistem_penyewaan;

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

Route::view('/', 'frontend/index');

// Route::get('/buy', [paymant::class, 'index']);

Route::get('/', [paymant::class, 'createPayment']);
Route::post('/payment/callback', [paymant::class, 'paymentCallback']);

Route::middleware(['guest'])->group(function () {
    Route::get('/sesi', [AuthControllers::class, 'index'])->name('auth');
    Route::post('/sesi', [AuthControllers::class, 'login']);
    Route::get('/reg', [AuthControllers::class, 'create'])->name('registrasi');
    Route::post('/reg', [AuthControllers::class, 'register']);
    Route::get('/verivy/{verify_key}', [AuthControllers::class, 'verify']);
});



Route::middleware(['auth'])->group(function () {
    Route::get('admin', [AdminControllers::class, 'index'])->middleware('only_admin');
    Route::get('mitra', [MitraControllers::class, 'index'])->middleware('only_mitra');

    Route::get('/datamitra', [DatamitraControllers::class, 'index'])->name('datamitra');
    Route::get('/tambahuc', [DatamitraControllers::class, 'tambah']);
    Route::post('/tambahuc', [DatamitraControllers::class, 'create']);
    Route::get('/registed-user', [DatamitraControllers::class, 'RegisteredUser']);
    Route::get('/approve/{id}', [DatamitraControllers::class, 'approve']);

    // Route::get('/produk', [ProdukController::class, 'index']);
    Route::get('/produk', [ProdukController::class, 'index'])->name('produkmitra');
    Route::get('/tambahproduk', [ProdukController::class, 'tambahproduk']);
    Route::post('/tambahproduk', [ProdukController::class, 'createproduk']);
    Route::get('/editproduk/{id}', [ProdukController::class, 'edit']);
    Route::post('/editproduk', [ProdukController::class, 'change']);
    Route::post('/hapusprodukmitra/{id}', [ProdukController::class, 'hapus']);

    Route::get('/penyewaan', [sistem_penyewaan::class, 'index']);
    Route::get('/tambahorder', [sistem_penyewaan::class, 'tambahorder']);
    Route::post('/tambahorder', [sistem_penyewaan::class, 'createorder']);
    Route::get('/editorder/{id}', [sistem_penyewaan::class, 'edit']);
    Route::post('/editorder', [sistem_penyewaan::class, 'change']);
    Route::post('/hapusorder/{id}', [sistem_penyewaan::class, 'hapus']);

    Route::post('/logout', [AuthControllers::class, 'logout'])->name('logout');
});
//Produk mitra user
// Route::get('/produkmitra', [ManajemenProdukController::class, 'index'])->name('produkmitra');
// Route::get('/tambahproduk', [ManajemenProdukController::class, 'tambahproduk']);
// Route::post('/tambahproduk', [ManajemenProdukController::class, 'createproduk']);
// Route::get('/editproduk/{id}', [ManajemenProdukController::class, 'edit']);
// Route::post('/editproduk', [ManajemenProdukController::class, 'change']);

// Route::post('/hapusprodukmitra/{id}', [ManajemenProdukController::class, 'hapus']);
//end produkmitra user

// pemesanan
// Route::get('/pemesanan', [PenyewaanController::class, 'index'])->name('pemesanan');

//kelola Data mitra
// Route::get('/datamitra', [DatamitraControllers::class, 'index'])->name('datamitra');
// Route::get('/tambahuc', [DatamitraControllers::class, 'tambah']);
// Route::get('/edituc/{id}', [DatamitraControllers::class, 'edit']);
// Route::post('/hapusuc/{id}', [DatamitraControllers::class, 'hapus']);
// Route::post('/tambahuc', [DatamitraControllers::class, 'create']);
// Route::post('/edituc', [DatamitraControllers::class, 'change']);
//end kelola mitra
