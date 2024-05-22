@extends('layouts.page')

@section('page')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Tambah Data Obat</h1>
                <form action="{{ route('data_obat.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="kode_obat">Kode Obat</label>
                        <input type="text" class="form-control" id="kode_obat" name="kode_obat">
                    </div>
                    <div class="form-group">
                        <label for="nama_obat">Nama Obat</label>
                        <input type="text" class="form-control" id="nama_obat" name="nama_obat">
                    </div>
                    <div class="form-group">
                        <label for="tanggal_masuk">Tanggal Masuk</label>
                        <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk">
                    </div>
                    <div class="form-group">
                        <label for="tanggal_expired">Tanggal Expired</label>
                        <input type="date" class="form-control" id="tanggal_expired" name="tanggal_expired">
                    </div>
                    <div class="form-group">
                        <label for="stok">Stok</label>
                        <input type="number" class="form-control" id="stok" name="stok">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection