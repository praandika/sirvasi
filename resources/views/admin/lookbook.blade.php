@extends('layouts.main')
@section('title','Reservation Details')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Details</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="modal-body">
            <div class="row">
                @foreach($data as $o)
                <div class="col-lg-6">
                    <h3 class="mb-3">#{{ $o->book_code }}</h3>
                    <img src="{{ asset('photos/featured/'.$o->featured_img) }}" alt="Foto Kamar" style="width: 100%;">
                </div>
                <div class="col-lg-6">
                    <h3>Informasi</h3>
                    <table class="table table-striped">
                        <tr>
                            <th>Tamu</th>
                            <td>{{ $o->name }}</td>
                        </tr>
                        <tr>
                            <th>Kontak</th>
                            <td>{{ $o->phone }}</td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td>{{ $o->address }}</td>
                        </tr>
                        <tr>
                            <th>Check In</th>
                            <td>{{ $o->check_in }}</td>
                        </tr>
                        <tr>
                            <th>Check Out</th>
                            <td>{{ $o->check_out }}</td>
                        </tr>
                        <tr>
                            <th>Number of Guest</th>
                            <td>{{ $o->guest_count }} Person</td>
                        </tr>
                        <tr>
                            <th>Status Reservasi</th>
                            <td>{{ ucwords($o->reservation_status) }}</td>
                        </tr>
                    </table>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->

@endsection
