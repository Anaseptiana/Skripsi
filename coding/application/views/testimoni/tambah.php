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
                    <form action="<?= base_url('administrator/testimoni/post_testimoni'); ?>" method="POST" enctype="multipart/form-data">
                        <div class='form-group'>
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" class="form-control" value="<?= set_value('nama'); ?>">
                        </div>
                        <div class='form-group'>
                            <label for="pesan" class="control-label">Pesan</label>
                            <textarea name="pesan" class="summernote-blog"><?= set_value('pesan'); ?></textarea>
                        </div>
                        <input type="hidden" name="id_user" value="<?= $user['id']; ?>">
                        <div class="form-group">
                            <label for="filefoto">Foto</label>
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