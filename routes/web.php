<?php

use App\Http\Controllers\SesiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\TokoController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\ProfilController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/home', [DashboardController::class, 'dashboardpembeli'])->name('home');

Route::get('/', function () {
    if (Auth::check()) {
        $role = Auth::user()->role;

        if ($role === 'Admin') {
            return redirect()->route('admin.home');
        } elseif ($role === 'Penjual') {
            return redirect()->route('penjual.home');
        } elseif ($role === 'Pembeli') {
            return redirect()->route('pembeli.home');
        }
    }

    return redirect('/home');
});

Auth::routes();

// --- Route Admin ---

Route::middleware(['auth', 'role:Admin'])->group(function () {
    Route::get('/admin/home/', [DashboardController::class, 'dashboardadmin'])->name('admin.home');

   // Route Data Users
    Route::get('/admin/data_users/', [UserController::class, 'index'])->name('admin.data_users.index');
    Route::get('/admin/data_users/create', [UserController::class, 'create'])->name('admin.data_users.create');
    Route::post('/admin/data_users/store', [UserController::class, 'store'])->name('admin.data_users.store');
    Route::get('/admin/data_users/{id}/detail', [UserController::class, 'detail'])->name('admin.data_users.detail');
    Route::get('/admin/data_users/{id}/edit', [UserController::class, 'edit'])->name('admin.data_users.edit');
    Route::put('/admin/data_users/{id}', [UserController::class, 'update'])->name('admin.data_users.update');
    Route::delete('/admin/data_users/{id}', [UserController::class, 'destroy'])->name('admin.data_users.destroy');

    // Route Data Toko
    Route::get('/admin/data_toko/', [TokoController::class, 'index'])->name('admin.data_toko.index');
    Route::get('/admin/data_toko/{id}/detail', [TokoController::class, 'detail'])->name('admin.data_toko.detail');
    Route::delete('/admin/data_toko/{id}', [TokoController::class, 'destroy'])->name('admin.data_toko.destroy');

    // Route Data Produk
    Route::get('/admin/data_produk/', [produkController::class, 'dataproduk'])->name('admin.data_produk.index');
    Route::get('/admin/data_produk/{id}/detail', [produkController::class, 'dataprodukdetail'])->name('admin.data_produk.detail');

    // Route Data Pesanan
    Route::get('/admin/data_pesanan/', [TransaksiController::class, 'indexadmin'])->name('admin.data_pesanan.index');
    Route::get('/admin/data_pesanan/{id}/detail', [TransaksiController::class, 'detailadmin'])->name('admin.data_pesanan.detail');

    // Route Data Review
    Route::get('/admin/data_review/', [ReviewController::class, 'indexadmin'])->name('admin.data_review.index');
    Route::get('/admin/data_review/{id}/detail', [ReviewController::class, 'detailadmin'])->name('admin.data_review.detail');
    Route::delete('/admin/data_review/{id}', [ReviewController::class, 'destroyadmin'])->name('admin.data_review.destroy');
    // Route Profile
    Route::get('/admin/profile/', [ProfilController::class, 'indexadmin'])->name('admin.profile.index');
});


// --- END Route Admin ---


// --- Route Penjual ---

Route::middleware(['auth', 'role:Penjual'])->group(function () {
    Route::get('/penjual/home/', [DashboardController::class, 'dashboardpenjual'])->name('penjual.home');

    // Route Data Produk
    Route::get('/penjual/data_produk/', [ProdukController::class, 'indexpenjual'])->name('penjual.data_produk.index');
    Route::get('/penjual/data_produk/create', [ProdukController::class, 'createpenjual'])->name('penjual.data_produk.create');
    Route::post('/penjual/data_produk/store', [ProdukController::class, 'storepenjual'])->name('penjual.data_produk.store');
    Route::get('/penjual/data_produk/{id}/detail', [ProdukController::class, 'detailpenjual'])->name('penjual.data_produk.detail');
    Route::get('/penjual/data_produk/{id}/edit', [ProdukController::class, 'editpenjual'])->name('penjual.data_produk.edit');
    Route::put('/penjual/data_produk/{id}', [ProdukController::class, 'updatepenjual'])->name('penjual.data_produk.update');
    Route::delete('/penjual/data_produk/{id}', [ProdukController::class, 'destroypenjual'])->name('penjual.data_produk.destroy');

    // Route Data Transaksi
    Route::get('/penjual/data_pesanan/', [TransaksiController::class, 'indexpenjual'])->name('penjual.data_pesanan.index');

    // Route Data Review
    // Route Chat
    // Route Profile
    Route::get('/penjual/profile/', [ProfilController::class, 'indexpenjual'])->name('penjual.profile.index');
    Route::get('/penjual/profile/{id}/edit', [ProfilController::class, 'editpenjual'])->name('penjual.profile.edit');
    Route::put('/penjual/profile/{id}', [ProfilController::class, 'updatepenjual'])->name('penjual.profile.update');

});

// --- END Route Penjual ---


// --- Route Pembeli ---

// Pembeli
Route::middleware(['auth', 'role:Pembeli'])->group(function () {

});

// --- END Route Pembeli ---
