@extends('layouts.page')

@section('page')
<div class="container-fluid"> 
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>
    <div class="row">
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                <h6 class="fw-bold">Data Daftar Obat</h6>
                            </div>
                            <div class="h5 mb-0 display-6 font-weight-bold text-gray-800">{{ $jumlahObat }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-fw fa-pills fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                <h6 class="fw-bold">Data Obat Masuk</h6>
                            </div>
                            <div class="h5 mb-0 display-6 font-weight-bold text-gray-800">{{ $jumlahObatMasuk }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-fw fa-box-open fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                <h6 class="fw-bold">Data Obat Keluar</h6>
                            </div>
                            <div class="h5 display-6 mb-0 font-weight-bold text-gray-800">{{ $jumlahObatKeluar }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-fw fa-box fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="chart-area">
                                <canvas id="ChartObatMasuk"></canvas>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="chart-area">
                                <canvas id="ChartObatKeluar"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var obatMasukLabels = [
        @foreach($obatMasukPerBulan as $data)
            "{{ $data->tanggal }}",
        @endforeach
    ];
    var obatMasukData = [
        @foreach($obatMasukPerBulan as $data)
            {{ $data->jumlah }},
        @endforeach
    ];

    var ctxMasuk = document.getElementById('ChartObatMasuk').getContext('2d');
    var chartMasuk = new Chart(ctxMasuk, {
        type: 'line',
        data: {
            labels: obatMasukLabels,
            datasets: [{
                label: 'Obat Masuk',
                data: obatMasukData,
                borderColor: 'rgba(75, 192, 192, 1)',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                fill: false,
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    var obatKeluarLabels = [
        @foreach($obatKeluarPerBulan as $data)
            "{{ $data->tanggal }}",
        @endforeach
    ];
    var obatKeluarData = [
        @foreach($obatKeluarPerBulan as $data)
            {{ $data->jumlah }},
        @endforeach
    ];

    var ctxKeluar = document.getElementById('ChartObatKeluar').getContext('2d');
    var chartKeluar = new Chart(ctxKeluar, {
        type: 'line',
        data: {
            labels: obatKeluarLabels,
            datasets: [{
                label: 'Obat Keluar',
                data: obatKeluarData,
                borderColor: 'rgba(255, 99, 132, 1)',
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                fill: false,
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endsection
