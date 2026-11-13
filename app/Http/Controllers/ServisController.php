<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servis;

class ServisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['dataServis'] = Servis::all();
        return view('admin.servis.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.servis.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_servis'    => 'required|string|max:50|unique:servis,kode_servis',
            'nama_pelanggan' => 'required|string|max:100',
            'no_hp'          => 'required|numeric',
            'nama_barang'    => 'required|string|max:150',
            'kerusakan'      => 'required|string',
            'status'         => 'required|in:Menunggu,Sedang Dikerjakan,Selesai,Diambil',
            'biaya'          => 'nullable|integer|min:0',
        ], [
            'kode_servis.required'    => 'Kode servis wajib diisi.',
            'kode_servis.unique'      => 'Kode servis sudah digunakan.',
            'nama_pelanggan.required' => 'Nama pelanggan wajib diisi.',
            'nama_pelanggan.max'      => 'Nama pelanggan maksimal 100 karakter.',
            'no_hp.required'          => 'Nomor HP wajib diisi.',
            'no_hp.numeric'           => 'Nomor HP harus berupa angka.',
            'nama_barang.required'    => 'Nama barang wajib diisi.',
            'kerusakan.required'      => 'Keterangan kerusakan wajib diisi.',
            'status.required'         => 'Status servis wajib dipilih.',
            'status.in'               => 'Status servis tidak valid.',
            'biaya.integer'           => 'Biaya harus berupa angka.',
            'biaya.min'               => 'Biaya tidak boleh kurang dari 0.',
        ]);

        $data['kode_servis'] = $request->kode_servis;
        $data['nama_pelanggan'] = $request->nama_pelanggan;
        $data['no_hp'] = $request->no_hp;
        $data['nama_barang'] = $request->nama_barang;
        $data['kerusakan'] = $request->kerusakan;
        $data['status'] = $request->status;
        $data['biaya'] = $request->biaya;

        Servis::create($data);

        return redirect()->route('servis.index')->with('success', 'Penambahan Data Servis Berhasil!');
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
        $data['dataServis'] = Servis::findOrFail($id);
        return view('admin.servis.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'kode_servis'    => 'required|string|max:50|unique:servis,kode_servis,' . $id,
            'nama_pelanggan' => 'required|string|max:100',
            'no_hp'          => 'required|numeric',
            'nama_barang'    => 'required|string|max:150',
            'kerusakan'      => 'required|string',
            'status'         => 'required|in:Menunggu,Sedang Dikerjakan,Selesai,Diambil',
            'biaya'          => 'nullable|integer|min:0',
        ], [
            'kode_servis.required'    => 'Kode servis wajib diisi.',
            'kode_servis.unique'      => 'Kode servis sudah digunakan.',
            'nama_pelanggan.required' => 'Nama pelanggan wajib diisi.',
            'nama_pelanggan.max'      => 'Nama pelanggan maksimal 100 karakter.',
            'no_hp.required'          => 'Nomor HP wajib diisi.',
            'no_hp.numeric'           => 'Nomor HP harus berupa angka.',
            'nama_barang.required'    => 'Nama barang wajib diisi.',
            'kerusakan.required'      => 'Keterangan kerusakan wajib diisi.',
            'status.required'         => 'Status servis wajib dipilih.',
            'status.in'               => 'Status servis tidak valid.',
            'biaya.integer'           => 'Biaya harus berupa angka.',
            'biaya.min'               => 'Biaya tidak boleh kurang dari 0.',
        ]);

        $servis = Servis::findOrFail($id);

        $servis->kode_servis = $request->kode_servis;
        $servis->nama_pelanggan = $request->nama_pelanggan;
        $servis->no_hp = $request->no_hp;
        $servis->nama_barang = $request->nama_barang;
        $servis->kerusakan = $request->kerusakan;
        $servis->status = $request->status;
        $servis->biaya = $request->biaya;

        $servis->save();

        return redirect()->route('servis.index')->with('success', 'Perubahan Data Servis Berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $servis = Servis::findOrFail($id);

        $servis->delete();
        return redirect()->route('servis.index')->with('success', 'Data servis berhasil dihapus');
    }
}
