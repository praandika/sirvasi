@extends('layouts.main')
@section('title','Edit User')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Edit User</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form action="{{ route('admin.update') }}" method="post" id="store-form">
            @csrf
            <div class="modal-body">
                <input type="hidden" value="{{ $data->id }}" name="id">
                <!-- Nama -->
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter name" name="name"
                        value="{{ $data->name }}" required>
                </div>

                <!-- Email -->
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email"
                        name="email" value="{{ $data->email }}" required>
                </div>
                <!-- Username -->
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" placeholder="Enter username" name="username"
                        value="{{ $data->username }}" required>
                </div>
                <!-- Kontak -->
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" id="phone" placeholder="Enter phone number" name="phone"
                        value="{{ $data->phone }}" required>
                </div>
                <!-- Akses -->
                <div class="form-group">
                    <label>Akses</label>
                    <select class="custom-select" name="access" required>
                        @if($data->access == "admin")
                        <option value="{{ $data->access }}">Administrator</option>
                        <option value="head">Pimpinan</option>
                        @else
                        <option value="{{ $data->access }}">Administrator</option>
                        <option value="admin">Administrator</option>
                        @endif
                    </select>
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
