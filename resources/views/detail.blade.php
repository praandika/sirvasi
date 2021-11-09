@extends('landing')
@section('landing-content')

@include('component.header')
<!--================ Accomodation Area  =================-->
<section class="accomodation_area section_gap">
    <div class="container">
        <form action="{{ route('pay.book') }}" method="get">
            @csrf
            
            
        </form>
    </div>
</section>
<!--================ Accomodation Area  =================-->
@include('component.rekomendasi')
@include('component.footer')
@endsection
