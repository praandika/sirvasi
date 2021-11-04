@extends('layouts.main')
@section('title','Edit Fasilitas')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Edit Fasilitas</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form action="{{ route('facilities.update',$facility->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="modal-body">
                    <!-- Nama -->
                    <div class="form-group">
                        <label for="facility_name">Nama Fasilitas</label>
                        <input type="text" class="form-control" id="facility_name" placeholder="Enter facilities name"
                            name="facility_name" value="{{ $facility->facility_name }}" required>
                    </div>

                    <label for="facility_price">Harga Fasilitas</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp</span>
                        </div>
                        <input type="number" class="form-control" id="facility_price"
                            placeholder="Enter facilities price" name="facility_price"
                            value="{{ $facility->facility_price }}" required>
                    </div>
                </div>
            <div class="modal-footer justify-content-between">
                <button type="reset" class="btn btn-default">Reset</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
@endsection
