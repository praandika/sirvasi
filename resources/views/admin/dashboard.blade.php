@extends('layouts.main')
@if(Auth::user()->access == "user")
@section('title','Member Area')
@else
@section('title','Dashboard')
@endif

@section('content')
@if(Auth::user()->access == "user")
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Your Current Reservation</h3>
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
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php($no = 1)
                    @forelse($data as $o)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $o->book_code }}</td>
                        <td>{{ $o->room_name }}</td>
                        <td>{{ $o->check_in }}</td>
                        <td>{{ $o->check_out }}</td>
                        <td>
                            @if($o->validation == "wait")
                            <button class="btn btn-secondary" disabled data-toggle="tooltip" data-placement="top" title="Please wait for validation"><i class="fas fa-hourglass-half"></i>
                                Validation</button>
                            @elseif($o->validation == "no")
                            <button class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Please book another room"><i class="far fa-frown"></i> Full booked</button>
                            @elseif($o->validation == "yes")
                            <a href="{{ url('pay/'.$o->id.'/'.$o->check_in.'/'.$o->check_out.'/'.$o->room_price.'/'.$o->book_code.'/'.$o->room_name.'/edit') }}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Pay now"><i class="far fa-laugh-wink"></i> Pay</a>
                            @else
                            <button class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Happy holiday!"><i class="far fa-smile-wink"></i> Full booked</button>
                            @endif
                        </td>
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
                        <th>Book Code</th>
                        <th>Room Name</th>
                        <th>Check In</th>
                        <th>Check Out</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
@endif

@if(Auth::user()->access == "admin")
<div class="ror">
    <div class="col-lg-3 col-6">
        <!-- small card -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $countNewBook }}</h3>

                <p>New Reservation</p>
            </div>
            <div class="icon">
                <i class="fas fa-book"></i>
            </div>
            <a href="{{ route('validation') }}" class="small-box-footer">
                Validate Now <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
</div>
@endif
@endsection
