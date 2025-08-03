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
            <div class="col-md-6 mx-auto">
                <div class="card">
                    <h2 class="card-header">Tambah Stok</h2>
                    <div class="card-body">
                        <form action="{{ route('stok.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nama_barang" class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" id="nama_barang" name="nama_barang" required>
                    </div>
                    <div class="mb-3">
                        <label for="jumlah" class="form-label">Jumlah</label>
                        <input type="number" class="form-control" id="jumlah" name="jumlah" required>
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="number" class="form-control" id="harga" name="harga" maxlength="10" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
