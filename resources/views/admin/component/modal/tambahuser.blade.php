<div class="modal fade" id="tambahAdmin">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Admin</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('user.store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <!-- Email -->
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="email">
                    </div>
                    <!-- Username -->
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" placeholder="Enter username" name="username">
                    </div>
                    <!-- Kontak -->
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" id="phone" placeholder="Enter phone number" name="phone">
                    </div>
                    <!-- Akses -->
                    <div class="form-group">
                        <label>Akses</label>
                        <select class="custom-select" name="access">
                            <option value="admin">Administrator</option>
                            <option value="head">Pimpinan</option>
                        </select>
                    </div>
                    <!-- Password -->
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="text" class="form-control" id="password" placeholder="Enter password" name="password">
                    </div>
                    <!-- Confirm -->
                    <div class="form-group">
                        <label for="confirm">Confirm Password</label>
                        <input type="text" class="form-control" id="confirm" placeholder="Confirm password">
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="reset" class="btn btn-default">Reset</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
