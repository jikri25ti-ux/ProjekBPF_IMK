<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ServisController;
use App\Http\Controllers\AuthController;
use App\Models\Pelanggan;
use App\Models\Produk;
use App\Models\Servis;

Route::get('/', function (Request $request) {
    $query = Produk::query();

    if ($request->filled('search')) {
        $query->where('nama_produk', 'like', '%' . $request->search . '%');
    }

    if ($request->filled('kategori')) {
        $query->where('kategori', $request->kategori);
    }

    $data['produks'] = $query->latest()->get();

    return view('public.home', $data);
})->name('home');

Route::get('/cek-servis', function (Request $request) {
    $data['servis'] = null;
    $data['searched'] = false;

    if ($request->filled('kode') && $request->filled('no_hp')) {
        $data['searched'] = true;
        $data['servis'] = Servis::where('kode_servis', $request->kode)
            ->where('no_hp', $request->no_hp)
            ->first();
    }

    return view('public.servis', $data);
})->name('cek-servis');

Route::get('/riwayat-servis', function () {
    $data['riwayatServis'] = Servis::where('no_hp', Auth::user()->no_hp)
        ->latest()
        ->get();

    return view('public.riwayat-servis', $data);
})->name('riwayat-servis')->middleware('auth');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->middleware('guest');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register')->middleware('guest');
Route::post('/register', [AuthController::class, 'register'])->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::middleware(['admin'])->group(function () {
    Route::get('/admin', function () {
        $data['servisAktif'] = Servis::whereIn('status', ['Menunggu', 'Sedang Dikerjakan'])->count();
        $data['servisSelesai'] = Servis::where('status', 'Selesai')->count();
        $data['totalPelanggan'] = Pelanggan::where('role', 'pelanggan')->count();
        $data['totalProduk'] = Produk::count();
        $data['servisTerbaru'] = Servis::latest()->take(5)->get();

        return view('admin.dashboard', $data);
    })->name('admin.dashboard');

    Route::resource('admin/pelanggan', PelangganController::class);
    Route::resource('admin/produk', ProdukController::class);
    Route::resource('admin/servis', ServisController::class);
});
