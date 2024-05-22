@extends('layouts.page')
@section('page')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Edit Satuan</h1>
    <div class="card shadow mb-4">
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('satuan.update', $satuan->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="satuan">Nama Satuan</label>
                    <input type="text" name="satuan" class="form-control" id="satuan" value="{{ $satuan->satuan }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection