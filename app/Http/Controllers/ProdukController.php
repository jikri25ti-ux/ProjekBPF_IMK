<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Produk;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['dataProduk'] = Produk::all();
        return view('admin.produk.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.produk.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:150',
            'harga'       => 'required|integer|min:0',
            'stok'        => 'required|integer|min:0',
            'kategori'    => 'required|string|max:100',
            'gambar'      => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ], [
            'nama_produk.required' => 'Nama produk wajib diisi.',
            'nama_produk.max'      => 'Nama produk maksimal 150 karakter.',
            'harga.required'       => 'Harga wajib diisi.',
            'harga.integer'        => 'Harga harus berupa angka.',
            'harga.min'            => 'Harga tidak boleh kurang dari 0.',
            'stok.required'        => 'Stok wajib diisi.',
            'stok.integer'         => 'Stok harus berupa angka.',
            'stok.min'             => 'Stok tidak boleh kurang dari 0.',
            'kategori.required'    => 'Kategori wajib dipilih.',
            'gambar.image'         => 'File harus berupa gambar.',
            'gambar.mimes'         => 'Format gambar harus jpeg, png, jpg, atau webp.',
            'gambar.max'           => 'Ukuran gambar maksimal 2MB.',
        ]);

        $data['nama_produk'] = $request->nama_produk;
        $data['harga'] = $request->harga;
        $data['stok'] = $request->stok;
        $data['kategori'] = $request->kategori;

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('produk', 'public');
        }

        Produk::create($data);

        return redirect()->route('produk.index')->with('success', 'Penambahan Data Produk Berhasil!');
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
        $data['dataProduk'] = Produk::findOrFail($id);
        return view('admin.produk.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:150',
            'harga'       => 'required|integer|min:0',
            'stok'        => 'required|integer|min:0',
            'kategori'    => 'required|string|max:100',
            'gambar'      => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ], [
            'nama_produk.required' => 'Nama produk wajib diisi.',
            'nama_produk.max'      => 'Nama produk maksimal 150 karakter.',
            'harga.required'       => 'Harga wajib diisi.',
            'harga.integer'        => 'Harga harus berupa angka.',
            'harga.min'            => 'Harga tidak boleh kurang dari 0.',
            'stok.required'        => 'Stok wajib diisi.',
            'stok.integer'         => 'Stok harus berupa angka.',
            'stok.min'             => 'Stok tidak boleh kurang dari 0.',
            'kategori.required'    => 'Kategori wajib dipilih.',
            'gambar.image'         => 'File harus berupa gambar.',
            'gambar.mimes'         => 'Format gambar harus jpeg, png, jpg, atau webp.',
            'gambar.max'           => 'Ukuran gambar maksimal 2MB.',
        ]);

        $produk = Produk::findOrFail($id);

        $produk->nama_produk = $request->nama_produk;
        $produk->harga = $request->harga;
        $produk->stok = $request->stok;
        $produk->kategori = $request->kategori;

        if ($request->hasFile('gambar')) {
            if ($produk->gambar && Storage::disk('public')->exists($produk->gambar)) {
                Storage::disk('public')->delete($produk->gambar);
            }
            $produk->gambar = $request->file('gambar')->store('produk', 'public');
        }

        $produk->save();

        return redirect()->route('produk.index')->with('success', 'Perubahan Data Produk Berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produk = Produk::findOrFail($id);

        if ($produk->gambar && Storage::disk('public')->exists($produk->gambar)) {
            Storage::disk('public')->delete($produk->gambar);
        }

        $produk->delete();
        return redirect()->route('produk.index')->with('success', 'Data produk berhasil dihapus');
    }
}
