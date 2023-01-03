<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


    <div class="row">
        <div class="col-lg-6">
            <?= $this->session->flashdata('message'); ?>
            <div class="card">
                <div class="card-body">
                    <form action="<?= base_url('administrator/setting/update_setting'); ?>" method="POST">
                        <div class="form-group">
                            <label for="nama_website">Nama Website</label>
                            <input type="text" name="nama_website" class="form-control" value="<?= $setting['nama_website']; ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" value="<?= $setting['email']; ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="telp">No. Telepon</label>
                            <input type="number" name="telp" class="form-control" value="<?= $setting['telp']; ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="whatsapp">WhatsApp</label>
                            <input type="number" name="whatsapp" class="form-control" value="<?= $setting['whatsapp']; ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="facebook">Facebook</label>
                            <input type="text" name="facebook" class="form-control" value="<?= $setting['facebook']; ?>">
                        </div>

                        <div class="form-group">
                            <label for="twitter">Twitter</label>
                            <input type="text" name="twitter" class="form-control" value="<?= $setting['twitter']; ?>">
                        </div>

                        <div class="form-group">
                            <label for="harga_supir_dalam_kota">Harga Supir Dalam Kota</label>
                            <input type="text" name="harga_supir_dalam_kota" class="form-control" value="<?= $setting['harga_supir_dalam_kota']; ?>">
                        </div>

                        <div class="form-group">
                            <label for="harga_supir_luar_kota">Harga Supir Luar Kota</label>
                            <input type="text" name="harga_supir_luar_kota" class="form-control" value="<?= $setting['harga_supir_luar_kota']; ?>">
                        </div>

                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<br>