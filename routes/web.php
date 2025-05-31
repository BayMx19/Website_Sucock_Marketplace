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

Route::get('/', function () {
    return view('home');
});

Auth::routes();

// Route::middleware(['guest'])->group(function () {
//     // Route::get('/login', [SesiController::class, 'login'])->name('login');
//     // Route::get('/daftar', [SesiController::class, 'daftar'])->name('daftar');
//     // Route::get('/daftar/penjual', [SesiController::class, 'daftarpenjual'])->name('daftarpenjual');
//     Route::get('/profil/edit', [ProfilController::class, 'edit'])->name('profil/edit');
//     Route::get('/produk', [ProdukController::class, 'index'])->name('produk');
//     Route::get('/produk/detail', [ProdukController::class, 'show'])->name('produk/detail');

// });

// //Route::middleware(['auth'])->group(function () {
//     Route::get('/keranjang', [KeranjangController::class, 'index'])->name('keranjang');
//     //->middleware('userAkses:pembeli');
// //});
// Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
// Route::get('/order', [OrderController::class, 'index'])->name('order');
// Route::get('/order/detail', [OrderController::class, 'show'])->name('order/detail');
// Route::get('/profil', [ProfilController::class, 'index'])->name('profil');

// Route::get('/admin/home', [AdminController::class, 'index'])->name('admin/home');
// Route::get('/admin/profil', [AdminController::class, 'adminprofil'])->name('admin/profil');
// Route::get('/admin/profil/edit', [AdminController::class, 'adminprofiledit'])->name('admin/profil/edit');
// Route::get('/admin/datauser', [UserController::class, 'index'])->name('admin/datauser');
// Route::get('/admin/datauser/edit', [UserController::class, 'edit'])->name('admin/datauser/edit');
// Route::get('/admin/datauser/tambah', [UserController::class, 'create'])->name('admin/datauser/tambah');
// Route::get('/admin/datareview', [ReviewController::class, 'index'])->name('admin/datareview');
// Route::get('/admin/datatoko', [TokoController::class, 'index'])->name('admin/datatoko');
// Route::get('/admin/datatoko/edit', [TokoController::class, 'edit'])->name('admin/datatoko/edit');
// Route::get('/admin/datatoko/tambah', [TokoController::class, 'create'])->name('admin/datatoko/tambah');
// Route::get('/admin/dataproduk', [ProdukController::class, 'dataproduk'])->name('admin/dataproduk');
// Route::get('/admin/dataproduk/edit', [ProdukController::class, 'dataprodukedit'])->name('admin/dataproduk/edit');
// Route::get('/admin/dataproduk/tambah', [ProdukController::class, 'dataproduktambah'])->name('admin/dataproduk/tambah');
// Route::get('/admin/datatransaksi', [TransaksiController::class, 'index'])->name('admin/datatransaksi');
// Route::get('/admin/datatransaksi/edit', [TransaksiController::class, 'edit'])->name('admin/datatransaksi/edit');
// Route::get('/admin/datapesan', [PesanController::class, 'index'])->name('admin/datapesan');

Route::get('/daftarpenjual', function () {
    return view('auth.daftar');
})->name('daftarpenjual');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

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

});

// --- END Route Penjual ---


// --- Route Pembeli ---

// Pembeli
Route::middleware(['auth', 'role:Pembeli'])->group(function () {

});

// --- END Route Pembeli ---
