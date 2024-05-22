@extends('layouts.page')

@section('page')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Data Obat</h1>
                <a href="{{ route('data_obat.create') }}" class="btn btn-success">Tambah Data Obat</a>
                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th>Kode Obat</th>
                            <th>Nama Obat</th>
                            <th>Tanggal Masuk</th>
                            <th>Tanggal Expired</th>
                            <th>Stok</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data_obat as $obat)
                            <tr>
                                <td>{{ $obat->kode_obat }}</td>
                                <td>{{ $obat->nama_obat }}</td>
                                <td>{{ $obat->tanggal_masuk }}</td>
                                <td>{{ $obat->tanggal_expired }}</td>
                                <td>{{ $obat->stok }}</td>
                                <td>
                                    <a href="{{ route('data_obat.edit', $obat->kode_obat) }}" class="btn btn-primary"><span class='fa fa-edit'></span></a>
                                    <form action="{{ route('data_obat.destroy', $obat->kode_obat) }}" method="POST" style="display: inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"><span class='fa fa-trash'></span></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection