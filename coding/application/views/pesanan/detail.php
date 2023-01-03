<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>



    <div class="row">
        <div class="col-lg-8">
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <?= $this->session->flashdata('message'); ?>

            <div class="card">
                <div class="card-header">Detal Pesanan</div>
                <div class="card-body">
                    <table class="table table-borderless">
                        <tr>
                            <th>No. Pesanan</th>
                            <td><?= $pesanan['id_pesanan']; ?></td>
                        </tr>
                        <tr>
                            <th>Tanggal Pesan</th>
                            <td><?= $pesanan['tanggal_pesan']; ?></td>
                        </tr>
                        <tr>
                            <th>Tanggal Mulai Sewa</th>
                            <td><?= $pesanan['tanggal_mulai']; ?></td>
                        </tr>
                        <tr>
                            <th>Tanggal Akhir Sewa</th>
                            <td><?= $pesanan['tanggal_selesai']; ?></td>
                        </tr>
                        <tr>
                            <th>Nama Customer</th>
                            <td><?= $pesanan['nama_customer']; ?></td>
                        </tr>
                        <tr>
                            <th>Mobil</th>
                            <td><?= $pesanan['nama_mobil']; ?></td>
                        </tr>
                        <tr>
                            <th>Supir</th>
                            <td><?= ($pesanan['supir'] == null) ? "-" : $pesanan['supir']; ?></td>
                        </tr>
                        <tr>
                            <th>Harga Sewa Mobil</th>
                            <td>Rp. <?= numberFormat($pesanan['harga_mobil']); ?></td>
                        </tr>
                        <tr>
                            <th>Harga Sewa Supir</th>
                            <td>Rp. <?= numberFormat($pesanan['harga_supir']); ?></td>
                        </tr>
                        <tr>
                            <th>Total Harga</th>
                            <td>Rp. <?= numberFormat($pesanan['total_harga']); ?></td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td><?= statusPesanan($pesanan['status']); ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
            <?php if($konfirmasi_pesanan != null) : ?>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">Konfirmasi Pesanan</div>
                <div class="card-body">
                    <table class="table table-borderless">
                        <tr>
                            <th>Nama Akun</th>
                            <td><?= $konfirmasi_pesanan['nama_akun']; ?></td>
                        </tr>
                        <tr>
                            <th>No. Rekening</th>
                            <td><?= $konfirmasi_pesanan['no_rekening']; ?></td>
                        </tr>
                        <tr>
                            <th>Tanggal Transfer</th>
                            <td><?= $konfirmasi_pesanan['tanggal_transfer']; ?></td>
                        </tr>
                    </table>

                    <button type="button" class="btn btn-primary btn-sm ml-2" data-toggle="modal" data-target="#exampleModal">Lihat Bukti Transfer</button>
                </div>
            </div>
        </div>
            <?php endif; ?>
    </div>



</div>
<!-- /.container-fluid -->

<!-- </div> -->
<br>
<!-- End of Main Content -->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Bukti Transfer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img src="<?= base_url('assets/img/bukti_transfer/'.$konfirmasi_pesanan['bukti_transfer']); ?>" class="img-thumbnail">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>