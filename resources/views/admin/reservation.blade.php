@extends('layouts.main')
@section('title','Data Reservasi')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Tabel Reservasi</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <a href="{{ route('reservation.book') }}" class="btn btn-success mb-3"><i class="fas fa-book"></i> Reservasi</a>
        <div class="table-responsive">
            <table id="tabel" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Status</th>
                        <th>Tamu</th>
                        <th>Jumlah Tamu</th>
                        <th>Kamar</th>
                        <th>Check In</th>
                        <th>Check Out</th>
                        <th>Note</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php($no = 1)
                    @forelse($data as $o)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $o->reservation_status }}</td>
                        <td>{{ $o->user->name }}</td>
                        <td>{{ $o->room->room_name }}</td>
                        <td>{{ $o->guest_count }} Person</td>
                        <td>{{ $o->check_in }}</td>
                        <td>{{ $o->check_out }}</td>
                        <td>{{ $o->note }}</td>
                        @if(($o->reservation_status == "cancel") || ($o->reservation_status == "success"))
                        <td>
                            <button type="button" class="btn btn-success mb-3" data-toggle="modal"
                                data-target="#detailReservation{{ $o->id }}">
                                <i class="fas fa-eyes"></i>
                                Detail
                            </button>
                        </td>
                        @elseif($o->reservation_status == "waiting")
                        <td>
                            <form action="{{ route('change.book.status',$o->id) }}" method="POST">
                            @csrf
                                <input type="hidden" name="status" value="{{ $o->reservation_status }}">
                                <input type="hidden" name="id" value="{{ $o->id }}">
                                <button type="submit" class="btn btn-primary">
                                <i class="fas fa-login-alt"></i> Check In</button>
                            </form>
                        </td>
                        @else
                        <td>
                            <form action="{{ route('change.book.status',$o->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="status" value="{{ $o->reservation_status }}">
                                <input type="hidden" name="id" value="{{ $o->id }}">
                                <button type="submit" class="btn btn-primary">
                                <i class="fas fa-logut-alt"></i> Check Out</button>
                            </form>
                        </td>
                        @endif
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center">no data available</td>
                    </tr>
                    @endforelse
                </tbody>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Status</th>
                        <th>Tamu</th>
                        <th>Jumlah Tamu</th>
                        <th>Kamar</th>
                        <th>Check In</th>
                        <th>Check Out</th>
                        <th>Note</th>
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
