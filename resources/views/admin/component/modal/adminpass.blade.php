<div class="modal fade" id="adminPass">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Change Password</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.password') }}" method="post" id="change-pass-form">
                @csrf
                <div class="modal-body">
                    <!-- Password -->
                    <div class="form-group">
                        <label for="oldpass">Old Password</label>
                        <input type="password" class="form-control" id="oldpass" placeholder="New Password" name="oldpass" value="{{ old('oldpass') }}" required>
                        <div class="invalid-feedback" id="feedback-oldpass"></div>
                    </div>
                    <!-- Password -->
                    <div class="form-group">
                        <label for="adminpass">Password</label>
                        <input type="password" class="form-control" id="adminpass" placeholder="New Password" name="adminpass" required>
                        <div class="invalid-feedback" id="feedback-adminpass"></div>
                    </div>
                    <!-- Confirm -->
                    <div class="form-group">
                        <label for="adminconfirmpass">Confirm Password</label>
                        <input type="password" class="form-control" id="adminconfirmpass" placeholder="Confirm password" name="adminconfirmpass" required>
                        <div class="invalid-feedback" id="feedback-adminconfirmpass"></div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="reset" class="btn btn-default">Reset</button>
            </form>
                    <a class="btn btn-primary" onclick="changePass()" >Simpan</a>   
                </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

@push('after-script')
<script>
    function changePass(){
        let $pass = document.getElementById('adminpass').value;
        let $confirm = document.getElementById('adminconfirmpass').value;
        let $form = document.getElementById('change-pass-form');
        let $countPass = String($pass).length;

        if ($countPass < 8) {
            console.log($countPass < 8);
            document.getElementById('adminpass').classList.add('is-invalid');
            document.getElementById('feedback-adminpass').innerHTML = 'Password minimal 8 karakter!';
        }else{
            if ($confirm === $pass) {
            $form.submit();
        } else {
                document.getElementById('adminpass').classList.add('is-invalid');
                document.getElementById('feedback-adminpass').innerHTML = 'Password tidak cocok!';
                document.getElementById('adminconfirmpass').classList.add('is-invalid');
                document.getElementById('feedback-adminconfirmpass').innerHTML = 'Ulangi konfirmasi password!';
            }
        }
    }
</script>
@endpush