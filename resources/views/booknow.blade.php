@extends('layouts.landing-app')
@section('landing-content')

@include('component.header')
<section class="accomodation_area section_gap">
    <div class="container">
        <form action="{{ route('pay') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="book_tabel_item">
                                        <div class="form-group">
                                            <div class='input-group date' id='datetimepicker11'>
                                                <input type='text' class="form-control" placeholder="Check in"
                                                    name="in" />
                                                <span class="input-group-addon">
                                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class='input-group date' id='datetimepicker11'>
                                                <input type='text' class="form-control" placeholder="Check Out"
                                                    name="out" />
                                                <span class="input-group-addon">
                                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="book_tabel_item">
                                        <div class="form-group">
                                            <div class='input-group'>
                                                <input type='number' class="form-control" placeholder="Number of guest"
                                                    name="person" />
                                                <span class="input-group-addon">
                                                    <i class="fa fa-users" aria-hidden="true"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" value="{{ $id }}" name="id">

                            <div class="col-lg-12 mt-3">
                                <table>
                                    <tr>
                                        <td><strong>{{ $room }}</strong></td>
                                        <td>: Rp {{ number_format($price, 0, ',', '.') }}</td>
                                        <input type="hidden" value="{{ $price }}">
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title text-center">Complete your personal data</h4>
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="name">Name</label>
                                    <input type="text" id="name" placeholder="Enter your full name" class="form-control"
                                        value="{{ Auth::user()->name }}" name="name" readonly>
                                </div>
                                <div class="col">
                                    <label for="phone">Phone</label>
                                    <input type="text" id="phone" class="form-control" placeholder="Enter phone number"
                                        value="{{ Auth::user()->phone }}" name="phone">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="email">Email</label>
                                    <input type="text" id="email" placeholder="Enter your email address"
                                        class="form-control" value="{{ Auth::user()->email }}" name="email" readonly>
                                </div>
                                <div class="col">
                                    <label for="address">Address</label>
                                    <input type="text" id="address" class="form-control"
                                        placeholder="Enter your address" value="{{ Auth::user()->address }}"
                                        name="address">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-6 mt-3">
                                    <img src="{{ asset('photos/featured/'.$data->featured_img) }}"
                                        alt="{{ $data->room_name }}" height="270px">
                                </div>
                                <div class="col-lg-6">
                                    <h4>Facilities:</h4>
                                    <ul>
                                        @forelse($facilities as $o)
                                        <li>{{ $o->facility_name }}</li>
                                        @empty
                                        <p>No facilities available</p>
                                        @endforelse
                                    </ul>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-12">
                                    <label for="note">Special Request</label>
                                    <textarea name="note" id="note" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="book_tabel_item">
                                        <button type="submit" class="book_now_btn button_hover">Send Booking
                                            Request</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
@include('component.footer')
@endsection