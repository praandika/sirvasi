@extends('layouts.main')
@section('title','Reservation History')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Tabel Reservation History</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="table-responsive">
            <table id="tabel" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Invoice</th>
                        <th>Room</th>
                        <th>Check In</th>
                        <th>Check Out</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @php($no = 1)
                    @forelse($data as $o)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $o->book_code }}</td>
                        <td>{{ $o->room->room_name }}</td>
                        <td>{{ Carbon\Carbon::parse($o->check_in)->format('D d M Y, H:i') }}</td>
                        <td>{{ Carbon\Carbon::parse($o->check_out)->format('D d M Y, H:i') }}</td>
                        <td>{{ $o->reservation_status }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">no data available</td>
                    </tr>
                    @endforelse
                </tbody>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Invoice</th>
                        <th>Room</th>
                        <th>Check In</th>
                        <th>Check Out</th>
                        <th>Status</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->

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
