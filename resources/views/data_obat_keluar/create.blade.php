@extends('layouts.page')
@section('page')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Tambah Obat Keluar</h1>
    <div class="card shadow mb-4">
        <div class="card-body">
            @include('components.flash')

            <form action="{{ route('obat.keluar.create') }}" method="POST">
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
                    <label for="tanggal_keluar">Tanggal Keluar</label>
                    <input type="date" name="tanggal_keluar" class="form-control" id="tanggal_keluar" required>
                </div>
                <div class="form-group">
                    <label for="stok_kurang">Jumlah Keluar</label>
                    <input type="number" name="stok_kurang" class="form-control" id="stok_kurang" required>
                </div>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </form>
        </div>
    </div>
</div>
<script>
    document.getElementById('tanggal_keluar').setAttribute('min', new Date().toISOString().split("T")[0]);
</script>
@endsection
