@extends('layouts.page')
@section('page')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Data Obat Masuk</h1>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">

                <div class="my-2"></div>
                <a href="#" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#exampleModalCenter"> 
                  <span class="icon text-white-50">
                    <i class="fas fa-folder-open"></i>
                  </span>
                  <span class="text"></span><strong>Tambah Data </strong>
                </a><p />

              <table class="table" id="dataTable" width="100%" cellspacing="0" style="font-size: 12px" >
                <thead>

                  <tr>
                    <th>Kode Obat</th>
                    <th>Nama Obat</th>
                    <th>Tanggal Keluar</th>
                    <th>Kategori</th>
                    <th>Satuan</th>
                    <th>Jumlah Obat Masuk</th>
                  </tr>

                  <tbody>                
                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td align=center>
                          <a href='' class='btn btn-primary btn-sm'><span class='fa fa-edit'></span></a>
                        </td>
                      </tr>
              </table>
            </div>
          </div>
    </div>
</div>
@endsection