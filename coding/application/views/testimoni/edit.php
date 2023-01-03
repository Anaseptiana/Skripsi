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
                    <form action="<?= base_url('administrator/testimoni/update_testimoni/' . $testimoni['id_testimoni']); ?>" method="POST" enctype="multipart/form-data">
                        <div class='form-group'>
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" class="form-control" value="<?= $testimoni['nama']; ?>" required>
                        </div>
                        <div class='form-group'>
                            <label for="pesan" class="control-label">Pesan</label>
                            <textarea name="pesan" class="summernote-blog" required><?= $testimoni['pesan']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="filefoto">Foto</label>
                            <div class="row">
                                <div class="col-lg-6">
                                    <img src="<?= base_url('assets/img/testimoni/' . $testimoni['foto']); ?>" width="300px">
                                </div>
                                <div class="col-lg-6">
                                    <input type="file" name="filefoto" class="dropify" data-height="190">
                                </div>
                            </div>
                        </div>

                        <br>
                        <div class="form-group mt-2">
                            <label>Status</label><br>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="status" id="inlineRadio1" value="1" <?= ($testimoni['status'] == 1) ? 'checked' : ''; ?>>
                              <label class="form-check-label" for="inlineRadio1">Akfif</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="0" <?= ($testimoni['status'] == 0) ? 'checked' : ''; ?>>
                              <label class="form-check-label" for="inlineRadio2">Tidak Aktif</label>
                            </div>
                        </div>

                        <br>

                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
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