@extends('layouts.admin')

@section('content')
<div class="row">
  <div class="col-lg-12 mb-4 order-0">
    <div class="card">
      <div class="d-flex align-items-end row">
        <div class="col-sm-8">
          <div class="card-body">
            <h5 class="card-title text-primary">Selamat Datang di Dashboard Sony Prima Jaya! 🛠️</h5>
            <p class="mb-4">
              Kelola tiket antrean servis elektronik, pantau barang yang belum diambil pelanggan, dan perbarui stok katalog produk toko melalui menu di sebelah kiri.
            </p>
            <a href="{{ url('/admin/servis') }}" class="btn btn-sm btn-primary">Kelola Antrean Servis</a>
          </div>
        </div>
        <div class="col-sm-4 text-center text-sm-left">
          <div class="card-body pb-0 px-0 px-md-4">
            <img
              src="{{ asset('admin_assets/img/illustrations/man-with-laptop-light.png') }}"
              height="130"
              alt="Admin Illustration"
            />
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Kartu Ringkasan Cepat -->
<div class="row">
  <div class="col-lg-3 col-md-6 col-6 mb-4">
    <div class="card">
      <div class="card-body">
        <span class="fw-semibold d-block mb-1 text-muted">Servis Aktif</span>
        <h3 class="card-title mb-2 text-primary">12 Unit</h3>
        <small class="text-muted">Sedang dikerjakan teknisi</small>
      </div>
    </div>
  </div>

  <div class="col-lg-3 col-md-6 col-6 mb-4">
    <div class="card">
      <div class="card-body">
        <span class="fw-semibold d-block mb-1 text-muted">Selesai (Belum Diambil)</span>
        <h3 class="card-title mb-2 text-danger">32 Unit</h3>
        <small class="text-danger fw-semibold"><i class="bx bx-error-circle"></i> Menumpuk di toko</small>
      </div>
    </div>
  </div>

  <div class="col-lg-3 col-md-6 col-6 mb-4">
    <div class="card">
      <div class="card-body">
        <span class="fw-semibold d-block mb-1 text-muted">Total Pelanggan</span>
        <h3 class="card-title mb-2 text-success">45 Orang</h3>
        <small class="text-muted">Terdaftar di sistem</small>
      </div>
    </div>
  </div>

  <div class="col-lg-3 col-md-6 col-6 mb-4">
    <div class="card">
      <div class="card-body">
        <span class="fw-semibold d-block mb-1 text-muted">Produk Katalog</span>
        <h3 class="card-title mb-2 text-info">8 Barang</h3>
        <small class="text-muted">Tampil di etalase publik</small>
      </div>
    </div>
  </div>
</div>
@endsection
