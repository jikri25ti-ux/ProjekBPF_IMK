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
            <a href="{{ route('servis.index') }}" class="btn btn-sm btn-primary">Kelola Antrean Servis</a>
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

<div class="row">
  <div class="col-lg-3 col-md-6 col-6 mb-4">
    <div class="card">
      <div class="card-body">
        <span class="fw-semibold d-block mb-1 text-muted">Servis Aktif</span>
        <h3 class="card-title mb-2 text-primary">{{ $servisAktif }} Unit</h3>
        <small class="text-muted">Menunggu & dikerjakan</small>
      </div>
    </div>
  </div>

  <div class="col-lg-3 col-md-6 col-6 mb-4">
    <div class="card">
      <div class="card-body">
        <span class="fw-semibold d-block mb-1 text-muted">Selesai (Belum Diambil)</span>
        <h3 class="card-title mb-2 text-danger">{{ $servisSelesai }} Unit</h3>
        <small class="text-danger fw-semibold"><i class="bx bx-error-circle"></i> Menunggu pengambilan</small>
      </div>
    </div>
  </div>

  <div class="col-lg-3 col-md-6 col-6 mb-4">
    <div class="card">
      <div class="card-body">
        <span class="fw-semibold d-block mb-1 text-muted">Total Pelanggan</span>
        <h3 class="card-title mb-2 text-success">{{ $totalPelanggan }} Orang</h3>
        <small class="text-muted">Terdaftar di sistem</small>
      </div>
    </div>
  </div>

  <div class="col-lg-3 col-md-6 col-6 mb-4">
    <div class="card">
      <div class="card-body">
        <span class="fw-semibold d-block mb-1 text-muted">Produk Katalog</span>
        <h3 class="card-title mb-2 text-info">{{ $totalProduk }} Barang</h3>
        <small class="text-muted">Tampil di etalase publik</small>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Antrean Servis Terbaru</h5>
        <a href="{{ route('servis.index') }}" class="btn btn-sm btn-outline-primary">Lihat Semua</a>
      </div>
      <div class="table-responsive text-nowrap">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>Kode Servis</th>
              <th>Pelanggan</th>
              <th>Barang</th>
              <th>Status</th>
              <th>Biaya</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
            @forelse ($servisTerbaru as $item)
              <tr>
                <td><strong>{{ $item->kode_servis }}</strong></td>
                <td>{{ $item->nama_pelanggan }}</td>
                <td>{{ $item->nama_barang }}</td>
                <td>
                  @if ($item->status == 'Menunggu')
                    <span class="badge bg-label-warning">Menunggu</span>
                  @elseif ($item->status == 'Sedang Dikerjakan')
                    <span class="badge bg-label-info">Sedang Dikerjakan</span>
                  @elseif ($item->status == 'Selesai')
                    <span class="badge bg-label-success">Selesai</span>
                  @else
                    <span class="badge bg-label-secondary">Diambil</span>
                  @endif
                </td>
                <td>
                  @if ($item->biaya)
                    Rp {{ number_format($item->biaya, 0, ',', '.') }}
                  @else
                    <span class="text-muted">Belum ditentukan</span>
                  @endif
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="5" class="text-center text-muted">Belum ada data servis.</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
