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
                    <form action="<?= base_url('administrator/blog/post_blog'); ?>" method="POST" enctype="multipart/form-data">
                        <div class='form-group'>
                            <label for="judul">Judul</label>
                            <input type="text" name="judul" class="form-control" value="<?= set_value('judul'); ?>">
                        </div>
                        <div class='form-group'>
                            <label for="konten" class="control-label">Konten</label>
                            <textarea name="konten" class="summernote-blog"><?= set_value('konten'); ?></textarea>
                        </div>
                        <div class='form-group'>
                            <label>Penulis</label>
                            <input type="text" class="form-control" disabled value="<?= $user['name']; ?>">
                        </div>
                        <input type="hidden" name="id_user" value="<?= $user['id']; ?>">
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