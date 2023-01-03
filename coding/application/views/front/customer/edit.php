
    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
                <span>Edit Profile</span>
            </div>
            <div class="card-body">
                <form class="user" method="post" action="">
                        <input type="hidden" name="id_customer" value="<?= $customer['id_customer']; ?>">
                        <div class="form-group">
                            <input type="text" class="form-control" id="nama_customer" name="nama_customer" placeholder="Full Name" value="<?= $customer['nama_customer']; ?>">
                            <?= form_error('nama_customer', '<small class="text-danger">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Address" value="<?= $customer['alamat']; ?>">
                            <?= form_error('alamat', '<small class="text-danger">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <input type="number" class="form-control" id="telp" name="telp" placeholder="Telp" value="<?= $customer['telp']; ?>">
                            <?= form_error('telp', '<small class="text-danger">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email Address..." value="<?= $customer['email']; ?>" readonly>
                            <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="password1" name="password1" placeholder="Password">
                            <?= form_error('password1', '<small class="text-danger">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <input type="password" class="form-control" id="password2" name="password2" placeholder="Repeat Password">
                        </div>
                        <button type="submit" class="btn btn-secondary btn-sm">
                            Simpan
                        </button>
                    </form>
            </div>
        </div>
    </div>