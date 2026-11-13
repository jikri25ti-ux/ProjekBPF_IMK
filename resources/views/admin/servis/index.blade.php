@extends('layouts.admin')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h4 class="fw-bold mb-1">Data Manajemen Servis</h4>
                <p class="text-muted mb-0">Daftar antrean dan riwayat perbaikan barang elektronik</p>
            </div>
            <div>
                <a href="{{ route('servis.create') }}" class="btn btn-primary">Tambah Servis</a>
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
                            <th>Kode Servis</th>
                            <th>Pelanggan</th>
                            <th>No. HP</th>
                            <th>Barang</th>
                            <th>Status</th>
                            <th>Biaya</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($dataServis as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><strong>{{ $item->kode_servis }}</strong></td>
                                <td>{{ $item->nama_pelanggan }}</td>
                                <td>{{ $item->no_hp }}</td>
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
                                <td>
                                    <a href="{{ route('servis.edit', $item->id) }}" class="btn btn-info btn-sm">Edit</a>
                                    <form action="{{ route('servis.destroy', $item->id) }}" method="POST" style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data servis ini?')">Hapus</button>
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
