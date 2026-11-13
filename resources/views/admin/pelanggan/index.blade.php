@extends('layouts.admin')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h4 class="fw-bold mb-1">Data Pelanggan & Pengguna</h4>
                <p class="text-muted mb-0">Daftar seluruh akun pelanggan dan admin terdaftar</p>
            </div>
            <div>
                <a href="{{ route('pelanggan.create') }}" class="btn btn-primary">Tambah Pelanggan</a>
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
                            <th>Nama</th>
                            <th>Email</th>
                            <th>No. HP</th>
                            <th>Role</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($dataPelanggan as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->no_hp }}</td>
                                <td>
                                    <span class="badge bg-label-{{ $item->role == 'admin' ? 'primary' : 'secondary' }}">
                                        {{ ucfirst($item->role) }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('pelanggan.edit', $item->id) }}" class="btn btn-info btn-sm">Edit</a>
                                    <form action="{{ route('pelanggan.destroy', $item->id) }}" method="POST" style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
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
