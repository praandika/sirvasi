@extends('layouts.main')
@section('title','Payment History')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Tabel Payment History</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="table-responsive">
            <table id="tabel" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Invoice</th>
                        <td>Room</td>
                        <th>Check In</th>
                        <th>Check Out</th>
                        <th>Payment Type</th>
                        <th>Ammount</th>
                        <th>Remaining</th>
                        <th>Payment Status</th>
                        <th>Reservation Status</th>
                    </tr>
                </thead>
                <tbody>
                    @php($no = 1)
                    @forelse($data as $o)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $o->invoice }}</td>
                        <td>{{ $o->reservation->room->room_name }}</td>
                        <td>{{ Carbon\Carbon::parse($o->reservation->check_in)->format('D d M Y, H:i') }}</td>
                        <td>{{ Carbon\Carbon::parse($o->reservation->check_out)->format('D d M Y, H:i') }}</td>
                        <td>{{ $o->payment_type }}</td>
                        <td>Rp {{ number_format($o->amount, 0, ',', '.') }}</td>
                        <td>Rp {{ number_format($o->remaining_amount, 0, ',', '.') }}</td>
                        <td>{{ strtoUpper($o->payment_status) }}</td>
                        <td>{{ strtoUpper($o->reservation_status) }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="10" class="text-center">no data available</td>
                    </tr>
                    @endforelse
                </tbody>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Invoice</th>
                        <td>Room</td>
                        <th>Check In</th>
                        <th>Check Out</th>
                        <th>Payment Type</th>
                        <th>Ammount</th>
                        <th>Remaining</th>
                        <th>Payment Status</th>
                        <th>Reservation Status</th>
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
