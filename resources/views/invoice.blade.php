@extends('layouts.landing-app')
@section('landing-content')

@include('component.header')
<section class="accomodation_area section_gap">
    <div class="container">
        <div class="row">
            @foreach($data as $o)
            <div class="col-lg-6">
                <h2><strong>Invoice - {{ $o->invoice }}</strong></h2>
                <table class="table table-striped">
                    <tr>
                        <th>Room</th>
                        <td>{{ $o->reservation->room->room_name }}</td>
                    </tr>
                    <tr>
                        <th>Check In</th>
                        <td>{{ Carbon\Carbon::parse($o->reservation->check_in)->format('D d M Y, H:i') }}</td>
                    </tr>
                    <tr>
                        <th>Check Out</th>
                        <td>{{ Carbon\Carbon::parse($o->reservation->check_out)->format('D d M Y, H:i') }}</td>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td>{{ $o->user->name }}</td>
                    </tr>
                    <tr>
                        <th>Phone</th>
                        <td>{{ $o->user->phone }}</td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td>{{ $o->user->address }}</td>
                    </tr>
                </table>
            </div>
            <div class="col-lg-6">
                <h2 class="text-right"><strong>{{ strtoUpper($o->payment_status) }}</strong></h2>
                <table class="table table-striped">
                    <tr>
                        <th>Stay</th>
                        <td>{{ $nights }} Night(s)</td>
                    </tr>
                    <tr>
                        <th>Payment Type</th>
                        <td>{{ $o->payment_type }}</td>
                    </tr>
                    <tr>
                        <th>
                            <h4>Total</h4>
                        </th>
                        <td>
                            <h4>Rp {{ number_format($o->amount, 0, ',', '.') }},-</h4>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <h3>Remaining Amount</h3>
                        </th>
                        <td>
                            <h3>Rp {{ number_format($o->remaining_amount, 0, ',', '.') }},-</h3>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="col-lg-12 text-right">
                <a href="{{ route('print.invoice',$o->invoice) }}" type="button" class="btn btn-success"
                    target="_blank">Print Invoice &nbsp;&nbsp;<i class="fa fa-download"></i></a>
            </div>
            @endforeach
        </div>
    </div>
</section>
@include('component.footer')
@endsection
