@extends('layouts.admin_template')

@section('title-page', 'stok')

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
                    <a href="{{ route('stok.create') }}" class="btn btn-primary">Tambah Stok</a>
                </div>
                <div class="card">
                    <h2 class="card-header">Stok</h2>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nama barang</th>
                                    <th>Jumlah</th>
                                    <th>Harga</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($stoks as $stok)
                                    <tr>
                                        <td>{{ $stok->nama_barang }}</td>
                                        <td>{{ $stok->jumlah }}</td>
                                        <td>{{ $stok->harga }}</td>
                                        <td>
                                            <a href="{{ route('stok.edit', $stok) }}" class="btn btn-warning">Edit</a>
                                            <form action="{{ route('stok.destroy', $stok) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus stok {{ $stok->nama_barang }}?')">Hapus</button>
                                            </form>
                                        </td>
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
