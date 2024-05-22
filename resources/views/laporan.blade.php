@extends('layouts.page')
@section('page')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Laporan</h1>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">

                <div class="my-2"></div>
                <a href="#" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#exampleModalCenter"> 
                  <span class="icon text-white-50">
                    <i class="fas fa-print"></i>
                  </span>
                  <span class="text"></span><strong>Print</strong>
                </a><p />

              <table class="table" id="dataTable" width="100%" cellspacing="0" style="font-size: 12px" >
                <thead>

                  <tr>
                    <th width=3px>No</th>
                    <!-- <th width=10px>Kode</th> -->
                    <th>Kode Obat</th>
                    <th>Nama Obat</th>
                    <th>Jumlah Obat Masuk</th>
                    <th>Jumlah Obat Keluar</th>
                    <th>Stok</th>
                    <th>Sisa</th>
                    <th style="text-align : center" width="140">Aksi</th>
                  </tr>

                  <tbody>                
                      <tr>
                        <td align=center></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td align=center>
                          <a href='' class='btn btn-danger btn-sm'><span class='fa fa-trash'></span></a>
                          <a href='' class='btn btn-primary btn-sm'><span class='fa fa-edit'></span></a>
                        </td>
                      </tr>
              </table>
            </div>
          </div>
    </div>
</div>
@endsection