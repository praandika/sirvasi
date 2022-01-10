@extends('layouts.main')
@section('title','Laporan')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Tabel Laporan Pendapatan</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="row">
            <div class="col-lg-8">
                <form action="{{ route('search.income') }}" class="form-inline">
                    <div class="form-group mb-2">
                        <label for="awal" class="sr-only">Periode awal</label>
                        <input type="date" class="form-control" id="awal" name="awal" value="{{ old('awal') }}">
                    </div>
                    <div class="form-group mx-sm-3 mb-2">
                        <label for="akhir" class="sr-only">Periode akhir</label>
                        <input type="date" class="form-control" id="akhir" name="akhir" value="{{ old('akhir') }}">
                    </div>
                    <button type="submit" class="btn btn-primary mb-2"><i class="fas fa-search"></i> Cari</button>
                </form>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Status</th>
                        <th>Invoice</th>
                        <th>Payment Type</th>
                        <th>Kamar</th>
                        <th>Pendapatan</th>
                    </tr>
                </thead>
                <tbody>
                    @php($no = 1)
                    @forelse($data as $o)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $o->payment_status }}</td>
                        <td>{{ $o->invoice }}</td>
                        <td>{{ $o->payment_type }}</td>
                        <td>{{ $o->reservation->room->room_name }} Person</td>
                        <td>{{ $o->amount }}</td>
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
                        <th>Status</th>
                        <th>Invoice</th>
                        <th>Payment Type</th>
                        <th>Kamar</th>
                        <th>Pendapatan</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->

@endsection
