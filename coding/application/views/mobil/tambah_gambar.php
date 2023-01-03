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
            <?= $this->session->flashdata('message'); ?>

            <?php echo validation_errors(); ?>

            <div class="card">
                <div class="card-body">
                    <form action="<?= base_url('administrator/mobil/list-gambar/post_gambar_mobil/'.$this->uri->segment(5)); ?>" method="POST" enctype="multipart/form-data">
                        <div class='form-group'>
                            <label for="id_mobil">Nama Mobil</label>
                            <input type="text" class="form-control" name="nama_mobil" value="<?= $mobil['nama_mobil']; ?>" readonly>
                        </div>

                        <div class="form-group">
                            <label for="filefoto">Background</label>
                            <input type="file" name="filefoto" class="dropify" data-height="190" required>
                        </div>

                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="is_default" value="1" id="defaultCheck1">
                                <label class="form-check-label">
                                    Jadikan gambar utama
                                </label>
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