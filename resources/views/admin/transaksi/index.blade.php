@extends('layouts.admin_template')

@section('title-page', 'Teransaksi')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (session('warning'))
        <div class="alert alert-danger">
            {{ session('warning') }}
        </div>
    @endif
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-end align-items-center mb-3">
                    <a href="{{ route('transaksi.create') }}" class="btn btn-primary">Tambah Transaksi</a>
                </div>
                <div class="card">
                    <h2 class="card-header">Transaksi</h2>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nama Barang</th>
                                    <th>Tanggal Transaksi</th>
                                    <th>Jumlah Barang</th>
                                    <th>Total Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transaksi as $item)
                                    <tr>
                                        <td>{{ $item->stok->nama_barang }}</td>
                                        <td>{{ \Carbon\Carbon::parse($item->tanggal_transaksi) }}</td>
                                        <td>{{ $item->jumlah_barang }}</td>
                                        <td>{{ $item->total_harga }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
