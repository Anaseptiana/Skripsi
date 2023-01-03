<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?>
    <?php if(isset($_GET['dari']) && isset($_GET['sampai'])) : ?>
            <small><?= date('d M Y', strtotime($_GET['dari'])) ." - ".date('d M Y', strtotime($_GET['sampai'])); ?></small>        
        <?php endif; ?>
    </h1>



    <div class="row">
        <div class="col-lg-12">
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <?= $this->session->flashdata('message'); ?>

            <div class="card">
            <div class="card-header">
                    <form action="" method="GET">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="dari">Dari</label>
                                <input type="date" name="dari" class="form-control" id="dari">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="sampai">Sampai</label>
                                <input type="date" name="sampai" class="form-control" id="sampai">
                            </div>
                            <div class="form-group col-md-4" style="margin-top: 35px">
                                <button type="submit" class="btn btn-primary btn-sm">Cari</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Selesai</th>
                                <th>No Pesanan</th>
                                <th>Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (count($pemasukan) == 0) {
                                echo '<td colspan="13" class="text-center">Tidak ada data</td>';
                            }
                            ?>
                            <?php $i = 1; ?>
                            <?php foreach ($pemasukan as $td) : ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= date('d M Y', strtotime($td['tanggal_selesai'])); ?></td>
                                    <td><?= $td['no_pesanan']; ?></td>
                                    <td>Rp <?= numberFormat($td['total_harga']); ?></td>
                                </tr>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>


        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->