@extends('layouts.main')
@section('title','Data Transaksi')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Tabel Transaksi</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="table-responsive">
            <table id="tabel" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Status</th>
                        <th>Reservasi</th>
                        <th>Tamu</th>
                        <th>Check In</th>
                        <th>Total</th>
                        <th>Sisa Pembayaran</th>
                        <th>Tipe Transaksi</th>
                        <th>Bukti Bayar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php($no = 1)
                    @forelse($data as $o)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $o->payment_status }}</td>
                        <td><a href="{{ route('reservation.show',$o->reservation_id) }}">{{ $o->book_code }}</a></td>
                        <td>{{ $o->name }}</td>
                        <td>{{ $o->check_in }}</td>
                        <td>{{ $o->amount }}</td>
                        <td>{{ $o->remaining_amount }}</td>
                        <td>{{ $o->payment_type }}</td>
                        <td><a href="{{ asset('photos/proof/'.$o->proof) }}">{{ $o->proof }}</a></td>
                        @if($o->payment_status == "paid")
                        <td>
                            <button type="button" class="btn btn-success mb-3" data-toggle="modal"
                                data-target="#detailPayment{{ $o->id }}">
                                <i class="fas fa-eyes"></i>
                                Detail
                            </button>
                        </td>
                        @else
                        <td>
                            <a href="{{ route('payment.bayar',$o->id) }}" class="btn btn-primary">
                                <i class="fas fa-logout-alt"></i> Bayar</a>
                        </td>
                        @endif
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" class="text-center">no data available</td>
                    </tr>
                    @endforelse
                </tbody>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Status</th>
                        <th>Reservasi</th>
                        <th>Tamu</th>
                        <th>Check In</th>
                        <th>Total</th>
                        <th>Sisa Pembayaran</th>
                        <th>Tipe Transaksi</th>
                        <th>Bukti Bayar</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
@include('admin.component.modal.detailpayment')

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
