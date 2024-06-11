<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #dddddd;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
            text-align: left;
        }

        body {
            font-family: arial;
        }

        .rangkasurat {
            width: 980px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
        }

        table {
            border-bottom: 5px solid # 000;
            padding: 2px
        }

        .tengah {
            text-align: center;
            line-height: 5px;
        }

        .between {
            display: flex;
            justify-content: space-between;
        }
    </style>
</head>

<body>
    <div id="wrapper">

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <div class="container-fluid">
                    <div class="card shadow mb-4">
                        <div class = "rangkasurat">
                            <table width = "100%">
                                <tr>
                                    <td> <img src="{{ $base64 }}" width="140px"> </td>
                                    <td class = "tengah">
                                        <h2>PEMERINTAH DAERAH PROVINSI JAWA TIMUR</h2>
                                        <h2>RUMAH SAKIT DAERAH (RSD) DR.SOEBANDI</h2>
                                        <b>Jl. DR. Soebandi No.124, Krajan, Patrang, Kec. Patrang Telp . ( 0262 ) 428590 Jember 68111</b>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table text-center" id="dataTable" width="100%" cellspacing="0"
                                    style="font-size: 12px">
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
                                        @foreach ($data_obat as $index => $obat)
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
                        <div class = "rangkasurat">
                            <table width="100%" style="margin: 5px">
                                <tr>
                                    <td class="tengah">
                                        <div>
                                            KABAG
                                            <div style="width: 200px; height: 100px;"></div>
                                        </div>
                                    </td>
                                    <td class="tengah">
                                        <div>
                                            APOTEKER
                                            <div style="width: 200px; height: 100px;"></div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
    <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('js/demo/chart-pie-demo.js') }}"></script>
</body>

</html>
