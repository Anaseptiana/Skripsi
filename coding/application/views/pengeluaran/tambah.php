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
                    <form class="user" method="post" action="">
                        <div class="form-group">
                            <label>Nama Pengeluaran</label>
                            <input type="text" class="form-control" id="nama_pengeluaran" name="nama_pengeluaran" value="<?= set_value('nama_pengeluaran'); ?>">
                            <?= form_error('nama_pengeluaran', '<small class="text-danger">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <label>Jumlah</label>
                            <input type="number" class="form-control" id="jumlah" name="jumlah" value="<?= set_value('jumlah'); ?>">
                            <?= form_error('jumlah', '<small class="text-danger">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <label>Tanggal</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= set_value('tanggal'); ?>">
                            <?= form_error('tanggal', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm">
                            Simpan
                        </button>
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