@extends('layouts.main')
@section('title','Data User')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Tabel User</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#tambahAdmin">
            <i class="fas fa-plus"></i>
            Tambah
        </button>

        <div class="table-responsive">
            <table id="tabel" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Kontak</th>
                        <th>Akses</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php($no = 1)
                    @forelse($data as $o)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $o->name }}</td>
                        <td>{{ $o->phone }}</td>
                        <td>
                            @if($o->access == "admin")
                            Administrator
                            @else
                            Pimpinan
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.edit',$o->id) }}" class="btn btn-primary">
                                <i class="fas fa-pencil-alt"></i> Edit</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center">no data available</td>
                    </tr>
                    @endforelse
                </tbody>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Kontak</th>
                        <th>Akses</th>
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
