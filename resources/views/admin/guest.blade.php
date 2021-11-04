@extends('layouts.main')
@section('title','Data Tamu')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Tabel Tamu</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="table-responsive">
            <table id="tabel" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Kontak</th>
                        <th>Email</th>
                        <th>Alamat</th>
                        <th>Negara</th>
                        <th>Provinsi</th>
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
                            <td>{{ $o->name }}</td>
                            <td>{{ $o->phone }}</td>
                            <td>{{ $o->email }}</td>
                            <td>{{ $o->address }}</td>
                            <td>{{ $o->country }}</td>
                            <td>{{ $o->state }}</td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>
                <tfoot>
                    <tr>
                    <th>Nama</th>
                        <th>Kontak</th>
                        <th>Email</th>
                        <th>Alamat</th>
                        <th>Negara</th>
                        <th>Provinsi</th>
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
