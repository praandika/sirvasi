<!--================ Accomodation Area  =================-->
<section class="facilities_area section_gap">
    <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background="">
    </div>
    <div class="container">
        <form action="{{ route('search') }}" method="get">
            @csrf
            <div class="section_title text-center">
                <h2 class="title_color" style="color: #ffffff;">Other Rooms</h2>
            </div>
            <div class="row mb_30">
                <input type="hidden" value="{{ $check_in }}">
                <input type="hidden" value="{{ $check_out }}">
                @forelse($rekomendasi as $o)
                <input type="text" value="{{ $o->id }}">
                <div class="col-lg-3 col-sm-6">
                    <div class="accomodation_item text-center">
                        <div class="hotel_img">
                            <img src="{{ asset('photos/featured/'.$o->featured_img) }}" alt="">
                            <a href="{{ route('detail.book',$o->id) }}" class="btn theme_btn button_hover">Book Now</a>
                        </div>
                        <a href="#">
                            <h4 class="sec_h4" style="color: #ffffff;">{{ $o->room_name }}</h4>
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
        </form>
    </div>
</section>
<!--================ Accomodation Area  =================-->
