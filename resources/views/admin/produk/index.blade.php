@extends('layouts.admin')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h4 class="fw-bold mb-1">Data Produk Elektronik</h4>
                <p class="text-muted mb-0">Daftar seluruh produk dan stok barang toko</p>
            </div>
            <div>
                <a href="{{ route('produk.create') }}" class="btn btn-primary">Tambah Produk</a>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card">
            <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Gambar</th>
                            <th>Nama Produk</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($dataProduk as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    @if ($item->gambar)
                                        <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->nama_produk }}" width="60" height="60" style="object-fit: cover; border-radius: 6px;">
                                    @else
                                        <span class="badge bg-label-secondary">Tidak ada foto</span>
                                    @endif
                                </td>
                                <td>{{ $item->nama_produk }}</td>
                                <td>{{ $item->kategori }}</td>
                                <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                                <td>{{ $item->stok }}</td>
                                <td>
                                    <a href="{{ route('produk.edit', $item->id) }}" class="btn btn-info btn-sm">Edit</a>
                                    <form action="{{ route('produk.destroy', $item->id) }}" method="POST" style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus produk ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
