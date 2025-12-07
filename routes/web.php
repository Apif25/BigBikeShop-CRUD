<?php


use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\MotorController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PemesananController;
use App\Http\Controllers\Admin\PreorderController;
use App\Http\Controllers\Admin\TransaksiController;
use App\Http\Controllers\Admin\PenjualanController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Ini adalah rute utama aplikasi. Rute ini memuat halaman register, login,
| dashboard untuk user & admin, serta fitur profil dan logout.
|--------------------------------------------------------------------------
*/

// ==========================
// HALAMAN REGISTER & LOGIN
// ==========================
// Hanya bisa diakses oleh tamu (belum login)
Route::middleware('guest')->group(function () {
    // Halaman register (bisa pakai '/' atau '/register' sesuai kebutuhan)
    Route::get('/', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/', [RegisteredUserController::class, 'store']);

    // Rute login & register bawaan Breeze
    require __DIR__ . '/auth.php';
});

// ==========================
// DASHBOARD UMUM (DEFAULT)
// ==========================
Route::get('/dashboard', function () {
    return view('auth.register');
})->middleware(['auth', 'verified'])->name('dashboard');

// ==========================
// FITUR PROFIL
// ==========================
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ==========================
// USER DASHBOARD
// ==========================
Route::middleware(['auth', 'user'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');
});

// ==========================
// ADMIN DASHBOARD
// ==========================
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});

// ==========================
// LOGOUT (UNTUK SEMUA ROLE)
// ==========================
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

//User CRUD
Route::prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/user', [UserController::class, 'index'])->name('user.index');
        Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
        Route::post('/user', [UserController::class, 'store'])->name('user.store');
        Route::get('/user/{id}', [UserController::class, 'edit'])->name('user.edit');
        Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');
        Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    });


Route::prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/motor', [MotorController::class, 'index'])->name('motor.index');
        Route::get('/motor/create', [MotorController::class, 'create'])->name('motor.create');
        Route::post('/motor', [MotorController::class, 'store'])->name('motor.store');
        Route::get('/motor/{id_motor}', [MotorController::class, 'edit'])->name('motor.edit');
        Route::put('/motor/{id_motor}', [MotorController::class, 'update'])->name('motor.update');
        Route::delete('/motor/{id_motor}', [MotorController::class, 'destroy'])->name('motor.destroy');
    });

//Pemesanan CRUD
Route::prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/pemesanan', [PemesananController::class, 'index'])->name('pemesanan.index');
        Route::get('/pemesanan/create', [PemesananController::class, 'create'])->name('pemesanan.create');
        Route::post('/pemesanan', [PemesananController::class, 'store'])->name('pemesanan.store');
        Route::get('/pemesanan/{id_pemesanan}', [PemesananController::class, 'edit'])->name('pemesanan.edit');
        Route::put('/pemesanan/{id_pemesanan}', [PemesananController::class, 'update'])->name('pemesanan.update');
        Route::delete('/pemesanan/{id_pemesanan}', [PemesananController::class, 'destroy'])->name('pemesanan.destroy');
    });


//Transaksi CRUD
Route::prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/Transaksi', [TransaksiController::class, 'index'])->name('Transaksi.index');
        Route::get('/Transaksi/create/{jenis}', [TransaksiController::class, 'create'])->name('Transaksi.create');
        Route::post('/Transaksi/store/{jenis}', [TransaksiController::class, 'store'])->name('Transaksi.store');
        Route::get('/Transaksi/{id_transaksi}', [TransaksiController::class, 'edit'])->name('Transaksi.edit');
        Route::put('/Transaksi/{id_transaksi}', [TransaksiController::class, 'update'])->name('Transaksi.update');
        Route::delete('/Transaksi/{id_transaksi}', [TransaksiController::class, 'destroy'])->name('Transaksi.destroy');
        Route::get('/admin/transaksi/cetak-pdf', [TransaksiController::class, 'cetakPDF'])->name('Transaksi.cetakPDF');
    });
    
Route::get('/test-email', function () {
    \Resend\Laravel\Facades\Resend::emails()->send([
        'from' => 'Resend <onboarding@resend.dev>',
        'to' => 'apfmedia25@gmail.com',
        'subject' => 'Test Resend',
        'html' => '<h1>Test berhasil!</h1>',
    ]);

     return 'Email terkirim!';
});

