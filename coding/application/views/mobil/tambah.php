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
                    <form action="<?= base_url('administrator/mobil/post_mobil'); ?>" method="POST" enctype="multipart/form-data">
                        <div class='form-group'>
                            <label for="nama_mobil">Nama Mobil</label>
                            <input type="text" name="nama_mobil" class="form-control" value="<?= set_value('nama_mobil'); ?>">
                        </div>
                        <div class='form-group'>
                            <label for="contents" class="control-label">Deskripsi Mobil</label>
                            <textarea name="contents" id="summernote"><?= set_value('contents'); ?></textarea>
                        </div>
                        <div class='form-group'>
                            <label for="harga_dalam_kota">Harga Dalam Kota</label>
                            <input type="number" name="harga_dalam_kota" class="form-control" value="<?= set_value('harga_dalam_kota'); ?>">
                        </div>
                        <div class='form-group'>
                            <label for="harga_luar_kota">Harga Luar Kota</label>
                            <input type="number" name="harga_luar_kota" class="form-control" value="<?= set_value('harga_luar_kota'); ?>">
                        </div>
                        <div class="form-group">
                            <label for="filefoto">Background</label>
                            <input type="file" name="filefoto" class="dropify" data-height="190" required>
                        </div>

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