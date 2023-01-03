<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>



    <div class="row">
        <div class="col-lg-8">
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <?= $this->session->flashdata('message'); ?>

            <div class="card">
                <div class="card-body">
                    <form class="user" method="post" action="">
                        <div class="form-group">
                            <input type="text" class="form-control" id="nama_customer" name="nama_customer" placeholder="Full Name" value="<?= set_value('nama_customer'); ?>">
                            <?= form_error('nama_customer', '<small class="text-danger">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Address" value="<?= set_value('alamat'); ?>">
                            <?= form_error('alamat', '<small class="text-danger">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <input type="number" class="form-control" id="telp" name="telp" placeholder="Telp" value="<?= set_value('telp'); ?>">
                            <?= form_error('telp', '<small class="text-danger">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email Address..." value="<?= set_value('email'); ?>">
                            <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="password1" name="password1" placeholder="Password">
                            <?= form_error('password1', '<small class="text-danger">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <input type="password" class="form-control" id="password2" name="password2" placeholder="Repeat Password">
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm">
                            Simpan
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<br>
<!-- End of Main Content -->