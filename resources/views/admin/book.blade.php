@extends('layouts.main')
@section('title','Reservasi')

@section('content')
<form action="{{ route('reservation.store') }}" method="POST">
    @csrf
    <div class="card" id="reservation-card">
        <div class="card-header">
            <h3 class="card-title">Reservasi</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6">
                    <input type="hidden" id="user_id" value="{{ old('user_id') }}" name="user_id">
                    <!-- Book Code -->
                    <label for="name">Book</label>
                    <div class="form-group">
                        <input type="text" class="form-control" id="book_code" value="{{ $book_code }}" name="book_code" required readonly>
                    </div>
                    <!-- Nama -->
                    <label for="name">Nama</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="name" placeholder="Enter name"
                            aria-label="Enter name" value="{{ old('name') }}" id="name" required>
                        <button class="btn btn-success" id="button-addon2" type="button" data-toggle="modal"
                            data-target="#cekUser">Daftar
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
                    <input type="hidden" id="room_id" value="{{ old('room_id') }}" name="room_id" required>
                    <input type="hidden" id="room_price" value="{{ old('room_price') }}" name="room_price">
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
                                <input type="date" class="form-control" placeholder="YYYY/MM/DD" name="check_in"
                                    id="check_in" value="{{ old('check_in') }}" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <!-- Check Out -->
                            <div class="form-group">
                                <label for="check_out">Check Out</label>
                                <input type="date" class="form-control" placeholder="Check Out" name="check_out"
                                    id="check_out" value="{{ old('check_out') }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <!-- Jumlah Tamu -->
                            <div class="form-group">
                                <label for="guest_count">Jumlah Tamu</label>
                                <input type="number" class="form-control" placeholder="Jumlah Tamu" name="guest_count"
                                    id="guest_count" value="{{ old('guest_count') }}" min="0" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <!-- Catatan -->
                            <div class="form-group">
                                <label for="note">Catatan</label>
                                <textarea name="note" class="form-control" id="note" cols="30" rows="5" value="{{ old('note') }}"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row float-right">
                        <div class="col-lg-12">
                            <a href="javascript:void(0);" class="btn btn-primary" id="next" onclick="passingData()"> Lanjut Pembayaran</a>
                        </div>
                    </div>
                </div>
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
                            <td>: <span id="name_input"></span></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>: <span id="email_input"></span></td>
                        </tr>
                        <tr>
                            <td>Kontak</td>
                            <td>: <span id="phone_input"></span></td>
                        </tr>
                        <tr>
                            <td>Penerima</td>
                            <td>: <span id="admin_input">{{ Auth::user()->name }}</span></td>
                        </tr>
                        <tr>
                            <td>Metode Pembayaran</td>
                            <td>: <input type="radio" name="payment_type" id="payment_type" value="Cash" checked>Cash
                            </td>
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
                            <td>: <span id="room_input"></span></td>
                        </tr>
                        <tr>
                            <td>Check In</td>
                            <td>: <span id="check_in_input"></span></td>
                        </tr>
                        <tr>
                            <td>Check Out</td>
                            <td>: <span id="check_out_input"></span></td>
                        </tr>
                        <tr>
                            <td>Jumlah Tamu</td>
                            <td>: <span id="guest_count_input"></span></td>
                        </tr>
                        <tr>
                            <td>Catatan</td>
                            <td>: <textarea id="note_input" readonly></textarea></td>
                        </tr>

                        <tr>
                            <td>
                                <h4>Total</h4>
                            </td>
                            <td>: <span id="amount"></span></td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Bayar</h4>
                            </td>
                            <td><input type="text" id="pay" onkeyup="hitung()" name="pay"></td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Sisa</h4>
                            </td>
                            <td><span id="remaining_amount"></span></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <h4><span id="payment_status" style="color: red;">UNPAID</span></h4>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <a href="javascript:void(0);" class="btn btn-primary" id="previous" onclick="back()">Kembali</a>
            <button type="submit" class="btn btn-primary">Bayar</button>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</form>

@include('admin.component.modal.guestlist')
@include('admin.component.modal.roomlist')

@endsection

@push('after-script')
<script>
    function passingData() {
        let name = document.getElementById("name").value;
        let phone = document.getElementById("phone").value;
        let email = document.getElementById("email").value;
        let room = document.getElementById("room").value;
        let check_in = document.getElementById("check_in").value;
        let check_out = document.getElementById("check_out").value;
        let guest_count = document.getElementById("guest_count").value;
        let note = document.getElementById("note").value;
        let room_price = document.getElementById("room_price").value;

        if (name == "" || phone == "" || email == "" || room == "" || check_in == "" || check_out == "" ||
            guest_count == "") {
            alert("Form tidak boleh kosong!");
        } else if (room_price == "") {
            alert("Harga kamar kosong!");
        } else {
            console.log(name, phone, email, room, check_in, check_out, guest_count, note);

            document.getElementById("name_input").innerHTML = name;
            document.getElementById("email_input").innerHTML = email;
            document.getElementById("phone_input").innerHTML = phone;
            document.getElementById("room_input").innerHTML = room;
            document.getElementById("check_in_input").innerHTML = check_in;
            document.getElementById("check_out_input").innerHTML = check_out;
            document.getElementById("guest_count_input").innerHTML = guest_count;
            document.getElementById("note_input").value = note;
            document.getElementById("amount").innerHTML = new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR'
            }).format(room_price);

            let reservasi = document.getElementById("reservation-card");
            let payment = document.getElementById("payment-card");
            reservasi.classList.add("d-none");
            payment.classList.remove("d-none");
        }
    }

    function hitung() {
        let total = document.getElementById("room_price").value;
        let bayar = document.getElementById("pay").value;

        let sisa = total - bayar;
        document.getElementById("remaining_amount").innerHTML = new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR'
        }).format(sisa);
        if (sisa == total) {
            let ele = document.getElementById("payment_status");
            ele.innerHTML = "UNPAID";
            ele.style.color = "red";
        } else if (sisa == 0) {
            let ele = document.getElementById("payment_status");
            ele.innerHTML = "PAID";
            ele.style.color = "green";
        } else if (sisa < 0) {
            let ele = document.getElementById("payment_status");
            ele.innerHTML = "CHANGES";
            ele.style.color = "blue";
        } else {
            let ele = document.getElementById("payment_status");
            ele.innerHTML = "PAID HALF";
            ele.style.color = "orange";
        }

        console.log(total, bayar, sisa);
    }

    function back(){
        let reservasi = document.getElementById("reservation-card");
        let payment = document.getElementById("payment-card");
        reservasi.classList.remove("d-none");
        payment.classList.add("d-none");
    }

</script>
@endpush
