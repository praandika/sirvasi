@extends('layouts.main')
@section('title','Data Validation')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Tabel Validation</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="table-responsive">
            <table id="tabel" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Book Code</th>
                        <th>Room Name</th>
                        <th>Check In</th>
                        <th>Check Out</th>
                        <th>Validate</th>
                        <th>Cancel</th>
                    </tr>
                </thead>
                <tbody>
                    @php($no = 1)
                    @forelse($data as $o)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $o->book_code }}</td>
                        <td>{{ $o->room->room_name }}</td>
                        <td>{{ $o->check_in }}</td>
                        <td>{{ $o->check_out }}</td>
                        <td>
                            <form action="{{ route('validation.process') }}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{ $o->id }}">
                                <button type="submit" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Validate"><i class="fas fa-check"></i></button>
                            </form>
                        </td>
                        <td>
                            <form action="{{ route('validation.cancel') }}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{ $o->id }}">
                                <button type="submit" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Cancel"><i class="fas fa-times"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">no data available</td>
                    </tr>
                    @endforelse
                </tbody>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Book Code</th>
                        <th>Room Name</th>
                        <th>Check In</th>
                        <th>Check Out</th>
                        <th>Validate</th>
                        <th>Cancel</th>
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
