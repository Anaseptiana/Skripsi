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
                    <form action="<?= base_url('administrator/mobil/update_mobil/'.$mobil['id_mobil']); ?>" method="POST" enctype="multipart/form-data">
                        <div class='form-group'>
                            <label for="nama_mobil">Nama Mobil</label>
                            <input type="text" name="nama_mobil" class="form-control" value="<?= $mobil['nama_mobil']; ?>">
                        </div>
                        <div class='form-group'>
                            <label for="contents" class="control-label">Deskripsi Mobil</label>
                            <textarea name="deskripsi_mobil" id="summernote"><?= $mobil['deskripsi_mobil']; ?></textarea>
                        </div>
                        <div class='form-group'>
                            <label for="harga_dalam_kota">Harga Dalam Kota</label>
                            <input type="number" name="harga_dalam_kota" class="form-control" value="<?= $mobil['harga_dalam_kota']; ?>">
                        </div>
                        <div class='form-group'>
                            <label for="harga_luar_kota">Harga Luar Kota</label>
                            <input type="number" name="harga_luar_kota" class="form-control" value="<?= $mobil['harga_luar_kota']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="filefoto">Gambar</label>
                            <input type="hidden" name="old_background" value="<?= $mobil['background']; ?>">
                            <div class="row">
                                <div class="col-lg-6">
                                    <img src="<?= base_url('assets/img/mobil/background/' . $mobil['background']); ?>" width="300px">
                                </div>
                                <div class="col-lg-6">
                                    <input type="file" name="filefoto" class="dropify" data-height="190">
                                </div>
                            </div>
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