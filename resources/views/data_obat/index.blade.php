@extends('layouts.page')

@section('page')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Data Obat</h1>
                <a href="{{ route('obat.create') }}" class="btn btn-success">Tambah Data Obat</a>
                <table id="table" class="table mt-3 text-center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Obat</th>
                            <th>Nama Obat</th>
                            <th>Tanggal Expired</th>
                            <th>Stok</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data_obat as $index => $obat)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $obat->kode_obat }}</td>
                                <td>{{ $obat->nama_obat }}</td>
                                <td>{{ $obat->tanggal_expired }}</td>
                                <td>{{ $obat->stok }}</td>
                                <td>
                                    <a href="{{ route('obat.update', $obat->id) }}" class="btn btn-primary"><span class='fa fa-edit'></span></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        @if(session('success'))
            Swal.fire({
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonText: 'OK',
                confirmButtonColor: '#3085d6',
            });
        @endif
    </script>
@endsection
