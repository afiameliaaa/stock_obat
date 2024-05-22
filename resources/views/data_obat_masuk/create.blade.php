@extends('layouts.page')
@section('page')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Tambah Obat Masuk</h1>
    <div class="card shadow mb-4">
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('obat_masuk.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="kode_obat">Nama Obat</label>
                    <select name="kode_obat" class="form-control" id="kode_obat" required>
                        <option value="">Pilih Obat</option>
                        @foreach($dataObat as $obat)
                            <option value="{{ $obat->kode_obat }}">{{ $obat->kode_obat }} - {{ $obat->nama_obat }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="kategori">Kategori</label>
                    <select name="kategori" class="form-control" id="kategori" required>
                        <option value="">Pilih Kategori</option>
                        @foreach($kategori as $kat)
                            <option value="{{ $kat->nama_kategori }}">{{ $kat->nama_kategori }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="satuan">Satuan</label>
                    <select name="satuan" class="form-control" id="satuan" required>
                        <option value="">Pilih Satuan</option>
                        @foreach($satuan as $sat)
                            <option value="{{ $sat->satuan }}">{{ $sat->satuan }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="tanggal_masuk">Tanggal Masuk</label>
                    <input type="date" name="tanggal_masuk" class="form-control" id="tanggal_masuk" required>
                </div>
                <div class="form-group">
                    <label for="jumlah">Jumlah Masuk</label>
                    <input type="number" name="jumlah" class="form-control" id="jumlah" required>
                </div>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </form>
        </div>
    </div>
</div>
@endsection