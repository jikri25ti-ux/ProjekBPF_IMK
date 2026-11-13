@extends('layouts.admin')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h4 class="fw-bold mb-1">Edit Data Servis</h4>
                <p class="text-muted mb-0">Form pembaruan status dan rincian perbaikan barang</p>
            </div>
            <div>
                <a href="{{ route('servis.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('servis.update', $dataServis->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="kode_servis" class="form-label">Kode Servis / Nomor Bon</label>
                                <input type="text" id="kode_servis" name="kode_servis" class="form-control @error('kode_servis') is-invalid @enderror" value="{{ old('kode_servis', $dataServis->kode_servis) }}">
                                @error('kode_servis')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="nama_pelanggan" class="form-label">Nama Pelanggan</label>
                                <input type="text" id="nama_pelanggan" name="nama_pelanggan" class="form-control @error('nama_pelanggan') is-invalid @enderror" value="{{ old('nama_pelanggan', $dataServis->nama_pelanggan) }}">
                                @error('nama_pelanggan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="no_hp" class="form-label">Nomor HP / WhatsApp</label>
                                <input type="text" id="no_hp" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror" value="{{ old('no_hp', $dataServis->no_hp) }}">
                                @error('no_hp')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="nama_barang" class="form-label">Nama Barang Elektronik</label>
                                <input type="text" id="nama_barang" name="nama_barang" class="form-control @error('nama_barang') is-invalid @enderror" value="{{ old('nama_barang', $dataServis->nama_barang) }}">
                                @error('nama_barang')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="status" class="form-label">Status Pengerjaan</label>
                                <select id="status" name="status" class="form-select @error('status') is-invalid @enderror">
                                    <option value="Menunggu" {{ old('status', $dataServis->status) == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
                                    <option value="Sedang Dikerjakan" {{ old('status', $dataServis->status) == 'Sedang Dikerjakan' ? 'selected' : '' }}>Sedang Dikerjakan</option>
                                    <option value="Selesai" {{ old('status', $dataServis->status) == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                                    <option value="Diambil" {{ old('status', $dataServis->status) == 'Diambil' ? 'selected' : '' }}>Diambil</option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="biaya" class="form-label">Biaya Servis (Rp - Opsional)</label>
                                <input type="number" id="biaya" name="biaya" class="form-control @error('biaya') is-invalid @enderror" value="{{ old('biaya', $dataServis->biaya) }}">
                                @error('biaya')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-3">
                                <label for="kerusakan" class="form-label">Keterangan Kerusakan</label>
                                <textarea id="kerusakan" name="kerusakan" rows="3" class="form-control @error('kerusakan') is-invalid @enderror">{{ old('kerusakan', $dataServis->kerusakan) }}</textarea>
                                @error('kerusakan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            <a href="{{ route('servis.index') }}" class="btn btn-outline-secondary ms-2">Batal</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
