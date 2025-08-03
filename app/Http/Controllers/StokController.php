<?php

namespace App\Http\Controllers;

use App\Models\stok;
use Illuminate\Http\Request;

class StokController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stoks = stok::all();
        return view('admin.stok.index', compact('stoks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.stok.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:225',
            'jumlah' => 'required|integer|min:0',
            'harga' => 'required|numeric|min:0',
        ]);

        stok::create([
            'nama_barang' => $request->nama_barang,
            'jumlah' => $request->jumlah,
            'harga' => $request->harga,
        ]);

        return redirect()->route('stok.index')->with('success', 'Stok berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(stok $stok)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(stok $stok)
    {
        return view('admin.stok.edit', compact('stok'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, stok $stok)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:225',
            'jumlah' => 'required|integer|min:0',
            'harga' => 'required|numeric|min:0',
        ]);

        $stok = stok::findOrFail($stok->id);

        $stok->update([
            'nama_barang' => $request->nama_barang,
            'jumlah' => $request->jumlah,
            'harga' => $request->harga,
        ]);

        return redirect()->route('stok.index')->with('success', 'Stok berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(stok $stok)
    {
        $stok->delete();
        return redirect()->route('stok.index')->with('warning', 'Stok berhasil dihapus');
    }
}
