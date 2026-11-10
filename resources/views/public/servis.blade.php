@extends('layouts.public')

@section('content')

<style>
    .servis-card { background: #fff; border-radius: 14px; padding: 26px; border: 1px solid #eee; }
    .servis-form .form-control { background: #f3f4f6; border: 1px solid #eee; border-radius: 10px; padding: 12px 14px; }
    .servis-form .form-control:focus { border-color: #ee4d2d; box-shadow: 0 0 0 .2rem #ee4d2d22; background: #fff; }
    .btn-orange { background: #ee4d2d; color: #fff; border: none; border-radius: 10px; padding: 12px 22px; font-weight: 700; }
    .btn-orange:hover { background: #d63f21; color: #fff; }
    .btn-outline-orange { border: 1px solid #ee4d2d; color: #ee4d2d; border-radius: 10px; font-weight: 600; }
    .btn-outline-orange:hover { background: #ee4d2d; color: #fff; }
    .status-badge { padding: 6px 14px; border-radius: 30px; font-size: 13px; font-weight: 700; }
    .status-menunggu { background: #fff4e5; color: #d97706; }
    .status-dikerjakan { background: #e8f1ff; color: #2563eb; }
    .status-selesai { background: #e7f8ee; color: #16a34a; }
    .status-diambil { background: #f1f1f4; color: #555; }
    .info-label { font-size: 12px; color: #888; margin-bottom: 2px; }
    .info-value { font-weight: 700; font-size: 15px; }

    /* Progress tracker */
    .tracker { display: flex; justify-content: space-between; position: relative; margin: 30px 0 10px; }
    .tracker::before { content: ''; position: absolute; top: 20px; left: 12%; right: 12%; height: 4px; background: #eee; z-index: 0; }
    .tracker .progress-line { position: absolute; top: 20px; left: 12%; height: 4px; background: #ee4d2d; z-index: 1; }
    .tracker-step { text-align: center; width: 25%; position: relative; z-index: 2; }
    .tracker-step .circle { width: 44px; height: 44px; border-radius: 50%; background: #eee; color: #aaa; display: inline-flex; align-items: center; justify-content: center; font-size: 17px; }
    .tracker-step.active .circle { background: #ee4d2d; color: #fff; box-shadow: 0 4px 12px #ee4d2d40; }
    .tracker-step p { font-size: 12px; margin: 8px 0 0; color: #888; }
    .tracker-step.active p { color: #292d32; font-weight: 700; }

    .tips-item i { color: #ee4d2d; width: 22px; }

    @media(max-width: 768px) {
        .servis-card { padding: 18px; }
        .tracker-step .circle { width: 36px; height: 36px; font-size: 14px; }
        .tracker::before, .tracker .progress-line { top: 16px; }
        .tracker-step p { font-size: 10px; }
    }
</style>

@php
    // Data dummy untuk tampilan hasil status servis
    $servis = [
        'kode'           => 'SRV-2026-0012',
        'nama_pelanggan' => 'Budi Santoso',
        'no_hp'          => '0812-xxxx-4567',
        'nama_barang'    => 'TV LED Sony Bravia 43"',
        'kerusakan'      => 'Layar bergaris dan suara kadang hilang.',
        'status'         => 'Sedang Dikerjakan',
        'biaya'          => 350000,
        'tanggal_masuk'  => '05 Nov 2026',
        'estimasi'       => '12 Nov 2026',
    ];

    $steps = [
        ['label' => 'Menunggu',          'icon' => 'fa-clock'],
        ['label' => 'Sedang Dikerjakan', 'icon' => 'fa-tools'],
        ['label' => 'Selesai',           'icon' => 'fa-check'],
        ['label' => 'Diambil',           'icon' => 'fa-hand-holding'],
    ];

    $statusClass = [
        'Menunggu'          => 'status-menunggu',
        'Sedang Dikerjakan' => 'status-dikerjakan',
        'Selesai'           => 'status-selesai',
        'Diambil'           => 'status-diambil',
    ];

    $currentIndex = array_search($servis['status'], array_column($steps, 'label'));
    $progressWidth = $currentIndex * 25.33;
@endphp

<!-- HERO -->
<section class="hero mb-4">
    <div>
        <h1>Cek Status Servis</h1>
        <p class="mb-0">Pantau perkembangan perbaikan perangkat elektronik Anda di Sony Prima Jaya secara mudah dan cepat.</p>
    </div>
    <i class="fa fa-screwdriver-wrench d-none d-md-block" style="font-size: 120px; opacity: .85;"></i>
</section>

<div class="row g-4">
    <!-- FORM PENCARIAN -->
    <div class="col-lg-4">
        <div class="servis-card mb-4">
            <h5 class="section-title mb-3"><i class="fa fa-search text-danger me-2"></i>Lacak Servis</h5>
            <form action="" method="GET" class="servis-form">
                <div class="mb-3">
                    <label for="kode" class="form-label small fw-bold">Kode Servis</label>
                    <input type="text" id="kode" name="kode" class="form-control"
                        placeholder="Contoh: SRV-2026-0012"
                        value="{{ request('kode') }}">
                </div>
                <div class="mb-3">
                    <label for="no_hp" class="form-label small fw-bold">Nomor HP</label>
                    <input type="text" id="no_hp" name="no_hp" class="form-control"
                        placeholder="Contoh: 0812xxxxxxxx"
                        value="{{ request('no_hp') }}">
                </div>
                <button type="submit" class="btn btn-orange w-100">
                    <i class="fa fa-search me-1"></i> Cek Status
                </button>
            </form>
        </div>

        <div class="servis-card">
            <h6 class="fw-bold mb-3">Tips Pencarian</h6>
            <p class="small tips-item mb-2"><i class="fa fa-receipt"></i> Kode servis tertera pada nota tanda terima.</p>
            <p class="small tips-item mb-2"><i class="fa fa-mobile-alt"></i> Gunakan nomor HP yang didaftarkan saat servis.</p>
            <p class="small tips-item mb-0"><i class="fab fa-whatsapp"></i> Butuh bantuan? Hubungi kami via WhatsApp.</p>
        </div>
    </div>

    <!-- HASIL STATUS (DUMMY) -->
    <div class="col-lg-8">
        <div class="servis-card">
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-2">
                <div>
                    <div class="info-label">Kode Servis</div>
                    <h4 class="fw-bold mb-0" style="color: #ee4d2d;">{{ $servis['kode'] }}</h4>
                </div>
                <span class="status-badge {{ $statusClass[$servis['status']] }}">
                    <i class="fa fa-circle me-1" style="font-size: 8px;"></i>{{ $servis['status'] }}
                </span>
            </div>

            <!-- Tracker -->
            <div class="tracker">
                <div class="progress-line" style="width: {{ $progressWidth }}%;"></div>
                @foreach ($steps as $i => $step)
                    <div class="tracker-step {{ $i <= $currentIndex ? 'active' : '' }}">
                        <div class="circle"><i class="fa {{ $step['icon'] }}"></i></div>
                        <p>{{ $step['label'] }}</p>
                    </div>
                @endforeach
            </div>

            <hr class="my-4">

            <!-- Detail -->
            <div class="row g-3">
                <div class="col-md-6">
                    <div class="info-label">Nama Pelanggan</div>
                    <div class="info-value">{{ $servis['nama_pelanggan'] }}</div>
                </div>
                <div class="col-md-6">
                    <div class="info-label">Nomor HP</div>
                    <div class="info-value">{{ $servis['no_hp'] }}</div>
                </div>
                <div class="col-md-6">
                    <div class="info-label">Nama Barang</div>
                    <div class="info-value">{{ $servis['nama_barang'] }}</div>
                </div>
                <div class="col-md-6">
                    <div class="info-label">Estimasi Biaya</div>
                    <div class="info-value price">
                        {{ $servis['biaya'] ? 'Rp ' . number_format($servis['biaya'], 0, ',', '.') : 'Belum ditentukan' }}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="info-label">Tanggal Masuk</div>
                    <div class="info-value"><i class="fa fa-calendar-alt text-muted me-1"></i>{{ $servis['tanggal_masuk'] }}</div>
                </div>
                <div class="col-md-6">
                    <div class="info-label">Estimasi Selesai</div>
                    <div class="info-value"><i class="fa fa-calendar-check text-muted me-1"></i>{{ $servis['estimasi'] }}</div>
                </div>
                <div class="col-12">
                    <div class="info-label">Keluhan / Kerusakan</div>
                    <div class="p-3 rounded-3" style="background: #f5f6fa;">{{ $servis['kerusakan'] }}</div>
                </div>
            </div>

            <div class="alert mt-4 mb-0 d-flex align-items-center" style="background: #fff4ef; color: #b93a20; border: 1px solid #ffd9cc; border-radius: 10px;">
                <i class="fa fa-info-circle me-2"></i>
                <span class="small">Perangkat Anda sedang dalam proses perbaikan oleh teknisi kami. Kami akan menghubungi Anda jika servis telah selesai.</span>
            </div>

            <div class="d-flex flex-wrap gap-2 mt-4">
                <a href="#" class="btn btn-outline-orange">
                    <i class="fab fa-whatsapp me-1"></i> Hubungi Teknisi
                </a>
                <a href="/" class="btn btn-light border" style="border-radius: 10px;">
                    <i class="fa fa-arrow-left me-1"></i> Kembali ke Beranda
                </a>
            </div>
        </div>
    </div>
</div>

@endsection
