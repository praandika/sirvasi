@extends('layouts.landing-app')
@section('landing-content')

@include('component.header')
<!--================ Accomodation Area  =================-->
<section class="accomodation_area section_gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <table class="table table-striped">
                    @foreach($data as $o)
                        <tr>
                            <th>Invoice</th>
                            <td>{{ $o->invoice }}</td>
                        </tr>
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
                    @endforeach
                </table>
            </div>
        </div>
        <a href="{{ route('print.invoice',$o->invoice) }}" type="button" class="btn btn-success" target="_blank">Print Invoice &nbsp;&nbsp;<i class="fa fa-download"></i></a>
    </div>
</section>
<!--================ Accomodation Area  =================-->
@include('component.footer')
@endsection
