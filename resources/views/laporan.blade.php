@extends('layouts.page')
@section('page')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Laporan</h1>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <div class="my-2 mx-2">
                  <a href="{{ route('laporan.print') }}" class="btn btn-dark btn-sm">
                    <span class="icon text-white-50">
                        <i class="fas fa-print"></i>
                    </span>
                    <span class="text"></span><strong>Print</strong>
                </a>
                </div>
                <table class="table text-center" id="dataTable" width="100%" cellspacing="0" style="font-size: 12px">
                    <thead>
                        <tr>
                            <th width="3px">No</th>
                            <th>Kode Obat</th>
                            <th>Nama Obat</th>
                            <th>Tanggal Masuk</th>
                            <th>Jumlah Obat Masuk</th>
                            <th>Tanggal Keluar</th>
                            <th>Jumlah Obat Keluar</th>
                            <th>Stok Sekarang</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data_obat as $index => $obat)
                            @php $max_count = max(count($obat->obat_masuk), count($obat->obat_keluar)); @endphp
                            @for ($i = 0; $i < $max_count; $i++)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    @if ($i == 0)
                                        <td rowspan="{{ $max_count }}">{{ $obat->kode_obat }}</td>
                                        <td rowspan="{{ $max_count }}">{{ $obat->nama_obat }}</td>
                                    @endif
                                    @if (isset($obat->obat_masuk[$i]))
                                        <td>{{ $obat->obat_masuk[$i]->tanggal_masuk }}</td>
                                        <td>{{ $obat->obat_masuk[$i]->jumlah }}</td>
                                    @else
                                        <td></td>
                                        <td></td>
                                    @endif
                                    @if (isset($obat->obat_keluar[$i]))
                                        <td>{{ $obat->obat_keluar[$i]->tanggal_keluar }}</td>
                                        <td>{{ $obat->obat_keluar[$i]->sisa }}</td>
                                    @else
                                        <td></td>
                                        <td></td>
                                    @endif
                                    <td>{{ $obat->stok }}</td>
                                </tr>
                            @endfor
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
