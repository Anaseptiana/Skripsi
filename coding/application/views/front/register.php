
    <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-lg-7">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4"><?= $title; ?></h1>
                                </div>

                                <?= $this->session->flashdata('message'); ?>

                                <?php echo validation_errors(); ?>

                                <form class="user" method="post" action="<?= base_url('register'); ?>">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="nama_customer" name="nama_customer" placeholder="Full Name" value="<?= set_value('nama_customer'); ?>">
                                        <?= form_error('nama_customer', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="alamat" name="alamat" placeholder="Address" value="<?= set_value('alamat'); ?>">
                                        <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>

                                    <div class="form-group">
                                        <input type="number" class="form-control form-control-user" id="telp" name="telp" placeholder="Telp" value="<?= set_value('telp'); ?>">
                                        <?= form_error('telp', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Enter Email Address..." value="<?= set_value('email'); ?>">
                                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password">
                                        <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>

                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Repeat Password">
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Register
                                    </button>
                                </form>
                                <hr>
                                <!-- <div class="text-center">
                                    <a class="small" href="<?= base_url('administrator/auth/forgotpassword'); ?>">Forgot Password?</a>
                                </div> -->
                                <div class="text-center">
                                    <a class="small" href="<?= base_url('login'); ?>">Login</a><br>
                                    <a class="small" href="<?= base_url('/'); ?>">Kembali ke halaman utama</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

