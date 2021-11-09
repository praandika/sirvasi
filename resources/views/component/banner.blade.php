<!--================Banner Area =================-->
<section class="banner_area">
    <div class="booking_table d_flex align-items-center">
        <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background="">
        </div>
        <div class="container">
            <div class="banner_content text-center">
                <h6>Nusa Lembongan</h6>
                <h2>Relax Your Mind</h2>
                <p>Nusa Lembongan, a small island between Bali and Nusa Penida in Badung Strait, is the perfect holiday hideaway with few visitors and pristine un-spoilt beaches. A low, protected island about 11 km southeast of mainland Bali, measuring only four by three km and ringed with mangrove swamps, and palms and white sandy beaches. Inland the terrain is scrubby and very dry, with volcanic stonewalls and processional avenues crisscrossing the small cactus-covered hills.</p>
            </div>
        </div>
    </div>
    <div class="hotel_booking_area position">
        <div class="container">
            <div class="hotel_booking_table">
                <div class="col-md-3">
                    <h2>Book<br> Your Room</h2>
                </div>
                <div class="col-md-9">
                    <form action="{{ route('search') }}" method="get">
                        @csrf
                    <div class="boking_table">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="book_tabel_item">
                                    <div class="form-group">
                                        <div class='input-group date' id='datetimepicker11'>
                                            <input type='text' class="form-control" placeholder="Check in" name="check_in"/>
                                            <span class="input-group-addon">
                                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class='input-group date' id='datetimepicker11'>
                                            <input type='text' class="form-control" placeholder="Check Out" name="check_out" />
                                            <span class="input-group-addon">
                                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="book_tabel_item">
                                    <div class="input-group">
                                        <select class="wide" name="person">
                                            <option data-display="Person">Person</option>
                                            <option value="1">Single</option>
                                            <option value="2">Couple</option>
                                            <option value="3">Group</option>
                                            <option value="4">Family</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="book_tabel_item">
                                <button type="submit" class="book_now_btn button_hover">Book Now</button>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================Banner Area =================-->
