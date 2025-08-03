<?php

namespace App\Http\Controllers;

use App\Models\stok;
use App\Models\transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transaksi = transaksi::with('stok')->get();
        return view('admin.transaksi.index', compact('transaksi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $stok = stok::all();
        return view('admin.transaksi.create', compact('stok'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'stok_id' => 'required|exists:stok,id',
            'tanggal_transaksi' => 'required|date',
            'jumlah_barang' => 'required|integer|min:0',
        ]);

        $stok = stok::findOrFail($request->stok_id);
        if($request->jumlah_barang > $stok->jumlah){
            return redirect()->back()->with('warning', 'Jumlah barang melebihi stok yang tersedia');
        }else{
            $stok->jumlah -= $request->jumlah_barang;
            $stok->save();
        }

        transaksi::create([
            'stok_id' => $request->stok_id,
            'tanggal_transaksi' => $request->tanggal_transaksi,
            'jumlah_barang' => $request->jumlah_barang,
            'total_harga' => $request->jumlah_barang * $stok->harga,
        ]);

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil ditambahkan');
    }
}
