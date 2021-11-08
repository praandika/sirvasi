@extends('layouts.main')
@section('title','Reservasi')

@section('content')
<div class="card" id="reservation-card">
    <div class="card-header">
        <h3 class="card-title">Reservasi</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form action="{{ route('reservation.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-lg-6">
                    <!-- Nama -->
                    <input type="text" id="user_id" value="{{ old('user_id') }}" name="user_id" required>
                    <label for="name">Nama</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="name" placeholder="Enter name"
                            aria-label="Enter name" value="{{ old('name') }}" id="name" required>
                        <button class="btn btn-success" id="button-addon2" type="button" data-toggle="modal"
                            data-target="#cekUser">Cek
                            Tamu</button>
                    </div>

                    <!-- Email -->
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email"
                            value="{{ old('email') }}" required>
                    </div>
                    <!-- Kontak -->
                    <div class="form-group">
                        <label for="phone">Kontak </label>
                        <input type="text" class="form-control" id="phone" placeholder="Enter phone number" name="phone"
                            value="{{ old('phone') }}" required>
                    </div>
                </div>

                <div class="col-lg-6">
                    <!-- Kamar -->
                    <input type="text" id="room_id" value="{{ old('room_id') }}" name="room_id" required>
                    <div class="form-group">
                        <label for="room">Pilih Kamar</label>
                        <input type="text" id="room" class="form-control" data-toggle="modal" data-target="#cekKamar"
                            placeholder="Enter room" name="room" value="{{ old('room') }}" required readonly>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <!-- Check In -->
                            <div class="form-group">
                                <label for="check_in">Check In</label>
                                <input type="date" class="form-control" placeholder="Check In" name="check_in" id="check_in"
                                    value="{{ old('check_in') }}" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <!-- Check Out -->
                            <div class="form-group">
                                <label for="check_out">Check Out</label>
                                <input type="date" class="form-control" placeholder="Check Out" name="check_out" id="check_in"
                                    value="{{ old('check_out') }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <!-- Jumlah Tamu -->
                            <div class="form-group">
                                <label for="guest_count">Jumlah Tamu</label>
                                <input type="number" class="form-control" placeholder="Jumlah Tamu" name="guest_count"
                                    value="{{ old('guest_count') }}" min="0" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <!-- Catatan -->
                            <div class="form-group">
                                <label for="note">Catatan</label>
                                <textarea name="note" id="note" cols="30" rows="5" value="{{ old('note') }}"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="javascript:void(0);" class="btn btn-primary" id="next" onclick="passingData()"> Lanjut
                    Pembayaran</a>
            </div>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->

<div class="card d-none" id="payment-card">
    <div class="card-header">
        <h3 class="card-title">Pembayaran</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="row">
            <div class="col-lg-6">
                <table>
                    <tr>
                        <td>Nama</td>
                        <td>: <span class="name"></span></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>: <span class="email"></span></td>
                    </tr>
                    <tr>
                        <td>Kontak</td>
                        <td>: <span class="phone"></span></td>
                    </tr>
                    <tr>
                        <td>Penerima</td>
                        <td>: <span class="admin">{{ Auth::user()->name }}</span></td>
                    </tr>
                    <tr>
                        <td>Metode Pembayaran</td>
                        <td>: <input type="radio" name="payment_type" id="payment_type" value="Cash" checked>Cash</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>: <input type="radio" name="payment_type" id="payment_type" value="Debit">Debit</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>: <input type="radio" name="payment_type" id="payment_type" value="Credit">Credit</td>
                    </tr>
                </table>
            </div>

            <div class="col-lg-6">
                <table>
                <tr>
                        <td>Kamar</td>
                        <td>: <span class="room"></span></td>
                    </tr>
                    <tr>
                        <td>Check In</td>
                        <td>: <span class="check_in"></span></td>
                    </tr>
                    <tr>
                        <td>Check Out</td>
                        <td>: <span class="check_out"></span></td>
                    </tr>
                    <tr>
                        <td>Jumlah Tamu</td>
                        <td>: <span class="guest_count"></span></td>
                    </tr>
                    <tr>
                        <td>Catatan</td>
                        <td>: <textarea class="note" readonly></textarea></td>
                    </tr>

                    <tr>
                        <td>
                            <h4>Total</h4>
                        </td>
                        <td>: <span class="amount"></span></td>
                    </tr>
                    <tr>
                        <td>
                            <h4>Bayar</h4>
                        </td>
                        <td><input type="text" id="pay"></td>
                    </tr>
                    <tr>
                        <td>
                            <h4>Sisa</h4>
                        </td>
                        <td><span class="remaining_amount"></span></td>
                    </tr>
                    <tr class="text-right">
                        <td></td>
                        <td><button type="button" class="btn btn-primary">Bayar</button></td>
                    </tr>
                </table>
            </div>
        </div>

        </form>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->

@include('admin.component.modal.guestlist')
@include('admin.component.modal.roomlist')

@endsection

@push('after-script')
<script>
    function passingData() {
        let name = document.getElementById("name").value;
        let user_id = document.getElementById("user_id").value;
        let phone = document.getElementById("phone").value;
        let email = document.getElementById("email").value;
        let room_id = document.getElementById("room_id").value;
        let room = document.getElementById("room").value;
        let check_in = document.getElementById("check_in").value;
        let check_out = document.getElementById("check_out").value;
        let guest_count = document.getElementById("guest_count").value;
        let note = document.getElementById("note").value;
        let payment_type = document.getElementById("payment_type").value;
        let amount = document.getElementById("amount").value;
        let remaining_amount = document.getElementById("remaining_amount").value;
        let payment_status = document.getElementById("payment_status").value;
        console.log(data);

        document.getElementsByClassName("name").value = name;
        document.getElementsByClassName("email").value = email;
        document.getElementsByClassName("phone").value = phone;
        document.getElementsByClassName("payment_type").value = payment_type;
        document.getElementsByClassName("room").value = room;
        document.getElementsByClassName("check_in").value = check_in;
        document.getElementsByClassName("check_out").value = check_out;
        document.getElementsByClassName("guest_count").value = guest_count;
        document.getElementsByClassName("note").value = note;

        let reservasi = document.getElementById("reservation-card");
        let payment = document.getElementById("payment-card");
        reservasi.classList.add("d-none");
        payment.classList.remove("d-none");
    }
</script>
@endpush
