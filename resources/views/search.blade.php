@extends('layouts.landing-app')
@section('landing-content')

@include('component.header')
<!--================ Accomodation Area  =================-->
<section class="accomodation_area section_gap">
    <div class="container">
            <div class="section_title text-center">
                <h2 class="title_color">Search</h2>
            </div>
            <div class="row mb_30">
                <input type="hidden" value="{{ $check_in }}" name="check_in">
                <input type="hidden" value="{{ $check_out }}" name="check_out">

                @forelse($data as $o)
                <input type="hidden" value="{{ $o->id }}" name="id">
                <input type="hidden" value="{{ $o->room_price }}" name="room_price">
                <div class="col-lg-3 col-sm-6">
                    <div class="accomodation_item text-center">
                        <div class="hotel_img">
                            <img src="{{ asset('photos/featured/'.$o->featured_img) }}" alt="">
                            <a href="{{ url('booking/'.$o->id.'/'.$check_in.'/'.$check_out.'/'.$o->room_price.'/'.$o->room_name.'/'.$person) }}" class="btn theme_btn button_hover">Book Now</a>
                        </div>
                        <a href="#">
                            <input type="hidden" value="{{ $o->room_name }}" name="room_name">
                            <input type="hidden" value="{{ $o->room_price }}" name="room_price">
                            <h4 class="sec_h4">{{ $o->room_name }}</h4>
                            <small>maximum guest {{ $o->room_capacity }} Person</small>
                        </a>
                        <h5>Rp {{ number_format($o->room_price, 0, ',', '.') }}<small>/night</small></h5>
                    </div>
                </div>
                @empty
                <div class="col-lg-12">
                    <a href="#">
                        <h4 class="sec_h4">No rooms available</h4>
                    </a>
                </div>
                @endforelse
            </div>
    </div>
</section>
<!--================ Accomodation Area  =================-->
@include('component.rekomendasi')
@include('component.footer')
@endsection
