<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Pesanan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $data_pesanan['total_pesanan'];?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Pemasukan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp <?= numberFormat($data_pesanan['total_harga']) ;?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Pengeluaran</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp <?= numberFormat($data_pengeluaran['total_jumlah']);?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Customer</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $data_customer['total_customer'];?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <?= $this->session->flashdata('message'); ?>

            <div class="card">
                <div class="card-header">Mobil yang banyak dipesan</div>
                <div class="card-body">
                    <table class="table table-hover table-bordered">
                        <tr>
                            <th>No</th>
                            <th>Mobil</th>
                            <th>Jumlah</th>
                        </tr>
                        <?php
                        if (count($data_mobil) == 0) {
                            echo '<td colspan="13" class="text-center">Tidak ada data</td>';
                        }
                        ?>
                        <?php $i = 1; ?>
                        <?php foreach ($data_mobil as $td) : ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= $td['nama_mobil']; ?></td>
                                <td><?= $td['total_mobil']; ?></td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>


        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->