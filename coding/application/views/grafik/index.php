<style type="text/css">
    @media print {
      .noPrint{
        display:none;
      }
    }
</style>
    
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">
        <span><?= $title; ?></span>
        <div class="float-right">
            <form class="form-inline" action="" method="GET">
                <div class="form-group mr-3">
                    <select name="bulan" class="form-control">
                        <option value="0" disabled selected>- Pilih Bulan -</option>
                        <?php foreach(listNamaBulan() as $key => $value) : ?>
                            <option value="<?= $key; ?>"><?= $value; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group mr-3">
                    <?php 
                        $already_selected_value  = date('Y');
                        $earliest_year  = $already_selected_value-10;
                     ?>
                    <select name="tahun" class="form-control">
                        <option value="0" disabled selected>- Pilih Tahun -</option>
                        <?php foreach(range(date('Y'), $earliest_year) as $x) : ?>
                            <option value="<?= $x; ?>" <?= ($x === $already_selected_value) ? 'selected' : '';?> ><?= $x; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group mr-3">
                    <select name="pekan" class="form-control">
                        <option value="0" disabled selected>- Pilih Pekan -</option>
                        <option value="1">Pekan 1</option>
                        <option value="2">Pekan 2</option>
                        <option value="3">Pekan 3</option>
                        <option value="4">Pekan 4</option>
                    </select>
                </div>

                <button class="btn btn-secondary btn-sm mr-2">Refresh</button>
                <button class="btn btn-primary btn-sm">Cari</button>
            </form>
        </div>
    </h1>


    <div class="card" id="section-to-print">
        <div class="card-header">
            <span><?=date('d M Y', strtotime($start)); ?> - <?= date('d M Y', strtotime($end)); ?></small></span>
            <div class="float-right">
                <button onclick="window.print();" class="btn btn-primary btn-sm noPrint">Cetak</button>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card shadow">
                        <div class="card-body">
                            <table class="table table-bordered table-sm">
                                <tr>
                                    <th>No</th>
                                    <th>Hari</th>
                                    <th>Laba</th>
                                </tr>
                                <?php foreach($pesanan as $key => $td) : ?>
                                    <tr>
                                        <td><?= $key+1; ?></td>
                                        <td><?= convertDay(date('D', strtotime($td['tanggal_selesai']))); ?>, <?= date('d M Y', strtotime($td['tanggal_selesai'])); ?></td>
                                        <td>Rp <?= numberFormat($td['jumlah']); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="chart-bar">
                                <canvas id="myBarChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->