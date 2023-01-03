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
                    <form action="<?= base_url('administrator/banner/update_banner/' . $banner['id_banner']); ?>" method="POST" enctype="multipart/form-data">
                        <div class='form-group'>
                            <label for="judul">Judul</label>
                            <input type="text" name="judul" class="form-control" value="<?= $banner['judul']; ?>" required>
                        </div>
                        <div class='form-group'>
                            <label for="sub_judul" class="control-label">Sub Judul</label>
                            <textarea name="sub_judul" class="summernote-blog" required><?= $banner['sub_judul']; ?></textarea>
                        </div>
                        <div class='form-group'>
                            <label for="nama_link">Nama Link</label>
                            <input type="text" name="nama_link" class="form-control" value="<?= $banner['nama_link']; ?>">
                        </div>
                        <div class='form-group'>
                            <label for="link">Link</label>
                            <input type="text" name="link" class="form-control" value="<?= $banner['link']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="filefoto">Gambar</label>
                            <div class="row">
                                <div class="col-lg-6">
                                    <img src="<?= base_url('assets/img/banner/' . $banner['gambar']); ?>" width="300px">
                                </div>
                                <div class="col-lg-6">
                                    <input type="file" name="filefoto" class="dropify" data-height="190">
                                </div>
                            </div>
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
<br>
<!-- End of Main Content -->