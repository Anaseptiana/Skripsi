<!-- Begin Page Content -->
<style>
    input[type="checkbox"][readonly] {
        pointer-events: none;
    }
</style>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>



    <div class="row">
        <div class="col-lg-8">
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <?= $this->session->flashdata('message'); ?>

            <div class="card">
                <div class="card-body">
                    <form action="<?= base_url('administrator/mobil/gambar/post_gambar_mobil'); ?>" method="POST" enctype="multipart/form-data">
                        <div class='form-group'>
                            <label for="id_mobil">Nama Mobil</label>
                            <select name="id_mobil" class="form-control" id="pilih_mobil" required>
                                <option value="" selected disabled>-Pilih Mobil-</option>
                                <?php foreach ($mobils as $mobil) : ?>
                                    <?php if ($this->uri->segment(5)) : ?>
                                        <option value="<?= $mobil['id_mobil']; ?>" <?= ($mobil['id_mobil'] == $this->uri->segment(5)) ? "selected" : ""; ?>><?= $mobil['nama_mobil']; ?></option>
                                    <?php else : ?>
                                        <option value="<?= $mobil['id_mobil']; ?>"><?= $mobil['nama_mobil']; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="filefoto">Background</label>
                            <input type="file" name="filefoto" class="dropify" data-height="190" required>
                        </div>

                        <?php if (!$gambar_default) : ?>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="is_default" value="1" checked readonly id="defaultCheck1">
                                    <label class="form-check-label">
                                        Jadikan gambar utama
                                    </label>
                                </div>
                            </div>
                        <?php endif; ?>

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