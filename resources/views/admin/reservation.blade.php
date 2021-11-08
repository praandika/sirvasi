@extends('layouts.main')
@section('title','Data Reservasi')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Tabel Reservasi</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="table-responsive">
            <table id="tabel" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Status</th>
                        <th>Tamu</th>
                        <th>Jumlah Tamu</th>
                        <th>Kamar</th>
                        <th>Check In</th>
                        <th>Check Out</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if($count == 0)
                        <tr>
                            <td colspan="4" class="text-center">no data available</td>
                        </tr>
                    @else
                        @foreach($data as $o)
                        <tr>
                            <td>{{ $o->reservation_status }}</td>
                            <td>{{ $o->user->name }}</td>
                            <td>{{ $o->room->room_name }}</td>
                            <td>{{ $o->guest_count }} Person</td>
                            <td>{{ $o->check_in }}</td>
                            <td>{{ $o->check_out }}</td>
                            @if(($o->reservation_status == "cancel") || ($o->reservation_status == "success"))
                                <td>
                                    <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#detailReservation{{ $o->id }}">
                                        <i class="fas fa-eyes"></i>
                                                Detail
                                    </button>
                                </td>
                            @else
                                <td>
                                    <a href="{{ route('reservation.edit',$o->id) }}" class="btn btn-primary">
                                    <i class="fas fa-logout-alt"></i> Check Out</a>
                                </td>
                            @endif
                        </tr>
                        @endforeach
                    @endif
                </tbody>
                <tfoot>
                    <tr>
                        <th>Status</th>
                        <th>Tamu</th>
                        <th>Jumlah Tamu</th>
                        <th>Kamar</th>
                        <th>Check In</th>
                        <th>Check Out</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
@include('admin.component.modal.detailreservation')

@endsection

@push('after-script')
<script>
    $(function () {
        $("#tabel").DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
        });
    });
</script>
@endpush
