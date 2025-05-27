<?php

use App\Http\Controllers\SesiController;
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

Route::middleware(['guest'])->group(function () {
    // Route::get('/login', [SesiController::class, 'login'])->name('login');
    // Route::get('/daftar', [SesiController::class, 'daftar'])->name('daftar');
    // Route::get('/daftar/penjual', [SesiController::class, 'daftarpenjual'])->name('daftarpenjual');
    Route::get('/profil/edit', [ProfilController::class, 'edit'])->name('profil/edit');
    Route::get('/produk', [ProdukController::class, 'index'])->name('produk');
    Route::get('/produk/detail', [ProdukController::class, 'show'])->name('produk/detail');

});

//Route::middleware(['auth'])->group(function () {
    Route::get('/keranjang', [KeranjangController::class, 'index'])->name('keranjang');
    //->middleware('userAkses:pembeli');
//});
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::get('/order', [OrderController::class, 'index'])->name('order');
Route::get('/order/detail', [OrderController::class, 'show'])->name('order/detail');
Route::get('/profil', [ProfilController::class, 'index'])->name('profil');

Route::get('/admin/home', [AdminController::class, 'index'])->name('admin/home');
Route::get('/admin/profil', [AdminController::class, 'adminprofil'])->name('admin/profil');
Route::get('/admin/profil/edit', [AdminController::class, 'adminprofiledit'])->name('admin/profil/edit');
Route::get('/admin/datauser', [UserController::class, 'index'])->name('admin/datauser');
Route::get('/admin/datauser/edit', [UserController::class, 'edit'])->name('admin/datauser/edit');
Route::get('/admin/datauser/tambah', [UserController::class, 'create'])->name('admin/datauser/tambah');
Route::get('/admin/datareview', [ReviewController::class, 'index'])->name('admin/datareview');
Route::get('/admin/datatoko', [TokoController::class, 'index'])->name('admin/datatoko');
Route::get('/admin/datatoko/edit', [TokoController::class, 'edit'])->name('admin/datatoko/edit');
Route::get('/admin/datatoko/tambah', [TokoController::class, 'create'])->name('admin/datatoko/tambah');
Route::get('/admin/dataproduk', [ProdukController::class, 'dataproduk'])->name('admin/dataproduk');
Route::get('/admin/dataproduk/edit', [ProdukController::class, 'dataprodukedit'])->name('admin/dataproduk/edit');
Route::get('/admin/dataproduk/tambah', [ProdukController::class, 'dataproduktambah'])->name('admin/dataproduk/tambah');
Route::get('/admin/datatransaksi', [TransaksiController::class, 'index'])->name('admin/datatransaksi');
Route::get('/admin/datatransaksi/edit', [TransaksiController::class, 'edit'])->name('admin/datatransaksi/edit');
Route::get('/admin/datapesan', [PesanController::class, 'index'])->name('admin/datapesan');

Route::get('/daftarpenjual', function () {
    return view('auth.daftar');
})->name('daftarpenjual');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
