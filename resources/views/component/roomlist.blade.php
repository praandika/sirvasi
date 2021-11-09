<!--================ Accomodation Area  =================-->
<section class="accomodation_area section_gap">
    <div class="container">
        <div class="section_title text-center">
            <h2 class="title_color">Hotel Accomodation</h2>
            <p>We all live in an age that belongs to the young at heart. Life that is becoming extremely fast, </p>
        </div>
        <div class="row mb_30">
            @forelse($data as $o)
            <div class="col-lg-3 col-sm-6">
                <div class="accomodation_item text-center">
                    <div class="hotel_img">
                        <img src="{{ asset('photos/featured/'.$o->featured_img) }}" alt="">
                        <a href="{{ route('landing.book',$o->id) }}" class="btn theme_btn button_hover">Book Now</a>
                    </div>
                    <a href="#">
                        <h4 class="sec_h4">{{ $o->room_name }}</h4>
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
