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
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class='form-group'>
                            <label for="nama_supir">Nama Supir</label>
                            <input type="text" name="nama_supir" class="form-control" value="<?= set_value('nama_supir'); ?>">
                            <small class="form-text text-danger"><?= form_error('nama_supir'); ?></small>
                        </div>
                        <div class='form-group'>
                            <label for="telp">Telp</label>
                            <input type="text" name="telp" class="form-control" value="<?= set_value('telp'); ?>">
                            <small class="form-text text-danger"><?= form_error('telp'); ?></small>
                        </div>
                        <div class='form-group'>
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control" name="alamat"><?= set_value('alamat'); ?></textarea>
                            <small class="form-text text-danger"><?= form_error('alamat'); ?></small>
                        </div>
<!--                         <div class="form-group">
                            <label for="filefoto">Foto</label>
                            <input type="file" name="filefoto" class="dropify" data-height="190">
                            <small class="form-text text-danger"><?= form_error('filefoto'); ?></small>
                        </div> -->

                        <button class="btn btn-primary btn-sm">Simpan</button>
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