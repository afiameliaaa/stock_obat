@extends('layouts.page')
@section('page')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Data Obat Keluar</h1>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">

                <div class="my-2">
                  <a href="{{ route('obat.keluar.create') }}" class="btn btn-dark btn-sm">
                    <span class="icon text-white-50">
                      <i class="fas fa-folder-open"></i>
                    </span>
                    <span class="text"><strong>Tambah Obat Keluar</strong></span>
                  </a>
                </div>

                @include('components.flash')
              <table class="table text-center" id="table" width="100%" cellspacing="0" style="font-size: 12px">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Kode Obat</th>
                    <th>Nama Obat</th>
                    <th>Tanggal Keluar</th>
                    <th>Kategori</th>
                    <th>Satuan</th>
                    <th>Jumlah Obat Keluar</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($obatKeluar as $index => $obat)
                      <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $obat->kode_obat }}</td>
                        <td>{{ $obat->nama_obat }}</td>
                        <td>{{ $obat->tanggal_keluar }}</td>
                        <td>{{ $obat->kategori_obat }}</td>
                        <td>{{ $obat->satuan }}</td>
                        <td>{{ $obat->sisa }}</td>
                      </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
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
