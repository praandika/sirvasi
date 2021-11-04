@extends('layouts.main')
@section('title','Data Kamar')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Tabel Kamar</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <a type="button" class="btn btn-success mb-3" href="{{ route('room.create') }}">
            <i class="fas fa-plus"></i>Tambah
        </a>

        <div class="table-responsive">
            <table id="tabel" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Status</th>
                        <th>Nama Kamar</th>
                        <th>Tipe</th>
                        <th>Harga</th>
                        <th>Kapasitas</th>
                        <th>Bed Info</th>
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
                            <td>{{ $o->room_status }}</td>
                            <td>{{ $o->room_name }}</td>
                            <td>{{ $o->room_type }}</td>
                            <td>{{ $o->room_price }}</td>
                            <td>{{ $o->room_capacity }}</td>
                            <td>{{ $o->bed_info }}</td>
                            <td>
                                <a href="{{ route('room.show', $o->id) }}" class="btn btn-default">
                                <i class="fas fa-eye"></i> Detail</a>
                                <a href="{{ route('room.edit', $o->id) }}" class="btn btn-primary">
                                <i class="fas fa-pencil-alt"></i> Edit</a>
                            </td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>
                <tfoot>
                    <tr>
                        <th>Status</th>
                        <th>Nama Kamar</th>
                        <th>Tipe</th>
                        <th>Harga</th>
                        <th>Kapasitas</th>
                        <th>Bed Info</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
@endsection

@include('admin.component.modal.tambahuser')
@include('admin.component.modal.adminpass')

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
