<div class="modal fade" id="tambahAdmin">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Admin</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.store') }}" method="post" id="store-form">
                @csrf
                <div class="modal-body">
                    <!-- Nama -->
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="{{ old('name') }}" required>
                    </div>

                    <!-- Email -->
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="email" value="{{ old('email') }}" required>
                    </div>
                    <!-- Username -->
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" placeholder="Enter username" name="username" value="{{ old('username') }}" required>
                    </div>
                    <!-- Kontak -->
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" id="phone" placeholder="Enter phone number" name="phone" value="{{ old('phone') }}" required>
                    </div>
                    <!-- Akses -->
                    <div class="form-group">
                        <label>Akses</label>
                        <select class="custom-select" name="access" value="{{ old('access') }}" required>
                            <option value="admin">Administrator</option>
                            <option value="head">Pimpinan</option>
                        </select>
                    </div>
                    <!-- Password -->
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" value="{{ old('password') }}" required>
                        <div class="invalid-feedback" id="feedback-password"></div>
                    </div>
                    <!-- Confirm -->
                    <div class="form-group">
                        <label for="confirm">Confirm Password</label>
                        <input type="password" class="form-control" id="confirm" placeholder="Confirm password" name="confirm" required>
                        <div class="invalid-feedback" id="feedback-confirm"></div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="reset" class="btn btn-default">Reset</button>
            </form>
                    <a class="btn btn-primary" onclick="store()" >Simpan</a>   
                </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

@push('after-script')
<script>
    function store(){
        let $pass = document.getElementById('password').value;
        let $confirm = document.getElementById('confirm').value;
        let $form = document.getElementById('store-form');
        let $countPass = String($pass).length;

        if ($countPass < 8) {
            console.log($countPass < 8);
            document.getElementById('password').classList.add('is-invalid');
            document.getElementById('feedback-password').innerHTML = 'Password minimal 8 karakter!';
        }else{
            if ($confirm === $pass) {
            $form.submit();
        } else {
                document.getElementById('password').classList.add('is-invalid');
                document.getElementById('feedback-password').innerHTML = 'Password tidak cocok!';
                document.getElementById('confirm').classList.add('is-invalid');
                document.getElementById('feedback-confirm').innerHTML = 'Ulangi konfirmasi password!';
            }
        }
    }
</script>
@endpush
