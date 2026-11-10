<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ServisController;

Route::get('/', function () {
    return view('public.home');
});

Route::get('/admin', function () {
    return view('admin.dashboard');
});

Route::get('/cek-servis', function () {
    return view('public.servis');
});

Route::resource('admin/pelanggan', PelangganController::class);
Route::resource('admin/produk', ProdukController::class);
Route::resource('admin/servis', ServisController::class);

