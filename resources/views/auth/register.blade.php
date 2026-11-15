@extends('layouts.public')

@section('content')
<style>
    .auth-card {
        background: #fff;
        border-radius: 1.25rem;
        padding: 36px 32px;
        box-shadow: var(--shadow-soft);
        max-width: 480px;
        margin: 24px auto;
    }
    .auth-form .form-control {
        background: var(--canvas);
        border: 1px solid transparent;
        border-radius: .75rem;
        padding: 12px 14px;
        transition: border-color .2s ease, box-shadow .2s ease, background-color .2s ease;
    }
    .auth-form .form-control:focus {
        border-color: var(--brand);
        box-shadow: 0 0 0 .2rem rgba(238, 77, 45, .12);
        background: #fff;
        outline: none;
    }
    .btn-orange {
        background: var(--brand);
        color: #fff;
        border: none;
        border-radius: 50rem;
        padding: 12px 22px;
        font-weight: 700;
        transition: background-color .2s ease, transform .2s ease;
    }
    .btn-orange:hover {
        background: var(--brand-dark);
        color: #fff;
        transform: translateY(-1px);
    }
</style>

<div class="auth-card">
    <div class="text-center mb-4">
        <span class="badge rounded-pill px-3 py-2 mb-2" style="background: var(--brand-soft); color: var(--brand);">PENDAFTARAN BARU</span>
        <h4 class="fw-bold mb-1">Buat Akun Pelanggan</h4>
        <p class="text-muted small mb-0">Toko Elektronik Sony Prima Jaya</p>
    </div>

    <form action="{{ route('register') }}" method="POST" class="auth-form">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label small fw-bold">Nama Lengkap</label>
            <input type="text" id="nama" name="nama" class="form-control @error('nama') is-invalid @enderror"
                placeholder="Contoh: Budi Santoso" value="{{ old('nama') }}" required autofocus>
            @error('nama')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label small fw-bold">Email</label>
            <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror"
                placeholder="nama@email.com" value="{{ old('email') }}" required>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="no_hp" class="form-label small fw-bold">Nomor HP / WhatsApp</label>
            <input type="text" id="no_hp" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror"
                placeholder="Contoh: 081234567890" value="{{ old('no_hp') }}" required>
            @error('no_hp')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label small fw-bold">Alamat <span class="text-muted fw-normal">(Opsional)</span></label>
            <textarea id="alamat" name="alamat" rows="2" class="form-control @error('alamat') is-invalid @enderror"
                placeholder="Jl. Kayangan, Pekanbaru">{{ old('alamat') }}</textarea>
            @error('alamat')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="row g-2 mb-4">
            <div class="col-sm-6">
                <label for="password" class="form-label small fw-bold">Password</label>
                <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror"
                    placeholder="Minimal 6 karakter" required>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-sm-6">
                <label for="password_confirmation" class="form-label small fw-bold">Ulangi Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control"
                    placeholder="Ketik ulang password" required>
            </div>
        </div>

        <button type="submit" class="btn btn-orange w-100 mb-3">
            <i class="fa fa-user-plus me-1"></i> Daftar Sekarang
        </button>

        <p class="text-center small text-muted mb-0">
            Sudah punya akun? <a href="{{ route('login') }}" class="fw-bold text-decoration-none" style="color: var(--brand);">Masuk di sini</a>
        </p>
    </form>
</div>
@endsection
