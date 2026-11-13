@extends('layouts.admin')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h4 class="fw-bold mb-1">Edit Produk</h4>
                <p class="text-muted mb-0">Form perubahan data produk elektronik</p>
            </div>
            <div>
                <a href="{{ route('produk.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('produk.update', $dataProduk->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="nama_produk" class="form-label">Nama Produk</label>
                                <input type="text" id="nama_produk" name="nama_produk" class="form-control @error('nama_produk') is-invalid @enderror" value="{{ old('nama_produk', $dataProduk->nama_produk) }}">
                                @error('nama_produk')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="kategori" class="form-label">Kategori</label>
                                <select id="kategori" name="kategori" class="form-select @error('kategori') is-invalid @enderror">
                                    <option value="">-- Pilih Kategori --</option>
                                    <option value="Televisi" {{ old('kategori', $dataProduk->kategori) == 'Televisi' ? 'selected' : '' }}>Televisi</option>
                                    <option value="Mesin Cuci" {{ old('kategori', $dataProduk->kategori) == 'Mesin Cuci' ? 'selected' : '' }}>Mesin Cuci</option>
                                    <option value="Kipas Angin" {{ old('kategori', $dataProduk->kategori) == 'Kipas Angin' ? 'selected' : '' }}>Kipas Angin</option>
                                    <option value="Speaker" {{ old('kategori', $dataProduk->kategori) == 'Speaker' ? 'selected' : '' }}>Speaker</option>
                                    <option value="Kabel & Adaptor" {{ old('kategori', $dataProduk->kategori) == 'Kabel & Adaptor' ? 'selected' : '' }}>Kabel & Adaptor</option>
                                    <option value="Lainnya" {{ old('kategori', $dataProduk->kategori) == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                                @error('kategori')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="gambar" class="form-label">Ganti Foto Produk (Kosongkan jika tidak diubah)</label>
                                <input type="file" id="gambar" name="gambar" class="form-control @error('gambar') is-invalid @enderror">
                                @error('gambar')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                @if ($dataProduk->gambar)
                                    <div class="mt-2">
                                        <img src="{{ asset('storage/' . $dataProduk->gambar) }}" alt="{{ $dataProduk->nama_produk }}" width="100" style="border-radius: 6px;">
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="harga" class="form-label">Harga (Rp)</label>
                                <input type="number" id="harga" name="harga" class="form-control @error('harga') is-invalid @enderror" value="{{ old('harga', $dataProduk->harga) }}">
                                @error('harga')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="stok" class="form-label">Stok</label>
                                <input type="number" id="stok" name="stok" class="form-control @error('stok') is-invalid @enderror" value="{{ old('stok', $dataProduk->stok) }}">
                                @error('stok')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            <a href="{{ route('produk.index') }}" class="btn btn-outline-secondary ms-2">Batal</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
