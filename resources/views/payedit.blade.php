@extends('layouts.landing-app')
@section('landing-content')

@include('component.header')
<!--================ Accomodation Area  =================-->
<section class="accomodation_area section_gap">
    <div class="container">
        <form action="{{ route('payment') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title text-center">Payment Details</h4>
                            <input type="hidden" value="{{ $id }}" name="reservation_id">
                            <input type="hidden" name="user_id" value="{{ $user }}">
                            <div class="col-lg-12">
                                <table class="book_tabel_item">
                                    <tr>
                                        <td>Invoice </td>
                                        <td>: {{ $book }}</td>
                                        <input type="hidden" name="book_code" value="{{ $book }}">
                                    </tr>
                                    <tr>
                                        <td>Check In </td>
                                        <td>: {{ Carbon\Carbon::parse($in)->format('D d M Y, H:i') }}</td>
                                        <input type="hidden" value="{{ $in }}" name="in">
                                    </tr>
                                    <tr>
                                        <td>Check Out </td>
                                        <td>: {{ Carbon\Carbon::parse($out)->format('D d M Y, H:i') }}</td>
                                        <input type="hidden" value="{{ $out }}" name="out">
                                    </tr>
                                    <tr>
                                        <td>Reservation Detail </td>
                                        <td>: {{ $room }} Room</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>: Facilities</td>
                                    </tr>
                                    @forelse($facilities as $o)
                                    <tr>
                                        <td></td>
                                        <td>- {{ $o->facility_name }}</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td></td>
                                        <td>&nbsp;&nbsp;No facilities includes</td>
                                    </tr>
                                    @endforelse
                                    <tr>
                                        <td>Price </td>
                                        <td>: Rp {{ number_format($price, 0, ',', '.') }}</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>: x {{ $nights }} Nights</td>
                                    </tr>
                                    <tr>
                                        <td>PPN </td>
                                        <td>: 10%</td>
                                    </tr>
                                    <tr>
                                        <td>Service Charge </td>
                                        <td>: 10%</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h3>Total</h3>
                                        </td>
                                        <td>
                                            <h3>= Rp {{ number_format($total, 0, ',', '.') }}</h3>
                                            <input type="hidden" name="total" value="{{ $total }}">
                                        </td>
                                    </tr>
                                    <tr style="color: #1a69bd;">
                                        <td>
                                            <h3>Down Payment</h3>
                                        </td>
                                        <td>
                                            <h3>= Rp {{ number_format($downpayment, 0, ',', '.') }}</h3>
                                        </td>
                                        <input type="hidden" name="downpayment" value="{{ $downpayment }}">
                                    </tr>
                                </table>
                                <p>Transfer to : <strong style="color: #1a69bd;">BCA 6289089187</strong> a/n Dika Prana
                                </p>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="book_tabel_item">
                                            <div class="input-group">
                                                <select class="wide" name="select_payment" required>
                                                    <option value="select">Select Payment</option>
                                                    <option value="dp">Down Payment</option>
                                                    <option value="fp">Full Payment</option>
                                                </select>
                                            </div>
                                        </div>
                                        @if(Session::has('fail'))
                                                <small style="color: red;">
                                            {{ Session::get('fail') }}</small>
                                                @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 mt-3 mb-3">
                                        <label>Upload your proof of payment</label>
                                        <small style="color: #1a69bd;">file type : *jpg, jpeg, png</small>
                                        <div class="book_tabel_item">
                                            <input type="file" name="proof">
                                        </div>
                                    </div>
                                </div>
                                <div class="book_tabel_item">
                                    <button type="submit" class="book_now_btn button_hover">Payment
                                        Confirmation</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-12">
                            <img src="{{ asset('photos/banner/'.$banner[0]) }}" alt="Banner" style="width: 100%;">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            @foreach($media as $o)

                            <img src="{{ asset('photos/post/'.$o->post_img) }}" alt="Room photos"
                                style="width: 100px; height: 100px;" class="mt-1">
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<!--================ Accomodation Area  =================-->
@include('component.footer')
@endsection
