@extends('layouts.page')
@section('page')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Data Satuan</h1>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <div class="my-2">
                  <a href="{{ route('satuan.create') }}" class="btn btn-dark btn-sm">
                    <span class="icon text-white-50">
                      <i class="fas fa-folder-open"></i>
                    </span>
                    <span class="text"><strong>Tambah Satuan</strong></span>
                  </a>
                </div>
                @include('components.flash')
              <table class="table text-center" id="table" width="100%" cellspacing="0" style="font-size: 12px">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Satuan</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($satuan as $sat)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $sat->satuan }}</td>
                        <td>
                            <a href="{{ route('satuan.update', $sat->id) }}" class="btn btn-primary btn-sm"><span class='fa fa-edit'></span></a>
                            <form action="{{ route('satuan.delete', $sat->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm"><span class='fa fa-trash'></span></button>
                            </form>
                        </td>
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
