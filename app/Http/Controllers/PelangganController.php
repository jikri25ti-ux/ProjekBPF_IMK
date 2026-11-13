<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Pelanggan;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['dataPelanggan'] = Pelanggan::all();
        return view('admin.pelanggan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pelanggan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama'     => 'required|string|max:100',
            'email'    => 'required|email|unique:pelanggans,email',
            'password' => 'required|min:8|confirmed',
            'no_hp'    => 'required|numeric|unique:pelanggans,no_hp',
            'alamat'   => 'required|string',
            'role'     => 'required|in:admin,pelanggan',
        ], [
            'nama.required'      => 'Nama wajib diisi.',
            'nama.max'           => 'Nama maksimal 100 karakter.',
            'email.required'     => 'Email wajib diisi.',
            'email.email'        => 'Format email tidak valid.',
            'email.unique'       => 'Email sudah terdaftar.',
            'password.required'  => 'Password wajib diisi.',
            'password.min'       => 'Password minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
            'no_hp.required'     => 'Nomor HP wajib diisi.',
            'no_hp.numeric'      => 'Nomor HP harus berupa angka.',
            'no_hp.unique'       => 'Nomor HP sudah terdaftar.',
            'alamat.required'    => 'Alamat wajib diisi.',
            'role.required'      => 'Role wajib dipilih.',
            'role.in'            => 'Role hanya boleh admin atau pelanggan.',
        ]);

        $data['nama'] = $request->nama;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $data['no_hp'] = $request->no_hp;
        $data['alamat'] = $request->alamat;
        $data['role'] = $request->role;

        Pelanggan::create($data);

        return redirect()->route('pelanggan.index')->with('success', 'Penambahan Data Berhasil!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['dataPelanggan'] = Pelanggan::findOrFail($id);
        return view('admin.pelanggan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama'     => 'required|string|max:100',
            'email'    => 'required|email|unique:pelanggans,email,' . $id,
            'password' => 'nullable|min:8|confirmed',
            'no_hp'    => 'required|numeric|unique:pelanggans,no_hp,' . $id,
            'alamat'   => 'required|string',
            'role'     => 'required|in:admin,pelanggan',
        ], [
            'nama.required'      => 'Nama wajib diisi.',
            'nama.max'           => 'Nama maksimal 100 karakter.',
            'email.required'     => 'Email wajib diisi.',
            'email.email'        => 'Format email tidak valid.',
            'email.unique'       => 'Email sudah terdaftar.',
            'password.min'       => 'Password minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
            'no_hp.required'     => 'Nomor HP wajib diisi.',
            'no_hp.numeric'      => 'Nomor HP harus berupa angka.',
            'no_hp.unique'       => 'Nomor HP sudah terdaftar.',
            'alamat.required'    => 'Alamat wajib diisi.',
            'role.required'      => 'Role wajib dipilih.',
            'role.in'            => 'Role hanya boleh admin atau pelanggan.',
        ]);

        $pelanggan = Pelanggan::findOrFail($id);

        $pelanggan->nama = $request->nama;
        $pelanggan->email = $request->email;
        $pelanggan->no_hp = $request->no_hp;
        $pelanggan->alamat = $request->alamat;
        $pelanggan->role = $request->role;

        if ($request->filled('password')) {
            $pelanggan->password = Hash::make($request->password);
        }

        $pelanggan->save();

        return redirect()->route('pelanggan.index')->with('success', 'Perubahan Data Berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pelanggan = Pelanggan::findOrFail($id);

        $pelanggan->delete();
        return redirect()->route('pelanggan.index')->with('success', 'Data berhasil dihapus');
    }
}
